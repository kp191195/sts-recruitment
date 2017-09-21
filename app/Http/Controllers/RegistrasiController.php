<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use Validator;
use App\Applicant;
use App\ApplicantFile;
use App\Job;
use App\JobApply;
use Helpers\DateUtil;
use Ramsey\Uuid\Uuid;

class RegistrasiController extends Controller
{
    //
    public function index(){
        return view('registration.index');
    }

    public function addApplicant(Request $request){
        Log::debug($request->all());

        $input = $request->all();
        $datetime = DateUtil::dateTimeNow();
        $date = DateUtil::dateNow();
        $path = storage_path('files\\applicantFiles');
        $filename = Uuid::uuid4();
        $arrayFile = $input['mytext'];
        //$otherFiles = $request->file('myText');
        
        //Log::debug($arrayFile);
        $validator = Validator::make($input,[
            'txtName'=>'required',
            'txtEmail'=>'required|email',
            'txtPhone'=>'required',
            'fileCv'=>'required'
            ]);
        
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        
       // Log::debug($filename);
        //$input['fileCv']->move(storage_path('/files/applicantFiles'),);
        
        $applicant = new Applicant();
        $applicant->name = $input['txtName'];
        $applicant->email = $input['txtEmail'];
        $applicant->phone_no = $input['txtPhone'];
        $applicant->create_user_id = -1;
        $applicant->update_user_id = -1;
        $applicant->create_datetime = $datetime;
        $applicant->update_datetime = $datetime;
        $applicant->version = 0;
        $applicant->save();


        //add cv 
        
        $applicantFile = new ApplicantFile();
        $applicantFile->applicant_id = $applicant->applicant_id;
        $applicantFile->file_name = $filename."-cv";
        $applicantFile->file_type = $input['fileCv']->getMimeType();
        $applicantFile->file_path = $path."\\".$filename."-cv".".".$input['fileCv']->getClientOriginalExtension();
        $applicantFile->create_user_id = -1;
        $applicantFile->update_user_id = -1;
        $applicantFile->create_datetime = $datetime;
        $applicantFile->update_datetime = $datetime;
        $applicantFile->version = 0;
        $applicantFile->save();
        $cv = $input['fileCv']->move($path,$filename."-cv"); 
        //add other files
        $ctr = 1;
        foreach($arrayFile as $file){
            
            $applicantFile = new ApplicantFile();
            $applicantFile->applicant_id = $applicant->applicant_id;
            $applicantFile->file_name = $filename."-".$ctr;
            $applicantFile->file_type = $file->getMimeType();
            $applicantFile->file_path = $path."\\".$filename."-".$ctr.".".$file->getClientOriginalExtension();
            $applicantFile->create_user_id = -1;
            $applicantFile->update_user_id = -1;
            $applicantFile->create_datetime = $datetime;
            $applicantFile->update_datetime = $datetime;
            $applicantFile->version = 0;
            $applicantFile->save();
            $fileInsert = $file->move($path,$filename."-".$ctr);
            $ctr++;
        }

        $job = Job::find($input['jobId']);
        
        if(empty($job)){
            $newJob = new Job();
            $newJob->job_id = $input['jobId'];
            $newJob->job_name = $input['jobName'];
            $newJob->job_desc = $input['jobDesc'];
            $newJob->create_user_id = -1;
            $newJob->update_user_id = -1;
            $newJob->create_datetime = $datetime;
            $newJob->update_datetime = $datetime;
            $newJob->version = 0;
            $newJob->save();
        }

        //add job apply
        $jobApply = new JobApply();
        $jobApply->applicant_id = $applicant->applicant_id;
        $jobApply->job_id = $input['jobId'];
        $jobApply->apply_date = $date;
        $jobApply->flg_qualified = 'N';
        $jobApply->flg_accept = 'N';
        $jobApply->create_user_id = -1;
        $jobApply->update_user_id = -1;
        $jobApply->create_datetime = $datetime;
        $jobApply->update_datetime = $datetime;
        $jobApply->version = 0;
        $jobApply->save();

    }
}