<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SuitCRM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('img/apple-touch-icon-144-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('img/apple-touch-icon-114-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('img/apple-touch-icon-72-precomposed.png')}}">
  <link rel="apple-touch-icon-precomposed" href="{{asset('img/apple-touch-icon-57-precomposed.png')}}">
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
  
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap3-typeahead.min.js')}}"></script>
	<script src="{{asset('js/moment.js')}}"></script>
	<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
	<script src="{{asset('js/highcharts.js')}}"></script>
	<script src="{{asset('js/modules/funnel.js')}}"></script>
	<script src="{{asset('js/modules/drilldown.js')}}"></script>
	<script src="{{asset('js/modules/exporting.js')}}"></script>
	<script src="{{asset('js/modules/data.js')}}"></script>


</head>

<body>
	@yield('style')

	@include('layouts.alert')

	<div class="content">
		<div class="container">
			@yield('content')
		</div>
	</div>

	@yield('script')

	<script>
		$(".alert").fadeIn(500).fadeTo(2000, 500).slideUp(500, function(){
		    $(".alert").alert('close');
		});

		$('#datepick').datetimepicker({
			pickTime: false
		});

		$('#search-box').typeahead({
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
