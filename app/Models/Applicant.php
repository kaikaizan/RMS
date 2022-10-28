<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;

    public function applicantPrequalification(){
        return $this->hasOne(Prequalification::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $primaryKey = 'id';
    //public $incrementing = false;
    protected $fillable = [
        
        'first_name', 
        'middle_name', 
        'last_name', 
        'sex', 
        'email', 
        'address', 
        'mobile_number', 
        'birthday',

        'applying_for',
        'educational_attainment',
        'college_course',
        'school_graduated',
        'year_last_attended',
        'previously_applied',
        'job_discovery',

        'application_letter',
        'pds',
        'work_experience',
        'otr',
        'employment_certificates',
        'eligibility',
        'training_certificates',
        'performance_evaluation',
        'commendation',
        
        'status',
        'created_at',
    ];
    
    
}
