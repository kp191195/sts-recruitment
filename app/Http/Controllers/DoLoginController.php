<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

use App\MUser;

class DoLoginController extends Controller
{
    //
    public function getLogins(Request $request){
        //Log::debug($request->all());
        
        $input = $request->all();
        $loggedUser = MUser::whereRaw('email = ? AND password = ?',[$input['uname'],md5($input['psw'])])->first();

        Log::debug($loggedUser);
        
    }
}
