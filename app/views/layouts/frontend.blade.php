<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SuitCommerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

    <link href="{{asset('backend/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('backend/plugins/tabletools/css/dataTables.tableTools.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link href="{{asset('backend/css/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/bootstrap/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('backend/img/apple-touch-icon-144-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('backend/img/apple-touch-icon-114-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('backend/img/apple-touch-icon-72-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" href="{{asset('backend/img/apple-touch-icon-57-precomposed.png')}}">
  <link rel="shortcut icon" href="{{asset('backend/img/favicon.png')}}">

</head>

<body>
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="{{url()}}">SuitCommerce</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {{Form::open(['url' => 'searchproduct', 'class'=> 'navbar-form navbar-left', 'method' => 'get'])}}
                    <div class="form-group">
                        {{Form::text('q', !empty(Input::get('q'))?Input::get('q'):'', ['class'=>'form-control'])}}
                    </div>
                    {{Form::submit('Search', ['class'=>'form-control'])}}
                {{Form::close()}}
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shopping Cart</a> -->
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">Barang 1</a>
                            </li>
                            <li>
                                <a href="">Barang 2</a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::check())

                        {{HTML::menu_items_by_type("secondary_login")}}

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello, {{Auth::user()->username}}</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('member/myprofile')}}">My Profile</a>
                                </li>
                                <li>
                                    <a href="{{url('member/mydeposit')}}">My Deposit</a>
                                </li>
                                <li>
                                    <a href="{{url('member/transactionhistory')}}">Transaction History</a>
                                </li>
                                <li>
                                    <a href="{{url('member/message')}}">Messages</a>
                                </li>
                                @if (Auth::user()->role == 'seller')
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{url('seller/createproduct')}}">New Product</a>
                                    </li>
                                    <li>
                                        <a href="{{url('seller/product')}}">My Product</a>
                                    </li>
                                    <li>
                                        <a href="{{url('seller/feedback')}}">Feedback</a>
                                    </li>
                                    <li>
                                        <a href="{{url('seller/notification')}}">Notification</a>
                                    </li>
                                    <li>
                                        <a href="{{url('seller/salesreport')}}">Sales Report</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'cs officer')
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{url('cs')}}">CS Dashboard</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{url('admin')}}">Admin Dashboard</a>
                                    </li>
                                @endif
                                <li class="divider"></li>
                                <li>
                                    <a href="{{url('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else

                        {{HTML::menu_items_by_type("secondary_guest")}}

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul class="nav nav-tabs">

            {{HTML::menu_items_by_type("primary")}}

<!--        <li><a href="{{url('shoppingcart')}}">Shopping Cart</a></li>
            <li><a href="{{url('trackorder')}}">Track Order</a></li>
            <li><a href="{{url('paymentconfirmation')}}">Payment Confirmation</a></li>
            <li><a href="{{url('sendconfirmation')}}">Send Confirmation</a></li>
            <li><a href="{{url('usertransaction')}}">Detail Transaction</a></li>
            <li><a href="{{url('posts')}}">Post</a></li>
            <li><a href="{{url('contactus')}}">Contact Us</a></li> -->
        </ul>
        <ul class="nav nav-tabs">

            {{HTML::menu_items_by_type("support")}}

        </ul>
    </div>
    <div class="content">
        <div class="container well">
            @yield('content')
        </div>
    </div>

<script type="text/javascript" src="{{asset('backend/js/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery/jquery.jeditable.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/datatables/jquery.dataTables.editable.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/highcharts/highcharts.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/highcharts/modules/funnel.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/highcharts/modules/exporting.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/tabletools/js/dataTables.tableTools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/bootstrap/bootstrap3-typeahead.min.js')}}"></script>
<script src="{{asset('backend/js/moment.js')}}"></script>
<script src="{{asset('backend/js/bootstrap/bootstrap-datetimepicker.js')}}"></script>
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
</body>
</html>
