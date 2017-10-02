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

#login{
  margin: auto;
  margin-top: 45px;
  width: 500px;
  height : auto;
  border: 3px solid #ddd;
  border-radius: 25px;
  padding: 30px;
}
</style>
@endsection
@section('content')
    
    <div class="container">
    
    

    @if(count($errors)>0)
        <div class = "alert alert-danger">
            <p>Username atau password harus diisi.</p>
        </div>
    @endif
    
   @if(session('failMsg'))
        <div class = "alert alert-danger">
            <p>{{session('failMsg')}}</p>
        </div>
    @endif
    <form action="/getLogins" method="POST" id="login">
      <div class="imgcontainer">
        <img src="assets/corlate-free-template/images/logo-sts.png" alt="Avatar" class="avatar">
      </div>
      <div class="form-group">
          {{csrf_field()}}
          <label>Email</label>
          <input type="text" placeholder="Enter Email" name="uname" required class="form-control">
      </div>
      <div class="form-group">
          <label>Password</label>
         <input type="password" placeholder="Enter Password" name="psw" required class="form-control">
      </div>
      <button type="submit" class="btn">Login</button>
  </form>
</div>
    
@endsection