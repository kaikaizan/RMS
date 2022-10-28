<?php

namespace App\Http\Controllers\administrator;

use App\Models\OpenedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function openJob(Request $request){ 
    
        $formFields = $request->validate([
            'job_title' => 'required',
            'item_number' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'place_of_assignment' => 'required',
            'education' => 'required',
            'training' => 'required',
            'experience' => 'required',
            'eligibility' => 'required',
            'competency' => 'required',
            'duties' => 'required',
            'opening_date' => 'required',
            'closing_date' => 'required',
        ]);
        OpenedJob::create($formFields);

        return redirect('/job-management')->with('message', 'Job Opened and Created Successfully');

    }
    public function updateJob(){

    }
}
