<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Company extends Authenticable
{
    use HasFactory;

    protected $guard = 'company';
    protected $guarded = ['id'];

    public function job(){
        return $this->hasMany(Job::class);
    }

    public function scopeFilterAdminAuth($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            return $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('city', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')->latest();
        }
    }
}