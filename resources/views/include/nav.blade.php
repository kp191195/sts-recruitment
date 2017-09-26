<div class="top-bar">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="/assets/corlate-free-template/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="/dashboard">Dasboard</a></li>
                        <li><a href="/applicant">Applicant</a></li>
                        <li><a href="/administration">Administration</a></li>
                        <li><a href="/setting">Setting</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Blog Single</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">404</a></li>
                                <li><a href="#">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a></li> 
                        <li><a href="#">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Session::get('sessionUser.name')}}&nbsp;<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout">Log Out</a></li>
                            </ul>
                        </li>                      
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->