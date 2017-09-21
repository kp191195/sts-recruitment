<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    protected $table = 'my_flights';
    protected $primaryKey =  'user_id';
    public $timestamps = false;

    protected $fillable = ['role_id','name','email','password','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}

