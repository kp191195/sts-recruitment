@extends('layout.master')

@section('title','applicant')

@section('navigation')
    @include('include.nav')
@endsection

@section('content')
    <div ng-app="ApplicantApp">
        <div ui-view></div>
    </div>
@endsection
@section('script')
    <script src="/assets/app/applicant/js/module.js"></script>
    <script src="/assets/app/applicant/js/controller.js"></script>
    <script src="/assets/app/applicant/js/service.js"></script>
@endsection