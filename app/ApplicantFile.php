<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantFile extends Model
{
    //
    protected $table = 'm_applicant_file';
    protected $primaryKey =  'applicant_file_id';
    public $timestamps = false;

    protected $fillable = ['applicant_id','file_name','file_type','file_path','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}
