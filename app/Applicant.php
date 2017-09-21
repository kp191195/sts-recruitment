<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $table = 'm_applicant';
    protected $primaryKey =  'applicant_id';
    public $timestamps = false;

    protected $fillable = ['name','email','phone_no','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}
