<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Http\Requests;
use App\Setting;
use App\TComboValue;

class SettingController extends Controller
{
    public function index()
    {
    	return view("setting.combo");
    }

    public function apiGetCombo()
    {
    	$combo = Setting::all();
    	$json = [
    		"status"=>'OK',
    		"dataCombo"=>$combo
    	];
    	Log::Debug($json);
    	return response()->json($json);
    }

    public function apiGetComboValueList(Request $request)
    {
    	Log::Debug("LINE 31");
    	Log::Debug($request->all());
    	$combo = TComboValue::find($request->id);
    	$json = [
    		"status" => 'OK',
    		"result" =>$combo
    	];
    	Log::Debug($json);
    	return response()->json($json);
    }
}
