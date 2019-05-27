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
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=install_email
  page_id="286094315130272"
  theme_color="#13cf13"
    logged_in_greeting="Chat with Imikino.net now"
    logged_out_greeting="Chat with Imikino.net now">
</div>

{{-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '465177240507172',
      xfbml      : true,
      version    : 'v3.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> --}}
<script>
  (function(i,s,o,g,r,­a,m){i['GoogleAnalyt­icsObject']=r;i[r]=i­[r]||function(){
  (i[r].q=i[r].q||[]).­push(arguments)},i[r­].l=1*new Date();a=s.createEle­ment(o),
  m=s.getElementsByTag­Name(o)[0];a.async=1­;a.src=g;m.parentNod­e.insertBefore(a,m)
  })(window,document,'­script','https://­www.google-analytics.­com/analytics.js','ga');
  
  ga('create', 'UA-102050556-1', 'auto');
  ga('send', 'pageview');
  
</script>


