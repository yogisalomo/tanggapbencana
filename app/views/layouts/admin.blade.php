<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Suitcommerce | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('backend/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- font Awesome -->
        <link href="{{asset('backend/css/bootstrap/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- Ionicons -->
        <link href="{{asset('backend/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- Theme style -->
        <link href="{{asset('backend/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('backend/css/datatables/dataTables.bootstrap.css')}}">

        <link href="{{asset('backend/css/bootstrap/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('backend/js/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('backend/js/moment.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap/bootstrap-datetimepicker.js')}}"></script>

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
                Suitcommerce
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
                                <li class="user-footer">
                                    <a href="{{url('member/myprofile')}}" class="btn btn-default btn-flat">My Profile</a>
                                </li>
                                <li class="user-footer">
                                    <a href="{{url('member/mydeposit')}}" class="btn btn-default btn-flat">My Deposit</a>
                                </li>
                                <li class="user-footer">
                                    <a href="{{url('member/transactionhistory')}}" class="btn btn-default btn-flat">Transaction History</a>
                                </li>
                                <li class="user-footer">
                                    <a href="{{url('member/message')}}" class="btn btn-default btn-flat">Messages</a>
                                </li>
                                @if (Auth::user()->role == 'seller')
                                    <li class="divider"></li>
                                    <li class="user-footer">
                                        <a href="{{url('seller/createproduct')}}" class="btn btn-info">New Product</a>
                                    </li>
                                    <li class="user-footer">
                                        <a href="{{url('seller/product')}}" class="btn btn-info">My Product</a>
                                    </li>
                                    <li class="user-footer">
                                        <a href="{{url('seller/feedback')}}" class="btn btn-info">Feedback</a>
                                    </li>
                                    <li class="user-footer">
                                        <a href="{{url('seller/notification')}}" class="btn btn-info">Notification</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'cs officer')
                                    <li class="divider"></li>
                                    <li class="user-footer">
                                        <a href="{{url('cs')}}" class="btn btn-warning">CS Dashboard</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                    <li class="divider"></li>
                                    <li class="user-footer">
                                        <a href="{{url('admin')}}" class="btn btn-warning">Admin Dashboard</a>
                                    </li>
                                @endif
                                <li class="divider"></li>
                                <li class="user-footer">
                                    <a href="{{url('logout')}}" class="btn btn-danger">Sign out</a>
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
                            <img src="{{asset('backend/img/avatar3.png')}}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{Auth::user()->username}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input class="form-control" id="typeahead" type="text" data-provide="typeahead" autocomplete="off" placeholder="Search..."/>
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
                                    <i class="fa fa-folder"></i> <span>Site</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("article"), 'Page' ) }}
                                    {{ HTML::nav_link(array("menuitems"), 'Menu' ) }}
                                    {{ HTML::nav_link(array("banner_images"), 'Banner' ) }}
                                    {{ HTML::nav_link(array("contactmessage"), 'Contact Form' ) }}
                                    {{ HTML::nav_link(array("advertisements"), 'Ads' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>User</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("user/buyer"), 'Buyers' ) }}
                                    {{ HTML::nav_link(array("user/seller"), 'Sellers' ) }}
                                    {{ HTML::nav_link(array("user/csofficer"), 'CS officers' ) }}
                                    {{ HTML::nav_link(array("user/admin"), 'Admin' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Supply</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("productsupply", "supplier"), 'Inbound Logistics' ) }}
                                    {{ HTML::nav_link(array("productsupply", "supplier"), 'Supliers' ) }}
                                    {{ HTML::nav_link(array("warehouses"), 'Warehouse' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Product</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("product"), 'Product Items' ) }}
                                    {{ HTML::nav_link(array("product/listcategory"), 'Category' ) }}
                                    {{ HTML::nav_link(array("product/listbrand"), 'Brand' ) }}
                                    {{ HTML::nav_link(array("#"), 'Review' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Transaction</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("order"), 'Cart' ) }}
                                    {{ HTML::nav_link(array("order"), 'Order' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Payment</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("paymentmethod"), 'Payment Method' ) }}
                                    {{ HTML::nav_link(array("#"), 'Verification' ) }}
                                    {{ HTML::nav_link(array("paymentconfirmation"), 'All Payment' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Shipping</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("shipping"), 'Order Tracking' ) }}
                                    {{ HTML::nav_link(array("shipping"), 'Courier Service' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Marketing</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("emails"), 'Newsletter' ) }}
                                    {{ HTML::nav_link(array("voucher"), 'Voucher' ) }}
                                    {{ HTML::nav_link(array("premiums"), 'Premium Seller' ) }}
                                </ul>
                            </li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Reporting</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    {{ HTML::nav_link(array("report"), 'Report' ) }}
                                    {{ HTML::nav_link(array("#"), 'Visitor Report' ) }}
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
                    <h1>
                        {{studly_case(@Auth::user()->role).' Dasboard'}}
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- Bootstrap -->
        <script src="{{asset('backend/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('backend/js/AdminLTE/app.js')}}" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->

        <script type="text/javascript" src="{{asset('backend/js/tinymce.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/jquery/jquery-ui.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/jquery/jquery.jeditable.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/jquery/jquery.validate.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/datatables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/datatables/jquery.dataTables.editable.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/plugins/highcharts/js/highcharts.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/plugins/highcharts/js/modules/funnel.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/plugins/highcharts/js/modules/exporting.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/plugins/tabletools/js/dataTables.tableTools.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/datatables/dataTables.bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/bootstrap/bootstrap3-typeahead.min.js')}}"></script>
        @yield('page_script')
        <script>
            $('#typeahead').typeahead({
                    minLength:2,
                    updater: function (item) {
                        var html = $.parseHTML(item);
                        console.log(html);
                        window.location.href = html[0].href;
                    },
                    source: function (query, process) {
                        return $.getJSON(
                            '{{url('search')}}/'+query,
                            {},
                            function (data) {
                                return process(data);
                            }
                        );
                    }
                });
        </script>
        <script type="text/javascript">
            $('#datepick1').datetimepicker({
                pickTime: false
            });
        </script>
    </body>
</html>
