<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tanggap Bencana | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/moment.js')}}"></script>
        <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Tanggap Bencana
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{Auth::user()->username}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                        <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('img/avatar3.png')}}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{Auth::user()->username}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu"> 
                        @if (Auth::user()->role == 'admin')                       
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Admin</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{HTML::nav_link("admin/users", 'User')}}
                                    {{HTML::nav_link("admin/disasters", 'Disaster')}}
                                    {{HTML::nav_link("admin/disaster_categories", 'Disaster Category')}}
                                    {{HTML::nav_link("admin/requests", 'Request')}}
                                    {{HTML::nav_link("admin/responses", 'Response')}}
                                    {{HTML::nav_link("admin/reports", 'Report')}}
                                    {{HTML::nav_link("admin/statistics", 'Disaster Statistics')}}
                                    {{HTML::nav_link("admin/sms", 'SMS Requests')}}
                                </ul>
                            </li>
                        @endif
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <?php
                        $link = explode('/', Request::path());
                        $head = str_singular($link[0]);
                    ?>
                    <h1>
                        {{studly_case(str_singular($link[0]))}}
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- Bootstrap -->
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        @yield('script')
        <script type="text/javascript">
            $('#datepick1').datetimepicker({
                pickTime: false
            });
            $('#datepick2').datetimepicker({
                pickTime: false
            });
            $('#datepick3').datetimepicker({
                pickTime: false
            });
        </script>
    </body>
</html>
