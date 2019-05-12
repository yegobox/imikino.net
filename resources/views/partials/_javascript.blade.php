
  <!-- JS -->
  <script src="js/bootstrap.min.js"></script>
  <script src="owl-carousel/owl.carousel.js"></script>
  <script src="{{ asset('js/chat.js') }}"></script>
  <script>
    $(document).ready(function() {
      //Check to see if the window is top if not then display button
      /*$(window).scroll(function() {
        $('.scrollToTop').fadeIn();
        $('.scrollToTop').click(function(){
          $('.scrollToTop').fadeOut();
          $(.'scrollToTop2').fadeIn();
        });
        $('.scrollToTop').click(function() {
          $('html, body').animate({
              scrollTop: 0
          }, 800);
        });
      });*/
      $("#owl-demo-1").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [400,1]
      });
	  $("#owl-demo-2").owlCarousel({
        autoPlay: 3000,
        items : 3,
        
      });
    });
  </script>
	
	
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
    </script>