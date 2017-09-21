<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class DoLogoutController extends Controller
{
    //
    public function logout(){
        Session::forget('sessionUser');

        return redirect('/');
    }
}
