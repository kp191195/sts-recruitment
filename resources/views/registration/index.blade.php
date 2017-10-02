<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Corlate</title>
	
    <!-- core CSS -->
    <link href="/assets/corlate-free-template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/corlate-free-template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/corlate-free-template/css/animate.min.css" rel="stylesheet">
    <link href="/assets/corlate-free-template/css/prettyPhoto.css" rel="stylesheet">
    <link href="/assets/corlate-free-template/css/main.css" rel="stylesheet">
    <link href="/assets/corlate-free-template/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="assets/corlate-free-template/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/corlate-free-template/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/corlate-free-template/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/corlate-free-template/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/corlate-free-template/images/ico/apple-touch-icon-57-precomposed.png">
    <style>

        body
        {
            background-color: #CBFEBC;
        }

       #appliedJob{
            background-color: #FFF;
            margin: auto;
            margin-top: 40px;
            height: auto;
            width: 600px;
            border: 1px solid #ddd;
            border-radius: 25px;
            padding: 25px;
       }

       h2{
        margin-bottom: 35px;
       }

       .margintop
       {
        margin-top: 10px;
       }
    </style>
</head>

<body>
    <div id="appliedJob">
        
        <div align="center">
        <img src="/assets/corlate-free-template/images/sts-logo.png" alt="Avatar" class="avatar">
        <h2><strong>FORM LAMARAN</strong></h2>
        <form class="form-horizontal" action="/applyJob" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="jobId" value="{{$jobId}}">
            <input type="hidden" name="jobName" value="{{$jobName}}">
            <input type="hidden" name="jobDesc" value="{{$jobDesc}}">
            <div class="form-group">
                <label class="control-label col-sm-4" for="txtName">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtName" placeholder="Enter name" name="txtName">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="txtEmail">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="txtEmail" placeholder="Enter email" name="txtEmail">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="txtPhone">Phone:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtPhone" placeholder="Enter phone number" name="txtPhone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="fileCv">CV:</label>
                <div class="col-sm-8">
                    <input type="file" id="fileCv" name="fileCv">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 for="fileOthers">Other Files:</label>
                <div class = "col-sm-8">
                    <div class="input_fields_wrap">
                        <div><input type="file" name="mytext[]"></div>
                    </div>
                    <a href="#" class="add_field_button" style="padding-bottom: 10px;">Add More Fields</a>
                </div>
                
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>    

        <script src="/assets/corlate-free-template/js/jquery.js"></script>
        <script src="/assets/corlate-free-template/js/bootstrap.min.js"></script>
        <script src="/assets/corlate-free-template/js/jquery.prettyPhoto.js"></script>
        <script src="/assets/corlate-free-template/js/jquery.isotope.min.js"></script>
        <script src="/assets/corlate-free-template/js/main.js"></script>
        <script src="/assets/corlate-free-template/js/wow.min.js"></script>
        <script>
            $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row rp"><div class="col-sm-8 margintop"><input type="file" name="mytext[]" style="margin-left:40px;"/></div><div class="col-sm-8"><a href="#" class="remove_field">remove</a></div></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).closest('.rp').remove(); x--;
            })
        });
        </script>
</body>
</html>