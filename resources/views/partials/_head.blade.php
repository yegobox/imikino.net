    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="author" content="Igor Jean-Luc Ndiramiye">
	
	<title>@yield('title') | imikino.rw</title>
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"  type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/owl-carousel/owl.theme.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
	<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	
	<!-- Custom Fonts -->
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css"  type="text/css">
	
	<script src="https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js"></script>


	
	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105882306-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments)};
	gtag('js', new Date());

	gtag('config', 'UA-105882306-1');
	</script>

	<!-- jQuery and Modernizr-->
	<script src="/js/jquery-2.1.1.js"></script>
	
	<!-- Core JavaScript Files -->  	 
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-1415997400693835",
		enable_page_level_ads: true
	});
	</script>
	
	@yield('stylesheets')
	
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->