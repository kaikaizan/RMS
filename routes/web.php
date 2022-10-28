<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Applicants\UserController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Administrator\ApplicantController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ExcelController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Applicants\JobListingsController;
use App\Models\Applicant;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'applicants.index')->name('/');

//APPLICANT ROUTES

Auth::routes(['verify' => true]);

// Route::get('/job-offers', [JobListingsController::class, 'showJobOffers'])->name('job.offers')->middleware('verified');
Route::get('/job-offers', [JobListingsController::class, 'showJobOffers'])->name('job.offers');

Route::get('/contact-us', [JobListingsController::class, 'showContactUs'])->name('contact.us');

Route::get('job-description/{job_id}', [JobListingsController::class, 'jobDescription']);

Route::get('/job-application/{openedJob}', [JobListingsController::class, 'showJobApplication'])->name('job-application')->middleware('auth');

Route::get('/access-denied', [JobListingsController::class, 'showAccessDenied'])->name('access.denied');

Route::post('/applicant/submit-application/{user_id}', [JobListingsController::class, 'storeApplication'])->name('submit.application');
    
Route::post('/applicant/login', [LoginController::class, 'applicantLogin'])->name('applicant.login');

Route::post('/applicant/register', [UserController::class, 'applicantRegister'])->name('applicant.register');

Route::get('/applicant/my-application', [JobListingsController::class, 'myApplication']);

Route::post('/applicant/disqualify/{applicant_id}', [DashboardController::class, 'applicantDisqualify']);

//Google Login
Route::get('login/google', [SocialController::class, 'redirectToGoogle'])->name('login.google');
Route::get('public/login/google/callback', [SocialController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('login/facebook', [SocialController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('public/login/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

//Linkedin Login
Route::get('login/linkedin', [SocialController::class, 'redirectToLinkedin'])->name('login.linkedin');
Route::get('public/login/linkedin/callback', [SocialController::class, 'handleLinkedinCallback']);

    // Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('applicant.logout');

Route::get('/contact-us', [JobListingsController::class, 'contactUs']);

Route::get('/transparency-seal', [JobListingsController::class, 'transparencySeal']);

Route::get('/applicant/password-reset', [JobListingsController::class, 'passwordReset']);

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('forgot.password');

//MasterList Routes
Route::get('view-applicant/{id}', [JobListingsController::class, 'viewApplicant']);

//DASHBOARD ROUTES

Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin', function () {
    return view('auth.admin.login-page');
})->name('admin.login-page');


Route::get('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout'); //****** */

Route::get('/masterlist', [DashboardController::class, 'showMasterlist']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard'); 

 Route::get('/job-management', [DashboardController::class, 'showJobManagement']);

Route::post('/job-management/open-job', [JobController::class, 'openJob']);
Route::post('/job-management/update-job', [JobController::class, 'updateJob']);


Route::get('/applicant-tracking', [DashboardController::class, 'showApplicantTracking']);

// Auth::routes(['verify' => true]);

// Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin')->middleware('is_admin')->middleware('is_admin');

//Show Backup Database
Route::get('/backup-database', [DashboardController::class, 'showBackupDatabase']);

//Show Restore Database
Route::get('/restore-database', [DashboardController::class, 'showRestoreDatabase']);

//Show Initial Assessment
Route::get('/initial-assessment', [DashboardController::class, 'showInitialAssessment']);

//Show Final Comparative Assessment Form
Route::get('/final-comparative-form/{applicant_id}', [DashboardController::class, 'showComparativeForm']);

//SHOW APPLICAnt Initial assessment
Route::get('/initial-assessment/evaluate/{applicant_id}', [ApplicantController::class, 'showApplicantAssessment']);

//Show Manage Users
Route::get('/manage-users', [DashboardController::class, 'showManageUsers']);

Route::post('/comparative-assessment',[DashboardController::class, 'comparativeAssessment']);

Route::post('/initial-assessment/evaluation-qualify/{applicant_id}', [DashboardController::class, 'applicantQualify']);

Route::post('/initial-assessment/evaluation-disqualify/{applicant_id}', [DashboardController::class, 'applicantDisqualify']);

Route::post('/applicant-tracking/generate-form/{applicant_id}', [DashboardController::class, 'generateForm']);

Route::get('/applicant-tracking/pdf/{applicant_id}', [DashboardController::class, 'pdf']);

Route::post('/admin/prequalification-report', [ExcelController::class, 'prequalificationReport']);









