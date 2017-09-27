@extends('layout.master')

@section('title','dashboard')

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
    <div ng-app="DashboardApp">
        <div ui-view></div>
    </div>
@endsection
@section('script')
    <script src="/assets/app/dashboard/js/module.js"></script>
    <script src="/assets/app/dashboard/js/controller.js"></script>
    <script src="/assets/app/dashboard/js/service.js"></script>
@endsection