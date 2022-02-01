<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class Applicant extends Authenticable
{
  use HasFactory;

  protected $guard = 'applicant';
  protected $guarded = ['id'];

  public function application(){
    return $this->hasMany(Application::class);
  }

  public function scopeFilterAdminAuth($query, array $filters){
    if(isset($filters['search']) ? $filters['search'] : false){
      return $query->where('name', 'like', '%' . request('search') . '%')
        ->orWhere('email', 'like', '%' . request('search') . '%')
        ->orWhere('address', 'like', '%' . request('search') . '%')
        ->orWhere('phone', 'like', '%' . request('search') . '%');
    }
  }
}
