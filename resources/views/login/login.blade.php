@extends('layout.master')

@section('title','Login')

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
    <form action="/getLogins" method="POST">
    <div class="imgcontainer">
      <img src="assets/corlate-free-template/images/logo.png" alt="Avatar" class="avatar">
    </div>
  
    <div class="form-group">
      {{csrf_field()}}
      <label class="form-group"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required class="form-group">
  
      <label class="form-group"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required class="form-group">
          
      <button type="submit">Login</button>
      <input class="form-group" type="checkbox" checked="checked"> Remember me
    </div>
  
    <div class="form-group" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
    </div>
    
@endsection