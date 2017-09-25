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
use Zipper;
use Mail;
use App\Activity;
use App\MEmployee;
use Helpers\DateUtil;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
    public function apiGetDataForDashboard()
    {
        // $job = MJob::all();
        // Log::debug($job);

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
        $json = [
            'status'=>'OK',
            'result'=>$results
        ];
        return response()->json($json);
    }
    public function apiGetJobList()
    {
        // $job = MJob::all();
        // Log::debug($job);
        $job = MJob::all();
       
        Log::debug($job);
        $json = [
            'status'=>'OK',
            'result'=>$job
        ];
        return response()->json($json);
    }

    public function apiGetApplicantList(Request $request){
        Log::debug($request->all());
        $query = "";
        
        if($request->jobId == -99){
            $query.=  "SELECT A.job_apply_id, A.applicant_id, A.flg_qualified, A.flg_accept, B.name, B.email, B.phone_no, C.remark
                        FROM t_job_apply A 
                        INNER JOIN m_applicant B ON A.applicant_id = B.applicant_id
                        LEFT JOIN t_activity C ON A.job_apply_id = C.job_apply_id
                        WHERE C.activity_id IN( 
                        SELECT MAX(activity_id) as activity_id
                        FROM t_activity B
                        GROUP BY B.job_apply_id) ";
            
                if($request->flgQualified == 'false')
                    $query.=" AND A.flg_qualified = 'N' ";
                else
                    $query.=" AND A.flg_qualified = 'Y' ";
                
                if($request->flgAccepted == 'false')
                    $query.=" AND A.flg_accept = 'N' ";
                else
                    $query.=" AND A.flg_accept = 'Y' ";
            
            Log::debug($query);
            $results = DB::select(DB::raw($query));
            
        }else{
            $query.="SELECT A.job_apply_id, A.applicant_id, A.flg_qualified, A.flg_accept, B.name, B.email, B.phone_no, C.remark
            FROM t_job_apply A 
            INNER JOIN m_applicant B ON A.applicant_id = B.applicant_id
            LEFT JOIN t_activity C ON A.job_apply_id = C.job_apply_id
            WHERE C.activity_id IN( 
                    SELECT MAX(activity_id) as activity_id
                    FROM t_activity B
                    GROUP BY B.job_apply_id) 
            AND A.job_id = $request->jobId";
             
                if($request->flgQualified == 'false')
                    $query.=" AND A.flg_qualified = 'N' ";
                else
                    $query.=" AND A.flg_qualified = 'Y' ";
                
                if($request->flgAccepted == 'false')
                    $query.=" AND A.flg_accept = 'N' ";
                else
                    $query.=" AND A.flg_accept = 'Y' ";
            
            Log::debug($query);
            $results = DB::select(DB::raw($query));
            
        }
      
        $json = [
            'status'=>'OK',
            'result'=>$results
        ];
        return response()->json($json);
    }
    public function apiDownloadFileCv($id){
        Log::debug($id);
        
        
            $results = DB::select( DB::raw(
                "SELECT file_path,file_type FROM m_applicant_file
                WHERE applicant_id = $id AND file_name LIKE '%-cv'"));
            
            Log::debug($results);
            return response()->download($results[0]->file_path);
    }

    public function apiDownloadOtherFile($id){
        $results = DB::select( DB::raw(
            "SELECT file_path,file_type FROM m_applicant_file
            WHERE applicant_id = $id AND file_name NOT LIKE '%-cv'"));
        
        
        foreach($results as $row){
            $filePath[]=$row->file_path;
        };

        Zipper::make(storage_path('files/applicant-file.zip'))->add($filePath)->close();

        return response()->download(storage_path('files/applicant-file.zip'));
    }
    public function apiSendEmail(Request $request){
        Log::debug($request->all());
        $data = $request->all();
        $strdate = strtotime($data['meetingDate']);
        $strtime = strtotime($data['meetingTime']);
        $meetingDate = date('d-m-Y',$strdate);
        $meetingTime = date('H:i',$strtime);
        $data['meetingDate']=$meetingDate;
        $data['meetingTime']=$meetingTime;
       
        Mail::send('template.email.email-halo', $data, function ($message) use($data) {
            $message->from('shinosuke14@gmail.com', 'Kalvin Pratama');
            $message->to($data['email'], $data['name']);
            $message->subject('Test kirim email!');
        });
        

        $json=[
            'status'=>'OK'
        ];
        return response()->json($json);
    }
    public function apiSendNote(Request $request){
        Log::debug($request->all());
        $datetime = DateUtil::dateTimeNow();
        $date = DateUtil::dateNow();
        $jobApply = TJobApply::whereRaw('applicant_id = ?',[$request->applicantId])->first();
        Log::debug($jobApply);

        $activity = new Activity();
        $activity->job_apply_id = $jobApply->job_apply_id;
        $activity->pic_name = 'system';
        $activity->flg_contacted_via = 'none';
        $activity->activity_datetime = 'none';
        $activity->activity_location = 'none';
        $activity->activity_description  = $request->activity;
        $activity->remark  = $request->remark;
        $activity->create_user_id  = -1;
        $activity->update_user_id  = -1;
        $activity->create_datetime  = $datetime;
        $activity->update_datetime  = $datetime;
        $activity->version  = 0;
        $activity->save();

        $json=[
            'status'=>'OK'
        ];
        return response()->json($json);
    }

    public function apiGetHistoryActivity(Request $request){
        Log::debug('Method api get history activity');
        Log::debug($request->all());
        
        $results = Activity::where('job_apply_id','=',$request->job_apply_id)->get();
        
        Log::debug($results);
        $json=[
            'status'=>'OK',
            'result'=>$results
        ];
        return response()->json($json);
    }

    public function apiUpdateQualified(Request $request){
        Log::debug('Method api update qualified');
        Log::debug($request->all());
        
        $results = TJobApply::where('applicant_id','=',$request->applicant_id)->update(['flg_qualified'=>'Y']);
        
        

        $json=[
            'status'=>'OK',

        ];
        return response()->json($json);
    }

    public function apiUpdateAccepted(Request $request){
        Log::debug('Method api update qualified');
        Log::debug($request->all());
        
        $results = TJobApply::where('applicant_id','=',$request->applicant_id)->update(['flg_accept'=>'Y']);
        
        $employee=new MEmployee();
        

        $json=[
            'status'=>'OK',
        ];
        return response()->json($json);
    }
}
