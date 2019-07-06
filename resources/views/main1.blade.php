<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Igor Jean-Luc Ndiramiye">
    <meta property="fb:app_id" content="465177240507172" />
    <meta property="og:title" content="{{ ucfirst($post->title) }}"/>
    <meta property="og:type" content="Blog post"/>
    <meta property="og:url" content="https://imikino.rw/{{ $post->slug }}"/>
    <meta property="og:image" content="{{asset('images/news/'. $post->image) }}"/>
    <meta property="og:site_name" content="imikino.rw"/>
	
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
</head>

<body>
    @include('partials._analyticsandface')
    <header>
        <!--Top-->
        @include('partials._navtop')
        
        <!--Navigation-->
        @include('partials._nav')
    </header>
	@yield('content')

	@include('partials._footer')
	<!-- Footer -->
	
	<!-- JS -->
	@include('partials._javascript')

    @yield('scripts')
</body>
</html>
