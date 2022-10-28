<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prequalification extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'applicant_id';
    protected $fillable=['first_name', 'last_name','applying_for','evaluation', 'reason_for_disqualification','remarks','additional_details','pertinent_conditions', 'created_at', 'updated_at'];

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }
}
