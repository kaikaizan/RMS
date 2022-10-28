<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenedJob extends Model
{
    use HasFactory;
    protected $primaryKey = 'job_id';
    protected $fillable =['job_title', 'item_number', 'status', 'salary', 'place_of_assignment', 'education', 'training', 'experience','eligibility', 'competency','duties','opening_date','closing_date','created_at','updated_at','to_close'];

    public function scopeFilter($query, array $filters){
        
        if($filters['search'] ?? false){
            $query->where('job_title', 'like', '%' . request('search') . '%')
                ->orWhere('place_of_assignment', 'like', '%' . request('search') . '%');
                // ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
    
}

