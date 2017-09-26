<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Log;
use DB;
use Validator;
use Session;
use App\MEmployee;
use App\TJobApply;
use App\Applicant;
use App\MJob;
use App\MAdministration;
use Illuminate\Support\Facades\Input;

class AdministrationDetailController extends Controller
{   
    
    public function getAdministrationDetail($eid)
    {
        Log::debug($eid);

        $employee = MEmployee::find($eid); // untuk mendapatkan job_apply_id
        // $job = MJob::all();
        Log::debug($employee); 

        $jobApply = TJobApply::find($employee->job_apply_id); // untuk mendapatkan flg_qualified
        Log::debug($jobApply);
        
        $applicant = Applicant::find($employee->person_id); // uneuk mendapatkan nama dan email
        Log::debug($applicant);

        $job = MJob::find($employee->job_id); // untuk mendapatkan job_name
        Log::debug($job);

        // cari list administrasi
        $dataAdmin = DB::select( DB::raw(" 
        WITH penerimaan AS (
            select  B.sort_no, B.parameter
            from t_combo A
            INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
            WHERE A.combo_name = 'RECEIVED_DATA'
            Order by B.sort_no
        )
        select C.administration_id as id, B.sort_no, B.parameter AS admin_combo_param, D.parameter AS received_data_param
        from t_combo A
        INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
        LEFT JOIN m_administration C ON B.parameter = C.administration_name AND C.employee_id = ".$eid."
        LEFT JOIN penerimaan D ON C.administration_status = D.parameter
        WHERE A.combo_name = 'ADMINISTRATION'
        Order by B.sort_no ")); 
        Log::debug($dataAdmin);

        //cari list combo penerimaan
        $comboPenerimaan = DB::select( DB::raw(" 
        select  B.sort_no, B.parameter
        from t_combo A
        INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
        WHERE A.combo_name = 'RECEIVED_DATA'
        Order by B.sort_no "));
        Log::debug($comboPenerimaan);

        Log::debug("testtt");
        //cari data admnistrasi employee
        $administration = MAdministration::where('employee_id',$eid)->get();
        Log::debug($administration);

        return view('administration.administrationDetail', ['name' => $applicant->name,'job'=> $job->job_name, 'email' => $applicant->email, 
                                                            'qualified'=> $jobApply->flg_qualified, 'dataAdmin' => $dataAdmin, 'comboPenerimaan' => $comboPenerimaan,
                                                            'employeeId'=>$eid]);
    }

    public function updateAdministrationDetail()
    {
        Log::debug($eid);
        Log::debug($id);
        
        $req =  Input::get('penerimaan');; 
        Log::debug($req);
        
        if($id != NULL || $id != '' ){
            // $selectedJob = MJob::find($jid);
            // // $job = MJob::all();
            Log::debug(" ID TIDAK NULL BROO ");
        }else{
            // $emptyId = new stdClass();
            // $emptyId->job_id = -99;
            // $selectedJob = $emptyId;
            Log::debug(" ID NULL BROO ");
        }

        // $employee = MEmployee::find($eid); // untuk mendapatkan job_apply_id
        // // $job = MJob::all();
        // Log::debug($employee); 

        // $jobApply = TJobApply::find($employee->job_apply_id); // untuk mendapatkan flg_qualified
        // Log::debug($jobApply);
        
        // $applicant = Applicant::find($employee->person_id); // uneuk mendapatkan nama dan email
        // Log::debug($applicant);

        // $job = MJob::find($employee->job_id); // untuk mendapatkan job_name
        // Log::debug($job);

        // // cari list administrasi
        // $dataAdmin = DB::select( DB::raw(" 
        // WITH penerimaan AS (
        //     select  B.sort_no, B.parameter
        //     from t_combo A
        //     INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
        //     WHERE A.combo_name = 'RECEIVED_DATA'
        //     Order by B.sort_no
        // )
        // select C.administration_id as id, B.sort_no, B.parameter AS admin_combo_param, D.parameter AS received_data_param
        // from t_combo A
        // INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
        // LEFT JOIN m_administration C ON B.parameter = C.administration_name AND C.employee_id = ".$eid."
        // LEFT JOIN penerimaan D ON C.administration_status = D.parameter
        // WHERE A.combo_name = 'ADMINISTRATION'
        // Order by B.sort_no ")); 
        // Log::debug($dataAdmin);

        // //cari list combo penerimaan
        // $comboPenerimaan = DB::select( DB::raw(" 
        // select  B.sort_no, B.parameter
        // from t_combo A
        // INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
        // WHERE A.combo_name = 'RECEIVED_DATA'
        // Order by B.sort_no "));
        // Log::debug($comboPenerimaan);

        // Log::debug("testtt");
        // //cari data admnistrasi employee
        // $administration = MAdministration::where('employee_id',$eid)->get();
        // Log::debug($administration);

        // return view('administration.administrationDetail', ['name' => $applicant->name,'job'=> $job->job_name, 'email' => $applicant->email, 
        //                                                     'qualified'=> $jobApply->flg_qualified, 'dataAdmin' => $dataAdmin, 'comboPenerimaan' => $comboPenerimaan,
        //                                                     'employeeId'=>$eid]);
    }
}
