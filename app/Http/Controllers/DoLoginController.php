<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

class DoLoginController extends Controller
{
    //
    public function getLogins(Request $request){
        Log::debug($request->all());
    }
}
