<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Company;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function scopeFilterApplicantAuth($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            return $query->whereHas('applicant', function($query){
                        $query->where('name', 'like', '%' . request('search') . '%');
                    })->orWhereHas('job', function($query){
                        $query->where('position', 'like', '%' . request('search') . '%')
                        ->orWhereHas('company', function($query){
                            $query->where('name', 'like', '%' . request('search') . '%');
                        });
                    });
        }
    }

    public function scopeFilterAdminAuth($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false)
        return $query->whereHas('applicant', function($query){
                    $query->where('name', 'like', '%' . request('search') . '%');
                })->orWhereHas('job', function($query){
                    $query->where('position', 'like', '%' . request('search') . '%')
                    ->orWhereHas('company', function($query){
                        $query->where('name', 'like', '%' . request('search') . '%');
                    });
                });
    }

    public function scopeFilterCompanyAuth($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            return $query->where(function($q){
                $q->whereHas('job', function($q) {
                    $q->where('position', 'like', '%' . request('search') . '%');
                })->orWhereHas('applicant', function($q){
                    $q->where('name', 'like', '%' . request('search') . '%');
                });
            });
        }
    }
}
