<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SuitCommerce - E-commerce platform by Suitmedia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

    <link href="{{asset('backend/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/datatables/jquery.dataTables_themeroller.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/datatables/jquery.dataTables_themeroller.min.css')}}" rel="stylesheet">

    <style>
        body {
            background: #18bc9c;
        }
    </style>

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
      <script type="text/javascript">
         var RecaptchaOptions = {
            theme : 'custom',
            custom_theme_widget: 'recaptcha_widget'
         };

      </script>
</head>

<body>
    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="{{asset('backend/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/scripts.js')}}"></script>
    <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
@yield('page_script')
</body>
</html>
