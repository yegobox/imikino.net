<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v3.3'
          });
        };
        
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=install_email
          page_id="286094315130272"
          theme_color="#13cf13"
            logged_in_greeting="Chat with Imikino.net now"
            logged_out_greeting="Chat with Imikino.net now">
        </div>
    {{--  <div id="chat">
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
    </div>  --}}
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
