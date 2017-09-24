<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAdministration extends Model
{
    protected $table = 'm_administration';
    protected $primaryKey =  'administration_id';
    public $timestamps = false;

    protected $fillable = ['employee_id', 'adminstration_name', 'administration_status', 'create_user_id', 'create_datetime', 'update_user_id', 'update_datetime', 'version'];
}
