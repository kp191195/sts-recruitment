@extends('layout.master')

@section('title','Administration')

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
    <div class="container">

    <h2><Strong>ADMINISTRATION</Strong></h2>
    <br><br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-4 text-center">Name</div>
                <div class="col-md-4 text-center">Position</div>
                <div class="col-md-4 text-center">Action</div>
            </div>
        </div>
            <div class="panel-body">
                @foreach ($adminList as $adminList)
                    <div class="row">
                        <div class="col-md-4 text-center">{{$adminList->name}}</div>
                        <div class="col-md-4 text-center">{{$adminList->job_name}}</div>
                        <div class="col-md-4 text-center"><a href="/administrationDetail/{{$adminList->employee_id}}">View Detail</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection