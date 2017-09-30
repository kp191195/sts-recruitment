<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Log;
use DB;
use Validator;
use Session;
use App\MJob;
use App\MEmployee;
use App\TJobApply;
use \stdClass;
use App\Applicant;
use Helpers\DateUtil;

class ApplicantController extends Controller
{   
    public function index(){
        return view('applicant.index');
    }
    public function getApplicantWtihParam($jid = NULL)
    {
        Log::debug($jid);

        $job = MJob::get();
        // $job = MJob::all();
        // Log::debug($job);

        if($jid != NULL || $jid != '' ){
            $selectedJob = MJob::find($jid);
            // $job = MJob::all();
            Log::debug($selectedJob);
        }else{
            $emptyId = new stdClass();
            $emptyId->job_id = -99;
            $selectedJob = $emptyId;
            Log::debug('kelar else');
        }
        

        $results = DB::select( DB::raw(" 
        SELECT A.job_apply_id, A.applicant_id, B.name, B.email, B.phone_no, C.remark
        FROM t_job_apply A 
        INNER JOIN m_applicant B ON A.applicant_id = B.applicant_id
        LEFT JOIN t_activity C ON A.job_apply_id = C.job_apply_id
        WHERE C.activity_id IN( 
                SELECT MAX(activity_id) as activity_id
                 FROM t_activity B
                   GROUP BY B.job_apply_id) "));
        Log::debug($results);

        return view('applicant.applicant', ['applicant' => $results,'job'=> $job, 'selectedJob' => $selectedJob]);
    }

    public function apiGetDataApplicant(Request $request)
    {
        Log::debug($request->all());
        

        $applicant = Applicant::find($request->id);
        $json = [
            'status'=>"OK",
            'dataApplicant'=>$applicant
        ];
        return response()->json($json);
        //return view('applicant.applicant', ['applicant' => $results,'job'=> $job, 'selectedJob' => $selectedJob]);
    }

    public function apiGetComboForAcceptModal(Request $request){
        Log::debug($request->all());
        $listComboValue = DB::select(DB::raw("
            SELECT A.combo_name,B.key,B.value
            FROM t_combo A INNER JOIN t_combo_value B ON A.combo_id = B.combo_id
            WHERE combo_name IN('COMBO_MEMBERSHIP','COMBO_DOMISILI','COMBO_SPV')
        "));

        $jobApply = TJobApply::find($request->id);
        
        $job = MJob::find($jobApply->job_id);
        
        $membership = [];
        $domisili = [];
        $spv = [];
        foreach($listComboValue as $row){
            if($row->combo_name == 'COMBO_MEMBERSHIP'){
                array_push($membership,$row);
            }
            else if($row->combo_name == 'COMBO_DOMISILI'){
                array_push($domisili,$row);
            }
            else{
                array_push($spv,$row);
            }
        };

        $result = [
            'comboMembership'=> $membership,
            'comboDomisili'=> $domisili,
            'comboSpv'=>$spv,
            'jobName'=>$job->job_name
        ];

        Log::debug($result);
        

        $json = [
            'status'=>"OK",
            'result'=>$result
        ];
        return response()->json($json);
    }

    public function apiAddEmployee(Request $request){
        
        $dataApplicant = $request->all();
        Log::debug($dataApplicant);
        $session = Session::get('sessionUser');
        $datetime = DateUtil::dateTimeNow();
        $jobApply = TJobApply::find($dataApplicant['applicantId']);
        
        $employee = new MEmployee();
        $employee->person_id = $jobApply->applicant_id;
        $employee->job_apply_id = $jobApply->job_apply_id;
        $employee->job_id = $jobApply->job_id;
        $employee->user_id = $jobApply->applicant_id;
        $employee->start_date = date('Ymd',strtotime($dataApplicant['startDate']));
        $employee->join_date = date('Ymd',strtotime($dataApplicant['joinDate']));
        $employee->placement = $dataApplicant['placement'];
        $employee->membership = $dataApplicant['membership'];
        $employee->supervisor_id = $dataApplicant['supervisor'];
        $employee->last_date = " ";
        $employee->create_datetime = $datetime;
        $employee->update_datetime = $datetime;
        $employee->update_user_id = $session['user_id'];
        $employee->create_user_id = $session['user_id'];
        $employee->version = 0;
        $employee->save();

        $jobApply->flg_accept = 'Y';
        $jobApply->save();

        $json = [
            'status'=>"OK",
            
        ];
        return response()->json($json);
    }
        

}
