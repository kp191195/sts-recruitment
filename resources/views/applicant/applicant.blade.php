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
    <div class="container">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
    <ul class="dropdown-menu">
        <li><a href="#">Blog Single</a></li>
        <li><a href="#">Pricing</a></li>
        <li><a href="#">404</a></li>
        <li><a href="#">Shortcodes</a></li>
    </ul>
    
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
                <td><a href="#">view</a></td>
            </tr>
        @endforeach
            
        </tbody>
    </table>

    </div>
@endsection