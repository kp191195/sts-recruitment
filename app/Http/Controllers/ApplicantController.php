<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Log;
use DB;
use Validator;
use Session;
use App\MJob;
use App\TJobApply;
use \stdClass;

class ApplicantController extends Controller
{   
    
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

}
