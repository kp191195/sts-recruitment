<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>

         
        <!-- core CSS -->
        <link href="assets/corlate-free-template/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/corlate-free-template/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/corlate-free-template/css/animate.min.css" rel="stylesheet">
        <link href="assets/corlate-free-template/css/prettyPhoto.css" rel="stylesheet">
        <link href="assets/corlate-free-template/css/main.css" rel="stylesheet">
        <link href="assets/corlate-free-template/css/responsive.css" rel="stylesheet">

        <link rel="shortcut icon" href="assets/corlate-free-template/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/corlate-free-template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/corlate-free-template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/corlate-free-template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/corlate-free-template/images/ico/apple-touch-icon-57-precomposed.png">

        @yield('css')
    </head>
    <body>
        <header id="header">
            @yield('navigation')
        </header>
        
        @yield('content')

        <script src="assets/corlate-free-template/js/jquery.js"></script>
        <script src="assets/corlate-free-template/js/bootstrap.min.js"></script>
        <script src="assets/corlate-free-template/js/jquery.prettyPhoto.js"></script>
        <script src="assets/corlate-free-template/js/jquery.isotope.min.js"></script>
        <script src="assets/corlate-free-template/js/main.js"></script>
        <script src="assets/corlate-free-template/js/wow.min.js"></script>
        @yield('script')
    </body>
</html>