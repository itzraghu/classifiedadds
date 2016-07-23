<!DOCTYPE html>

<html>

<head>        

    <!-- Title -->

    <title> @yield('title') | ClickBuySell </title>



    <meta content="width=device-width, initial-scale=1" name="viewport"/>

    <meta charset="UTF-8">

    <meta name="description" content="Dashboard" />

    <meta name="keywords" content="" />

    <meta name="author" content="Steelcoders" />        

    <!-- Styles -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    {{ Html::style('admin/assets/plugins/pace-master/themes/blue/pace-theme-flash.css')}}

    {{ Html::style('admin/assets/plugins/uniform/css/uniform.default.min.css')}}

    {{ Html::style('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}

    {{ Html::style('admin/assets/plugins/fontawesome/css/font-awesome.css')}}

    {{ Html::style('admin/assets/plugins/line-icons/simple-line-icons.css')}}

    {{ Html::style('admin/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css')}}

    {{ Html::style('admin/assets/plugins/waves/waves.min.css')}}

    {{ Html::style('admin/assets/plugins/switchery/switchery.min.css')}}

    {{ Html::style('admin/assets/plugins/3d-bold-navigation/css/style.css')}}

    {{ Html::style('admin/assets/plugins/slidepushmenus/css/component.css')}}

    {{ Html::style('admin/assets/plugins/weather-icons-master/css/weather-icons.min.css')}}

    {{ Html::style('admin/assets/plugins/metrojs/MetroJs.min.css')}}

    {{ Html::style('admin/assets/plugins/toastr/toastr.min.css')}}

    {{ Html::style('admin/assets/css/modern.css')}}

    {{ Html::style('admin/assets/css/themes/white.css')}}

    {{ Html::style('admin/assets/css/custom.css')}}

    {{ Html::script('admin/assets/plugins/3d-bold-navigation/js/modernizr.js')}}

    {{ Html::script('admin/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js')}}       



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->

        

    </head>

    <body class="page-header-fixed">

        <div class="overlay"></div>

        @include('common.admin.header')

        <main class="page-content content-wrap">

            <div class="navbar">

                <div class="navbar-inner">

                    <div class="sidebar-pusher">

                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">

                            <i class="fa fa-bars"></i>

                        </a>

                    </div>

                    <div class="logo-box">

                        <a href="index.html" class="logo-text"><span>ClickBuySell</span></a>

                    </div><!-- Logo Box -->

                    <div class="search-button">

                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>

                    </div>

                    <div class="topmenu-outer">

                        <div class="top-menu">

                            <ul class="nav navbar-nav navbar-left">

                                <li>		

                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>

                                </li>                                



                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li>	

                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>

                                </li>

                                

                                <li>

                                    <a href="{{URL('logout')}}" class="log-out waves-effect waves-button waves-classic">

                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>

                                    </a>

                                </li>

                                

                            </ul><!-- Nav -->

                        </div><!-- Top Menu -->

                    </div>

                </div>

            </div><!-- Navbar -->

            <div class="page-sidebar sidebar">

                <div class="page-sidebar-inner slimscroll">                 

                    <ul class="menu accordion-menu">

                        <li class="{{isActiveRoute('admin/dashboard')}}"><a href="{{URL('admin/dashboard')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li> 

                        <li class="{{isActiveRoute('admin/get_categories')}}"><a href="{{URL('admin/get_categories')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Category</p></a></li>

                        <li class="{{isActiveRoute('admin/add_category')}}"><a href="{{URL('admin/add_category')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Add Main Category</p></a></li>

                        <li class="{{isActiveRoute('admin/get_sub_categories')}}"><a href="{{URL('admin/get_sub_categories')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Sub Category</p></a></li>

                        <li class="{{isActiveRoute('admin/add_sub_category')}}"><a href="{{URL('admin/add_sub_category')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Add Sub Category</p></a></li>

                        <li class="{{isActiveRoute('admin/cities')}}"><a href="{{URL('admin/cities')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Cities</p></a></li>

                        <li class="{{isActiveRoute('admin/add_city')}}"><a href="{{URL('admin/add_city')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Add City</p></a></li>

                        <li class="{{isActiveRoute('admin/get_adds')}}"><a href="{{URL('admin/get_adds')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Adds</p></a></li>



                    </ul>

                </div><!-- Page Sidebar Inner -->

            </div><!-- Page Sidebar -->

            <div class="page-inner">

                @yield('page-title')

                @yield('page-content')


                <div class="page-footer">

                    <p class="no-s">2016 &copy; RonyInfoTech Pvt Ltd.</p>

                </div>

            </div><!-- Page Inner --> 



        </main><!-- Page Content -->

        <nav class="cd-nav-container" id="cd-nav">

            <header>

                <h3>Navigation</h3>

                <a href="#0" class="cd-close-nav">Close</a>

            </header>

            <ul class="cd-nav list-unstyled">

                <li class="cd-selected" data-menu="index">

                    <a href="javsacript:void(0);">

                        <span>

                            <i class="glyphicon glyphicon-home"></i>

                        </span>

                        <p>Dashboard</p>

                    </a>

                </li>

                <li data-menu="profile">

                    <a href="javsacript:void(0);">

                        <span>

                            <i class="glyphicon glyphicon-user"></i>

                        </span>

                        <p>Profile</p>

                    </a>

                </li>

                <li data-menu="inbox">

                    <a href="javsacript:void(0);">

                        <span>

                            <i class="glyphicon glyphicon-envelope"></i>

                        </span>

                        <p>Mailbox</p>

                    </a>

                </li>

                <li data-menu="#">

                    <a href="javsacript:void(0);">

                        <span>

                            <i class="glyphicon glyphicon-tasks"></i>

                        </span>

                        <p>Tasks</p>

                    </a>

                </li>

                <li data-menu="#">

                    <a href="javsacript:void(0);">

                        <span>

                            <i class="glyphicon glyphicon-cog"></i>

                        </span>

                        <p>Settings</p>

                    </a>

                </li>

                <li data-menu="calendar">

                    <a href="javsacript:void(0);">

                        <span>

                            <i class="glyphicon glyphicon-calendar"></i>

                        </span>

                        <p>Calendar</p>

                    </a>

                </li>

            </ul>

        </nav>

        <div class="cd-overlay"></div>



        <!-- Javascripts -->

        {{ Html::script('admin/assets/plugins/jquery/jquery-2.1.3.min.js')}}


        {{ Html::script('admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}

        {{ Html::script('admin/assets/js/mycustom.js')}}

        {{ Html::script('admin/assets/plugins/pace-master/pace.min.js')}}

        {{ Html::script('admin/assets/plugins/jquery-blockui/jquery.blockui.js')}}

        {{ Html::script('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}

        {{ Html::script('admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}

        {{ Html::script('admin/assets/plugins/switchery/switchery.min.js')}}

        {{ Html::script('admin/assets/plugins/uniform/jquery.uniform.min.js')}}

        {{ Html::script('admin/assets/plugins/offcanvasmenueffects/js/classie.js')}}

        {{ Html::script('admin/assets/plugins/offcanvasmenueffects/js/main.js')}}

        {{ Html::script('admin/assets/plugins/waves/waves.min.js')}}

        {{ Html::script('admin/assets/plugins/3d-bold-navigation/js/main.js')}}

        {{ Html::script('admin/assets/plugins/waypoints/jquery.waypoints.min.js')}}

        {{ Html::script('admin/assets/plugins/jquery-counterup/jquery.counterup.min.js')}}

        {{ Html::script('admin/assets/plugins/toastr/toastr.min.js')}}

        {{ Html::script('admin/assets/plugins/flot/jquery.flot.min.js')}}

        {{ Html::script('admin/assets/plugins/flot/jquery.flot.time.min.js')}}

        {{ Html::script('admin/assets/plugins/flot/jquery.flot.symbol.min.js')}}

        {{ Html::script('admin/assets/plugins/flot/jquery.flot.resize.min.js')}}

        {{ Html::script('admin/assets/plugins/flot/jquery.flot.tooltip.min.js')}}

        {{ Html::script('admin/assets/plugins/curvedlines/curvedLines.js')}}

        {{ Html::script('admin/assets/plugins/metrojs/MetroJs.min.js')}}

        {{ Html::script('admin/assets/js/modern.js')}}

        {{ Html::script('admin/assets/js/pages/dashboard.js')}}
        


    </body>

    </html>