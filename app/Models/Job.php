<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function applicant(){
        return $this->hasMany(Applicant::class);
    }

    public function application(){
        return $this->hasMany(Application::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function education(){
        return $this->belongsTo(Education::class);
    }

}