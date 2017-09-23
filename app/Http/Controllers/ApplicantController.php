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
    
    public function getApplicantWtihParam($jid)
    {
        Log::debug($jid);

        $job = MJob::get();
        // $job = MJob::all();
        Log::debug($job);

        $selectedJob = MJob::find($jid);
        // $job = MJob::all();
        Log::debug($selectedJob);

        $results = DB::select( DB::raw(" 
        WITH flg_q AS (
            SELECT A.job_id, count(B.job_id) AS count_q
            FROM m_job A
            LEFT JOIN t_job_apply B ON A.job_id = B.job_id
            WHERE flg_qualified = 'Y'
            GROUP BY A.job_id
        ),flg_a AS (
            SELECT A.job_id, count(B.job_id) AS count_a
            FROM m_job A
            LEFT JOIN t_job_apply B ON A.job_id = B.job_id
            WHERE flg_accept = 'Y'
            GROUP BY A.job_id
        )
        SELECT A.job_id, A.job_name ,count(B.job_id) AS count_applicant,COALESCE(c.count_q,0) AS count_qualified, COALESCE(d.count_a,0) AS count_accept
        FROM m_job A
        LEFT JOIN t_job_apply B ON A.job_id = B.job_id 
        LEFT JOIN flg_q C ON B.job_id = C.job_id
        LEFT JOIN flg_a D ON B.job_id = D.job_id
        GROUP BY A.job_id,c.count_q, d.count_a
        ORDER BY A.job_id "));
        Log::debug($results);

        return view('applicant.applicant', ['dashboard' => $results,'job'=> $job, 'selectedJob' => $selectedJob]);
    }

    public function getApplicant()
    {
        
        $job = MJob::get();
        // $job = MJob::all();
        Log::debug($job);

        // $emptyId = array(
        //     'job_id' => '-99'
        // );
        // $empty = (object)$emptyId;

        $emptyId = new stdClass();
        $emptyId->job_id = -99;

        $results = DB::select( DB::raw(" 
        WITH flg_q AS (
            SELECT A.job_id, count(B.job_id) AS count_q
            FROM m_job A
            LEFT JOIN t_job_apply B ON A.job_id = B.job_id
            WHERE flg_qualified = 'Y'
            GROUP BY A.job_id
        ),flg_a AS (
            SELECT A.job_id, count(B.job_id) AS count_a
            FROM m_job A
            LEFT JOIN t_job_apply B ON A.job_id = B.job_id
            WHERE flg_accept = 'Y'  
            GROUP BY A.job_id
        )
        SELECT A.job_id, A.job_name ,count(B.job_id) AS count_applicant,COALESCE(c.count_q,0) AS count_qualified, COALESCE(d.count_a,0) AS count_accept
        FROM m_job A
        LEFT JOIN t_job_apply B ON A.job_id = B.job_id 
        LEFT JOIN flg_q C ON B.job_id = C.job_id
        LEFT JOIN flg_a D ON B.job_id = D.job_id
        GROUP BY A.job_id,c.count_q, d.count_a
        ORDER BY A.job_id "));
        Log::debug($results);

        return view('applicant.applicant', ['dashboard' => $results,'job'=> $job, 'selectedJob' => $emptyId]);
    }
}
