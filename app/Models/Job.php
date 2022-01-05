<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

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

}