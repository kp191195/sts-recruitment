@extends('layout.master')

@section('title','dashboard')

@section('navigation')
    @include('include.nav')
@endsection

@section('css')
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    background-color: black;
}

.container {
    padding-top: 10px;
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
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