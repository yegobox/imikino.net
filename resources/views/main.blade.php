<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body>
    <div id="chat">
        <header class="baslik">
            <div class="kapat">-</div>
                <h4 style="color:white">Chat with Us</h4>
            <span class="sayac">3</span>
        </header>
    
        <div class="chat">
            <div class="mesaj-gecmisi">
                <div class="o">
                    <b>Imikino.net</b>
                    <img align='right'src='http://gravatar.com/avatar/7124bc62949227ac21a52e9533e6d478?s=80'width='30px'>
                    <div class="sil"></div>
                </div>
                <div class="o">
                    <img align='right'src='http://gravatar.com/avatar/7124bc62949227ac21a52e9533e6d478?s=80'width='30px'>
                    Dukurikire no kuri facebook
                    <a href="https://www.facebook.com/imikino.net" title="Imikino.net"> facebook.com/imikino.net</a>
                    <div class="sil"></div>
                </div>
            
                <div id="sonuc"></div>
            </div> 
            <p class="islem"></p>
            <form action="javascript:void(0)" method="post" id="form">
                <fieldset>				
                    <input type="text"  id="txt" placeholder="Andika ubutumwa hano..." autofocus>
                </fieldset>
            </form>
    
        </div>
    </div>
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
