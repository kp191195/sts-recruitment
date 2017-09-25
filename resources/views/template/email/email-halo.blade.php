<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
        <div class="form-group">
            <p>
                Selamat kepada {{$name}}, karena sudah berhasil melalui tahap screening.<br>
                Berikut ini adalah jadwal untuk interview, sebagai tindak lanjut dari lolos tahap screening :
            </p>
        </div>

        <div class="row">
            
                Tertanggal : {{$meetingDate}}
        </div>

        <div class="row">
            
                Pukul : {{$meetingTime}} s/d selesai
          
        </div>

        <div class="row">
            
                Tempat : {{$meetingLocation}}
           
        </div>

        <div class="row">
            
                Bertemu dengan : {{$picName}}
            
        </div>

        <div class="form-group">
            <p>Demikian pesan ini. Kami sampaikan. Apabila ada kendala pada waktu dan tempat seperti disebutkan di atas, klik di <a href="#">sini</a>.</p>
        </div>
    </div>
    </body>
</html>
    
