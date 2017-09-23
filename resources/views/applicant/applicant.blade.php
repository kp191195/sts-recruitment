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
        <label>Job</label>
        <select name="job" id="job">
            <option value="All">All</option>
            @foreach($job as $job)
            <option value="{{$job->job_id}}" {{ $selectedJob->job_id == $job->job_id ? 'selected="selected"' : '' }}>{{ $job->job_name}}</option>
            @endforeach
        </select>
        <table class="table" id="table" border="1">
            <thead>
                <tr>
                    <th class="text-center">Job</th>
                    <th class="text-center">Applicant</th>
                    <th class="text-center">Qualified</th>
                    <th class="text-center">Accepted</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($dashboard as $dashboard)
                <tr>
                    <td>{{$dashboard->job_name}}</td>
                    <td>{{$dashboard->count_applicant}}</td>
                    <td>{{$dashboard->count_qualified}}</td>
                    <td>{{$dashboard->count_accept}}</td>
                    <td><a href="#" ng-click="open()">view</a></td>
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