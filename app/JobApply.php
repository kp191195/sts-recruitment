<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    //
    protected $table = 't_job_apply';
    protected $primaryKey =  'job_apply_id';
    public $timestamps = false;

    protected $fillable = ['applicant_id','job_id','apply_date','flg_qualified','flg_accept','create_user_id','create_datetime','update_user_id','update_datetime','version'];

}
