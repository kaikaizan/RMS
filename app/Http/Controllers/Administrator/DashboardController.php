<?php

namespace App\Http\Controllers\administrator;


use App\Models\Applicant;
use App\Models\OpenedJob;
use App\Mail\MailApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\Settings;
use App\Models\Prequalification;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\ApplicantAssessmentForm;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\Metadata\Compatibility;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class DashboardController extends Controller
{
    public function dashboard(){
        $applicants = Applicant::where('status','new')->latest()->limit(8)->get();
        $countApplicants = Applicant::all()->count();
        $countJobs = OpenedJob::where('to_close', 0)->count();
        $countClosedJobs = OpenedJob::where('to_close', '1')->count();
        $jobs = OpenedJob::where('to_close','0')->latest()->limit(7)->get();
        return view('administrator.dashboard', compact('applicants','jobs','countApplicants','countJobs','countClosedJobs'));
    }

    public function showJobManagement(){

        $model = DB::table('opened_jobs')->first();
        $toClose = DB::table('opened_jobs')->pluck('to_close'); 
        $closingDate = DB::table('opened_jobs')->pluck('closing_date');
        $dateToday = Carbon::now();
        
        $a=0; 
        foreach($closingDate as $date){ 
            if($dateToday->toDateString()== $date){
                //Get job_id column
                // $jobId = OpenedJob::where('closing_date', $date)->pluck('job_id');
                $jobId = DB::table('opened_jobs')->pluck('job_id');
                //Update to_close column to 1
                DB::table('opened_jobs')
                    ->where('job_id', $jobId[$a]) //i am gettng the job_id of index $variable
                    ->update([
                    'to_close'=> 1
                ]);         
            }
            $a+=1; 
        }
        $a=0;

        $count = OpenedJob::where('to_close','=','1')->count();
                
        $serve = OpenedJob::all();
        
        return view('administrator.job-management', compact('serve'), compact('count'));
    }

    public function showMasterlist(){     

        $serves = Applicant::all();
        return view('administrator.masterlist', compact('serves'));

        
    }

    public function showApplicantTracking(){
        $openedJobs = OpenedJob::all();
        $applicants = Applicant::all();
        $qualifiedApplicants = Applicant::where('status','qualified')->get();
        $disqualifiedApplicants = Applicant::where('status','disqualified')->get();
        return view('administrator.applicant-tracking', compact('qualifiedApplicants','disqualifiedApplicants','openedJobs'));
    }

    public function showBackupDatabase(){
        $statuses = BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'));
        $info = [];
        foreach ($statuses as $status) {
            $destination = $status->backupDestination();
            $backups = $destination->backups();
            $destInfo = [
                'name' => $destination->backupName(),
                'disk' => $destination->diskName(),
                'storageType' => $destination->filesystemType(),
                'reachable' => $destination->isReachable(),
                'healthy' => $status->isHealthy(),
                'count' => $backups->count(),
                'storageSpace' => $destination->usedStorage(),
                'backups' => [],
            ];
            foreach ($backups as $backup) {
                $destInfo['backups'][] = [
                    'path' => $backup->path(),
                    'date' => $backup->date(),
                    'size' => $backup->sizeInBytes(),
                ];
            }

            $info[] = $destInfo;

            // dd($info);
        }
        return view('administrator.backup-database', ['info' => $info]);
    }
    public function showRestoreDatabase(){
        return view('administrator.restore-database');
    }

    public function showInitialAssessment(){
        $applicants = Applicant::latest()->get();
        return view('administrator.initial-assessment', compact('applicants'));
    }

    public function showComparativeForm($applicant_id){
        $applicants = Applicant::where('id',$applicant_id)->get();
        
        return view('administrator.comparative-form', compact('applicants'));
    }

    public function showManageUsers(){
        return view('administrator.manage-users');
    }

    public function applicantQualify(Request $request, $applicant_id){

        $applicants = Applicant::all();

            Applicant::where('id', $applicant_id)->update(['status' => "qualified"]);

                $applicant = Applicant::where('id',$applicant_id)->first();

                $prequalification = new Prequalification;
                $prequalification->applicant_id = $applicant->id;
                $prequalification->first_name = $applicant->first_name;
                $prequalification->last_name = $applicant->last_name;
                $prequalification->applying_for = $applicant->applying_for;
                $prequalification->evaluation = 'qualified';
                $prequalification->reason_for_disqualification = '';
                $prequalification->remarks = $request->remarks ?? '';
                $prequalification->additional_details = $applicant->additional_details ?? '';
                $prequalification->pertinent_conditions = $applicant->pertinent_conditions ?? '';
                $prequalification->save();

        return redirect('/applicant-tracking')
            ->with('message', 'Success! Applicant qualified')
            ->with('applicants', $applicants);

    }

    public function pdf($applicant_id){
        $applicants = Applicant::where('applicant_id', $applicant_id)->get();
        return view('administrator.assessment-pdf',compact('applicants'));
    }

    public function applicantDisqualify(Request $request, $applicant_id){
        $applicants = Applicant::all();
        
                Applicant::where('id', $applicant_id)
                    ->update([
                        'status' => "disqualified"
                    ]);
                    
                $applicant = Applicant::where('id',$applicant_id)->first();

                $prequalification = new Prequalification;
                $prequalification->applicant_id = $applicant->id;
                $prequalification->first_name = $applicant->first_name;
                $prequalification->last_name = $applicant->last_name;
                $prequalification->applying_for = $applicant->applying_for;
                $prequalification->evaluation = 'disqualified';
                $prequalification->reason_for_disqualification = implode(',', $request->disqualificationDetails);
                $prequalification->remarks = '';
                $prequalification->additional_details = $applicant->additional_details ?? '';
                $prequalification->pertinent_conditions = $applicant->pertinent_conditions ?? '';
                $prequalification->save();

                //**Create word and convert */
                $templateProcessor = new TemplateProcessor(storage_path('applicant-feedback-form.docx'));
                $fullname = $applicant->first_name. " " .$applicant->last_name;
                $dateToday = Carbon::today()->toDateString();
                $jobDescription = OpenedJob::where('job_title', $applicant->applying_for)->first();

                $applying_for = $applicant->applying_for;
                $status = $jobDescription->status;
                $opening_date = $jobDescription->opening_date;
                $reason = $applicant->applicantPrequalification->reason_for_disqualification;
                $additionalDetails = $applicant->applicantPrequalification->additional_details;
                $pertinentConditions = $applicant->applicantPrequalification->pertinent_conditions;
                
                $templateProcessor->setValues([
                    'full_name'=> $fullname,
                    'date_today'=>$dateToday,
                    'applying_for' => $applying_for,
                    'status' => $status,
                    'opening_date' => $opening_date,
                    'reason' => $reason,
                    'additional_details' => $additionalDetails ?? '',
                    'pertinent_conditions' => $pertinentConditions ?? ''
                ]);

                $pathToSave = $fullname . '-' .'Feedback Form.docx';
                $templateProcessor->saveAs($pathToSave);

                /* Set the PDF Engine Renderer Path */
                // $domPdfPath = base_path('vendor/dompdf/dompdf');
                // Settings::setPdfRendererPath($domPdfPath);
                // Settings::setPdfRendererName('DomPDF');
                
                // //Load word file
                // $Content = IOFactory::load(public_path($fullname . '-' .'feedback-form.docx')); 
        
                // //Save it into PDF
                // $PDFWriter = IOFactory::createWriter($Content,'PDF');
                // $PDFWriter->save(public_path('feedback-form/'.$fullname . '-' .'feedback-form.pdf')); 

                //Send Email *****
                $files = [
                    public_path($fullname . '-' .'Feedback Form.docx'),
                ];
                $details = [
                    'title' => 'Job Applicant Feedback Form',
                    'body' => 'We Appreciate your interest to be employed in Benguet State University. 
                                We wish to inform you that your application was no longer considered for the further stages of our assessment. 
                                Please open the attachment below for further information of disqualification.',
                    'files' => $files
                ];
                // Mail::to('kenzertunguia@gmail.com')->send(new MailApplicant($details));
                Mail::to($applicant->email)->send(new MailApplicant($details));

                return redirect('/applicant-tracking')
                    ->with('message', 'Success! Applicant notified and disqualified')
                    ->with('applicants', $applicants);
        
    }


}
