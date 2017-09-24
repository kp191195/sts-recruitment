@extends('layout.master')

@section('title','applicant')

@section('navigation')
    @include('include.nav')
@endsection

@section('css')
<style>
.container {
    padding-top: 10px;
    padding: 16px;
}
</style>
@endsection

@section('content')
    <div ng-app="app" ng-controller='ApplicantMainController'>
        <div class="container">

        <div class="form-group">
        <div class="row">
            <div class="col-sm-2">
                <label>Job</label>    
                <select name="job" id="job" >
                        <option value="">All</option>
                        @foreach($job as $job)
                        <option value="{{$job->job_id}}" {{ $selectedJob->job_id == $job->job_id ? 'selected="selected"' : '' }}>{{ $job->job_name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <label>Interview</label>
                &nbsp; &nbsp;
                <input name="interview" type="checkbox" value="1">
            </div>
            <div class="col-sm-2">
                <label>Qualified</label>
                &nbsp; &nbsp;
                <input name="qualified" type="checkbox" value="1">
            </div>
            <div class="col-sm-2">
                <label>Accepted</label>
                &nbsp; &nbsp;
                <input name="accepted" type="checkbox" value="1">
            </div>
        </div>
        
       
        
        </div>
        
        <table class="table" id="table" border="1">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">CV</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Activity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($applicant as $applicant)
                <tr>
                    <td>{{$applicant->name}}</td>
                    <td>{{$applicant->email}}</td>
                    <td>{{$applicant->phone_no}}</td>
                    <td><a href="#" ng-click="open()">View</a></td>
                    <td><a href="#" ng-click="open()">View</a></td>
                    <td>{{$applicant->remark}}</td>
                    <td><a href="#" ng-click="open()">View Activity History</a></td>
                    <td>
                        <select name="job" id="job" onchange="location.href = this.value">
                            <option>More Action</option>
                            <option value="/dashboard">Activity</option> <!-- value disini tinggal diganti dengan route dan parameternya -->
                            <option value="#">Note</option>
                            <option value="#">Qualified</option>
                            <option value="#">Accept</option>
                        </select>
                    </td>
                </tr>
            @endforeach
                
            </tbody>
        </table> 

        </div>
    </div>
    
@endsection

@section('script')
    <script src="{{URL::asset('assets/app/applicant/js/module.js')}}"></script>
    <script src="{{URL::asset('assets/app/applicant/js/controller.js')}}"></script>
    <script src="{{URL::asset('assets/app/applicant/js/service.js')}}"></script>
@endsection

