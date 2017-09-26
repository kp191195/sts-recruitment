<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TComboValue extends Model
{
    protected $table = 't_combo_value';
    protected $primaryKey =  'combo_value_id';
    public $timestamps = false;

    protected $fillable = ['combo_id','sort_no','key','value','create_user_id','create_datetime','update_user_id','update_datetime','version'];
}