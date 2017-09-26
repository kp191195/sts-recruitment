<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 't_combo';
    protected $primaryKey =  'combo_id';
    public $timestamps = false;

    protected $fillable = ['combo_name','description','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}

