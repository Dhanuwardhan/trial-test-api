<?php

namespace App\Models;

use App\Models\Employees;
use App\Models\Jobs;
use App\Models\Roles;
use App\Models\Teams;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'SG_EMPLOYEE';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $fillable = [
        'role_id','team_id','jobs_id','employee_name','date_of_birth','age',
        'mobile_number','email','username','password','gender','religion'
    ];

    public function jobs()
    {
        return $this->hasMany('App\Models\Jobs')->orderBy('id','ASC');
    }
    public function teams()
    {
        return $this->hasMany('App\Models\Teams')->orderBy('id','ASC');
    }
    public function roles()
    {
        return $this->hasMany('App\Models\Roles')->orderBy('id','ASC');
    }
}
