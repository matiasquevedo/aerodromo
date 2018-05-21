<html>
	<head>
		<meta>
		<title>@yield('title')</title>

		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">	
		<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
		<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css')}}">
		<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.css')}}">
		<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
		<script src="{{asset('plugins/qtip/jquery.qtip.min.js')}}"></script>
		<script src="{{asset('plugins/fullcalendar/lib/jquery.min.js')}}"></script>
	</head>
	<body>
		
		@include('admin.template.partials.nav')
		@include('flash::message')
		<section>
			@yield('content')
			

		</section>
		
		<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
		<script src="{{asset('plugins/trumbowyg/dist/trumbowyg.js')}}"></script>
		<script src="{{asset('plugins/fullcalendar/lib/moment.min.js')}}"></script>
		<script src="{{asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>
		<script src="{{asset('plugins/fullcalendar/locale/es.js')}}"></script>

		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		@yield('js')
	</body>

</html>