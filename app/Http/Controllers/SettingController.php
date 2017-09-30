<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;
use Validator;
use Session;
use Helpers\DateUtil;
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
    	//$combo = TComboValue::where('combo_id','=',$request->combo_id)->get();

    	if(empty($request->combo_id))
    	{
    		Log::Debug('LINE 41 True');
    		$combo = DB::select(DB::raw("SELECT B.combo_value_id,A.combo_name,B.key,B.value FROM t_combo A JOIN t_combo_value B ON A.combo_id=B.combo_id"));
    	}
    	else
    	{
    		Log::Debug('LINE 46 False');	
    		$combo = DB::select(DB::raw("SELECT B.combo_value_id,A.combo_name,B.key,B.value FROM t_combo A JOIN t_combo_value B ON A.combo_id=B.combo_id where B.combo_id = $request->combo_id"));
    	}    	

    	Log::Debug($combo);
    	$json = [
    		"status" => 'OK',
    		"result" =>$combo
    	];
    	Log::Debug($json);
    	return response()->json($json);
    }

    public function apiGetComboName(Request $request)
    {
    	Log::Debug("apiGetComboName");
    	Log::Debug($request->all());
		$combo = Setting::where('combo_id','=',$request->combo_id)->first();

		Log::Debug($combo);
		$json = [
    		"status" => 'OK',
    		"result" =>$combo
    	];
    	Log::Debug($json);
    	return response()->json($json);
    }

    public function apiGetComboValueByID(Request $request)
    {
    	Log::Debug("apiGetComboValueList");
    	Log::Debug($request->all());

		$combo = DB::select(DB::raw("SELECT B.combo_value_id,A.combo_name,B.key,B.value FROM t_combo A JOIN t_combo_value B ON A.combo_id=B.combo_id where B.combo_value_id = $request->comboid"));

		Log::Debug($combo);
		$json = [
			"status" => 'OK',
    		"result" => $combo
		];
		return response()->json($json);
    }

    public function apiUpdateComboValue(Request $request)
    {
    	Log::Debug("apiUpdateComboValue");
    	Log::Debug($request->all());
    	$combovalue = TComboValue::find($request->combo_id);
    	$combovalue->key = $request->key;
    	$combovalue->value = $request->value;
    	Log::Debug($combovalue);
    	$combovalue->save();
    	$json = [
    		"status" => 'OK',
    		"message" => 'Data berhasil diupdate'
    	];
    	return response()->json($json);
    }

    public function apiDeleteComboValue(Request $request)
    {
    	Log::Debug("apiDeleteComboValue");
    	Log::Debug($request->all());
    	$combovalue = TComboValue::find($request->combo_id);
    	$combovalue->delete();
    	$json = [
    		"status" => 'OK',
    		"message" => 'Data berhasil diupdate'
    	];
    	return response()->json($json);
    }

    public function apiAddNewComboValue(Request $request)
    {

    	$combovalue = new TComboValue;
    	$session = Session::get('sessionUser');
    	Log::Debug("SESSION USER".$session['user_id']); 
    	Log::Debug($request->all());
    	$combovalue->combo_id = $request->combo_id;
    	$combovalue->key = $request->key;
    	$combovalue->value = $request->value;
    	$combovalue->sort_no = '';
    	$combovalue->create_user_id = $session['user_id'];
    	$combovalue->create_datetime = DateUtil::dateTimeNow();
    	$combovalue->update_user_id = $session['user_id'];
    	$combovalue->update_datetime = DateUtil::dateTimeNow();
    	$combovalue->version = 0;
    	$combovalue->save();
    	$json = [
    		"status" => 'OK',
    		"message" => 'Data berhasil diinsert'
    	];
    	return response()->json($json);
    }
}
