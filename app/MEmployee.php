<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MEmployee extends Model
{
    protected $table = 'm_employee';
    protected $primaryKey =  'employee_id';
    public $timestamps = false;

    protected $fillable = ['person_id', 'job_apply_id', 'job_id', 'user_id', 'join_date', 'start_date', 'placement', 'membership', 'supervisor_id', 'last_date', 'create_user_id', 'create_datetime', 'update_user_id', 'update_datetime', 'version'];
}
