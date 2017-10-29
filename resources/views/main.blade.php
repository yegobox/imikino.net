<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
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
