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

class AdministrationController extends Controller
{

    public function getAdministrationList()
    {
        // $job = MJob::all();
        // Log::debug($job);

        $results = DB::select( DB::raw(" 
            SELECT A.employee_id, B.name, C.job_name
            FROM m_employee A
            INNER JOIN m_applicant B ON A.person_id = B.applicant_id
            INNER JOIN m_job C ON A.job_id = C.job_id "));
        Log::debug($results);

        return view('administration.administration', ['adminList' => $results]);
    }
}
