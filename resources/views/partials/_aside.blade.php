<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-follow">
						<div class="heading"><h4>Follow Us</h4></div>
						<div class="content">
							<ul class="list-inline">
								<li>
									<a href="facebook.com/">
										<div class="box-facebook">
											<span class="fa fa-facebook fa-2x icon"></span>
											<!--<span>1250</span>
											<span>Fans</span>-->
										</div>
									</a>
								</li>
								<li>
									<a href="facebook.com/">
										<div class="box-twitter">
											<span class="fa fa-twitter fa-2x icon"></span>
											<!--<span>1250</span>
											<span>Fans</span>-->
										</div>
									</a>
								</li>
								<li>
									<a href="facebook.com/">
										<div class="box-google">
											<span class="fa fa-google-plus fa-2x icon"></span>
											<!--<span>1250</span>
											<span>Fans</span>-->
										</div>
									</a>
								</li>
							</ul>
							<!--<img src="images/banner.jpg" />-->
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget ">
						<div class="heading"><h4>Izikunzwe Cyane</h4></div>
						<div class="content">
							@foreach( $asides as $aside)
							<div style="margin-bottom:12px" class="wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<!--<span class="vimeo">{{ $aside->sport_id }}</span>-->
										<a href="{{ url($aside->slug) }}">
											<i class="fa fa-play-text-o fa-5x" style="color:lightbluesky"></i>
										</a>
										<p style="font-size: 1.5em; font-weight: lighter; text-shadow: 5px 2px 4px #052B41;">{{ ucfirst(substr($aside->title, 0, 150)) }}{{ ucfirst(strlen($aside->title) > 150 ? '...' : "") }}</p>
									</div>
									<img src="{{ asset('images/news/'. $aside->image) }}" />
								</div>
								<div style="margin-top:10px" class="info">
									<h5>By <a href="#">{{ ucfirst($aside->author) }}</a></h5>
									<span><i class="fa fa-calendar"></i>{{ date('M j, Y h:ia', strtotime($aside->created_at)) }}</span> 
									<span><i class="fa fa-eye"></i>{{ $aside->views }} Views</span>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget ">
						<div class="heading"><h4>Iziheruka Kwandikwa</h4></div>
						<div class="content">
							@foreach( $newones as $newone)
							<div style="margin-bottom:12px" class="wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<!--<span class="vimeo">{{ $newone->sport_id }}</span>-->
										<a href="{{ url($newone->slug) }}">
											<i class="fa fa-play-text-o fa-5x" style="color:lightbluesky"></i>
										</a>
										<p style="font-size: 1.5em; font-weight: lighter; text-shadow: 5px 2px 4px #052B41;">{{ ucfirst(substr($newone->title, 0, 150)) }}{{ ucfirst(strlen($newone->title) > 150 ? '...' : "") }}</p>
									</div>
									<img src="{{ asset('images/news/'. $newone->image) }}" />
								</div>
								<div style="margin-top:10px" class="info">
									<h5>By <a href="#">{{ ucfirst($newone->author) }}</a></h5>
									<span><i class="fa fa-calendar"></i>{{ date('M j, Y h:ia', strtotime($newone->created_at)) }}</span> 
									<span><i class="fa fa-eye"></i>{{ $newone->views }} Views</span>
								</div>
							</div>
							@endforeach
						</div>
						<!-- Composite Start -->
						<div id="M311506ScriptRootC203917">
							<div id="M311506PreloadC203917">
							Loading...    </div>
							<script>
									(function(){
								var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
								var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M311506ScriptRootC203917")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
								catch(e){var iw=d;var c=d[gi]("M311506ScriptRootC203917");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=203917;c[ac](dv);
								var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/i/m/imikino.net.203917.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
						</script>
						</div>
<!-- Composite End -->
					</div>
				</div>