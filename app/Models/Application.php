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

    // public function company(){
    //     return $this->belongsToMany(Company::class, Job::class);
    // }
}
