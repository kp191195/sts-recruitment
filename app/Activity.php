<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = 't_activity';
    protected $primaryKey =  'activity_id';
    public $timestamps = false;

    protected $fillable = ['job_apply_id','pic_name','flg_contacted_via','activity_datetime','activity_datetime','activity_location','remark','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}
