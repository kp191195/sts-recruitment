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
        .container-content{
            background-color:#c4e9f2;
            position:fixed;
            top: 50%;
            left: 50%;
            width:100em;
            height:70em;
            margin-top: -35em; /*set to a negative number 1/2 of your height*/
            margin-left: -50em; /*set to a negative number 1/2 of your width*/
            border: 1px solid #ccc;
            
        }
    </style>
</head>

<body>
    <div class="container-content">
        <div class="center wow fadeInDown">
				<h2>Apply Job</h2>
        </div>
        <div align="center">
        <h2><strong>FORM LAMARAN</strong></h2>
        </div>
        
        <hr>
        <form class="form-horizontal" action="/applyJob" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="jobId" value="{{$jobId}}">
            <input type="hidden" name="jobName" value="{{$jobName}}">
            <input type="hidden" name="jobDesc" value="{{$jobDesc}}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="txtName">Name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtName" placeholder="Enter name" name="txtName">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="txtEmail">Email:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="txtEmail" placeholder="Enter email" name="txtEmail">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="txtPhone">Phone:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtPhone" placeholder="Enter phone number" name="txtPhone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="fileCv">CV:</label>
                <div class="col-sm-4">
                    <input type="file" id="fileCv" name="fileCv">
                </div>
            </div>
            <div class="form-group">
                
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="fileOthers">Other Files:</label>
                <div class = "col-sm-6">
                    <div class="input_fields_wrap">
                        <div><input type="file" name="mytext[]"></div>
                        
                    </div>
                    <a href="#" class="add_field_button">Add More Fields</a>
                </div>
                
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
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
                    $(wrapper).append('<div class="row rp"><div class="col-sm-4"><input type="file" name="mytext[]"/></div><div class="col-sm-4"><a href="#" class="remove_field">remove</a></div></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).closest('.rp').remove(); x--;
            })
        });
        </script>
</body>
</html>