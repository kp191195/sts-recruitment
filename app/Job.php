<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'm_job';
    protected $primaryKey =  'job_id';
    public $timestamps = false;

    protected $fillable = ['job_id','job_name','job_desc','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}
