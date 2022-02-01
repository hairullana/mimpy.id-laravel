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

    public function scopeFilterCompanyAuth($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            return $query->where(function($query){
                $query->where('position', 'like', '%' . request('search') . '%')
                    ->orWhere('education_id', 'like', '%' . request('search') . '%');
            });
        }
    }

    public function scopeFilterAdminAuth($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            return $query->where('position', 'like', '%' . request('search') . '%')
                ->orWhereHas('company', function($query){
                    $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('city', 'like', '%' . request('search') . '%')
                    ->orWhere('address', 'like', '%' . request('search') . '%');
                });
        }
    }

    public function scopeSpesificSearch($query, array $filters){
        if(isset($filters['city']) && isset($filters['position']) && isset($filters['education'])){
            return $query->whereHas('company', function($query) use ($filters){
                        $query->where('city', 'like', '%' . $filters['city'] . '%')
                            ->orWhere('address', 'like', '%' . $filters['city'] . '%');
                    })
                    ->where('position', 'like', '%' . $filters['position'] . '%')
                    ->where('education_id', '<=', $filters['education']);
        } else if(isset($filters['city']) && isset($filters['position'])){
            return $query->whereHas('company', function($query) use ($filters){
                        $query->where('city', 'like', '%' . $filters['city'] . '%')
                            ->orWhere('address', 'like', '%' . $filters['city'] . '%');
                    })
                    ->where('position', 'like', '%' . $filters['position'] . '%');
        } else if(isset($filters['position']) && isset($filters['education'])){
            return $query->where('position', 'like', '%' . $filters['position'] . '%')
                    ->where('education_id', '<=', $filters['education']);
        } else if(isset($filters['city']) && isset($filters['education'])){
            return $query->whereHas('company', function($query) use ($filters){
                        $query->where('city', 'like', '%' . $filters['city'] . '%')
                            ->orWhere('address', 'like', '%' . $filters['city'] . '%');
                    })
                    ->where('education_id', '<=', $filters['education']);
        } else if(isset($filters['city'])){
            return $query->whereHas('company', function($query) use ($filters){
                        $query->where('city', 'like', '%' . $filters['city'] . '%')
                            ->orWhere('address', 'like', '%' . $filters['city'] . '%');
                    });
        } else if(isset($filters['position'])){
            return $query->where('position', 'like', '%' . $filters['position'] . '%');
        } else if(isset($filters['education'])){
            return $query->where('education_id', '<=', $filters['education']);
        }
    }
}