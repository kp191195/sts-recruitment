@extends('layout.master')

@section('title','dashboard')

@section('navigation')
    @include('include.nav')
@endsection

@section('content')
    <div class="container">

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
                <td><a href="/applicant/{{$dashboard->job_id}}">view</a></td>   
                
            </tr>
        @endforeach
            
        </tbody>
    </table>

    </div>
@endsection