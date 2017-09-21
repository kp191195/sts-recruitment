<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Log;
use Validator;
use Session;
use App\MUser;

class DoLoginController extends Controller
{
    //
    public function getLogins(Request $request){
        //Log::debug($request->all());
        
        $input = $request->all();

        $validator = Validator::make($input,[
            'uname'=>'email|required',
            'psw'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $loggedUser = MUser::whereRaw('email = ? AND password = ?',[$input['uname'],md5($input['psw'])])->first();
        
        if(empty($loggedUser)){
            return redirect('/')->with('failMsg',"Email tidak terdaftar di dalam sistem!");
        }
        
        $session = [
            'user_id'=>$loggedUser->user_id,
            'name'=>$loggedUser->name,
            'email'=>$loggedUser->email
        ];

        Session::put('sessionUser',$session);
        
        return redirect('/dashboard');
    }
}
