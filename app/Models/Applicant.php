<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Applicant extends Authenticable
{
    use HasFactory;

    protected $guard = 'applicant';

    public function application(){
        return $this->hasMany(Application::class);
    }
}
