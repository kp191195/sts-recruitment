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
    <table class="table" id="table" border="1">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($adminList as $adminList)
            <tr>
                <td>{{$adminList->name}}</td>
                <td>{{$adminList->job_name}}</td>
                <td><a href="/administrationDetail/{{$adminList->employee_id}}">View Detail</a></td>   
                
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection