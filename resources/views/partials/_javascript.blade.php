    <script src="/owl-carousel/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
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
    <script src="dashboard/dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
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
    <script id="spout-tag-911a7d45-a7c6-4f9c-b183-902227549288">
        (function() {
          var r = encodeURIComponent(top.document.referrer.substring(0,250)),
              p = encodeURIComponent(top.document.location.href.substring(0,250)),
              t = Date.now(),
              u = '911a7d45-a7c6-4f9c-b183-902227549288',
              e = document.createElement('script'),
              s = sessionStorage.getItem('spoutable-' + u);
          if (!s) {
            var m = Math.random.bind(Math);
            s = JSON.stringify({ sessionId: [ t, m(), m(), m(), m(), m(), m(), m(), m(), m(), m(), m(), m() ]});
            sessionStorage.setItem('spoutable-' + u, s);
          }
          e.async = true;
          e.src='//s.spoutable.com/s?u='+u+'&s='+encodeURIComponent(s)+'&t='+t+'&r='+r+'&p='+p;
          document.head.appendChild(e);
        })();
    </script>