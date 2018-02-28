@extends('main')

@section('title', 'Home')

@section('content')
<!--
	<div style="background:none; border: none" align="center" class="text-center featured container">
		<script type="text/javascript" src="//ylx-1.com/bnr.php?section=General&pub=838947&format=728x90&ga=g"></script>
		<noscript><a href="https://yllix.com/publishers/838947" target="_blank"><img src="//ylx-aff.advertica-cdn.com/pub/728x90.png" style="border:none;margin:0;padding:0;vertical-align:baseline;" /></a></noscript>
	</div>
-->
    <div class="featured container">
		<div class="row">
			<div class="col-sm-8">
				<!-- Carousel -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					@foreach($firsts as $first)
						<div class="item active">
							<img src="{{asset('images/news/'. $first->image) }}" alt="First slide">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
									<br>
									<h3 style="text-shadow: 5px 4px 4px black"><a href="{{ url($first->slug) }}">{{ $first->title }}</a></h3>
								</div>
							</div><!-- /header-text -->
						</div>
					@endforeach
					@foreach($others as $other)
						<div class="item">
							<img src="{{asset('images/news/'. $other->image) }}" alt="Second slide">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
									<br>
									<h3 style="text-shadow: 5px 4px 4px black"><a href="{{ url($other->slug) }}">{{ $other->title }}</a></h3>
								</div>
							</div><!-- /header-text -->
						</div>
					@endforeach
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div><!-- /carousel -->
			</div>
			<div class="col-sm-4" >
				<div id="owl-demo-1" class="owl-carousel">
					<img src="{{asset('images/ads.png')}}" />
					<img src="images/ads.png" />
					<img src="images/ads.png" />
				</div>
				<!--<img src="images/pub/ads.png" />-->
			</div>
		</div>
	</div>
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page container">
		<div class="row">
			<div id="main-content"><!-- background not working -->
				<div class="col-md-6">
					<div class="box">
						<div class="box-header header-natural">
							<h2>Inkuru ziheruka kwandikwa</h2>
						</div>
						<div class="box-content">
							<div class="row hidden-sm hidden-xs">
							@foreach($lists as $list)
								<div style="margin-bottom:5px" class="col-md-6">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<!--<span class="vimeo">{{ $list->sport_id }}</span>-->
												<a href="{{ url($list->slug) }}">
													<i class="fa fa-text-o fa-5x" style="color:lightbluesky"></i>
												</a>
												<p style="font-size: 1.1em; font-weight: lighter; text-shadow: 5px 2px 4px #052B41;">{{ substr($list->title, 0, 80) }}{{ strlen($list->title) > 80 ? '...' : "" }}</p>
											</div>
											<img src="{{ asset('images/news/'. $list->image) }}" />
										</div>
										<div class="info">
											<p>By <a href="#">{{ $list->author }}</a></p>
											<span><i class="fa fa-calendar"></i>{{ date('M j, Y h:ia', strtotime($list->created_at)) }}</span> 
											<span><i class="fa fa-eye"></i>{{ $list->views }} Views</span>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							<div class="row hidden-lg hidden-md">
							@foreach($lists as $list)
								<div style="margin-bottom:20px" class="col-lg-12 col-sm-12">
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-xs-6">
											<a href="{{ url($list->slug) }}"><img class="img-responsive" src="{{ asset('images/news/'. $list->image) }}" /></a>
											<p style="text-align:justify;">
												<span style="font-size: 0.8em;">By <a href="#">{{ $list->author }}</a></span>
											</p>
										</div>
										<div style="font-size: 0.9em; text-align:justify;line-height: 1.2;vertical-align:center" class="col-lg-6 col-sm-6 col-xs-6">
											<a href="{{ url($list->slug) }}">{{ substr($list->title, 0, 150) }}{{ strlen($list->title) > 150 ? '...' : "" }}</a>
											<p style="text-align:justify;">
												<span style="font-size: 0.7em;"><i class="fa fa-calendar"></i> {{ date('D jS, M h:ia', strtotime($list->created_at)) }}  <i class="fa fa-eye"></i>{{ $list->views }} Views</span>
											</p>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-header header-photo">
							<h2>Amafoto</h2>
						</div>
						<div class="box-content">
							<div id="owl-demo-2" class="owl-carousel">
								<div class="item">
								@foreach($imgs1 as $img)
									<a href="{{ url($img->slug) }}"><img src="{{ asset('images/news/'. $img->image) }}" /></a>
								@endforeach
								</div>
								<div class="item">
								@foreach($imgs2 as $img)
									<a href="{{ url($img->slug) }}"><img src="{{ asset('images/news/'. $img->image) }}" /></a>
								@endforeach
								</div>
								<div class="item">
								@foreach($imgs3 as $img)
									<a href="{{ url($img->slug) }}"><img src="{{ asset('images/news/'. $img->image) }}" /></a>
								@endforeach
								</div>
								<div class="item">
								@foreach($imgs4 as $img)
									<a href="{{ url($img->slug) }}"><img src="{{ asset('images/news/'. $img->image) }}" /></a>
								@endforeach
								</div>
								<div class="item">
								@foreach($imgs5 as $img)
									<a href="{{ url($img->slug) }}"><img src="{{ asset('images/news/'. $img->image) }}" /></a>
								@endforeach
								</div>
							</div>
						</div>
						<!-- Composite Start -->
					<!--
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
					-->
						<!-- Composite End -->
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="col-md-3">
					<!-- Start Widget -->
					<div class="widget wid-vid">
						<div class="heading">
							<h4>Izisurwa cyane</h4>
						</div>
						<div class="content">
							<div class="row">
								<div class="col-md-12 text-center">
								@foreach($asides as $aside)
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<!--<span class="vimeo">{{ $aside->sport_id }}</span>-->
												<a href="{{ url($aside->slug) }}">
													<i class="fa fa-file-text-o fa-5x" style="color: lightskyblue"></i>
												</a>
												<p style="font-size:12px">{{ substr($aside->title,0, 100) }}{{ strlen($aside->title) > 100 ? "..." : '' }}</p>
											</div>
											<div align="center"><img style="position:relative;height:150px" src="{{ asset('images/news/'. $aside->image) }}" /></div>
										</div>
										<div class="info">
											<span><i class="fa fa-calendar"></i>{{ date('M j, Y', strtotime($aside->created_at)) }}</span> 
											<span><i class="fa fa-eye"></i>{{ $aside->views }} Views</span>
										</div>
									</div>
								@endforeach
								</div>

								<div class="col-md-12">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
										<!-- Ad 1 -->
										<ins class="adsbygoogle"
											style="display:inline-block;width:300px;height:600px"
											data-ad-client="ca-pub-1410948886873143"
											data-ad-slot="3346196762"></ins>
										<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
								<!-- Composite Start -->
							<!--
								<div class="col-md-12" id="M311506ScriptRootC203917">
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
							-->
								<!-- Composite End -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<!---- Start Widget ---->
					<div class="widget wid-tags">
						<div class="heading"><h4>Shakisha</h4></div>
						<div class="content">
							<form role="form" class="form-horizontal" method="post" action="">
								<input type="text" placeholder="Enter Search Keywords" value="" name="v_search" id="v_search" class="form-control">
							</form>
						</div>
					</div>

					<!-- Composite Start -->
				<!--
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
				-->
					<!-- Composite End -->

					<!---- Start Widget ---->
					<div class="widget wid-tags">
						<div class="heading"><h4>Inkuru za :</h4></div>
						<div class="content">
							@foreach($tags as $tag)
								<a href="{{ route('tags', $tag->id) }}">{{ $tag->name }}</a>
							@endforeach
						</div>
					</div>
					<!---- Start Widget ---->
					<!--<div class="widget wid-comment">
						<div class="heading"><h4>Top Comments</h4></div>
						<div class="content">
							<div class="post">
								<a href="single.html">
									<img src="images/ava-1.jpg" class="img-circle"/>
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-thumbs-up"></i>1,200</li>
									</ul>
								</div>
							</div>
							<div class="post">
								<a href="single.html">
									<img src="images/ava-2.png" class="img-circle"/>
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-thumbs-up"></i>1,200</li>
									</ul>
								</div>
							</div>
							<div class="post">
								<a href="single.html">
									<img src="images/ava-3.jpeg" class="img-circle"/>
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-thumbs-up"></i>1,200</li>
									</ul>
								</div>
							</div>
							<div class="post">
								<a href="single.html">
									<img src="images/ava-4.jpg" class="img-circle"/>
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-thumbs-up"></i>1,200</li>
									</ul>
								</div>
							</div>
						</div>
					</div>-->
					<!---- Start Widget ---->
					<div class="widget wid-banner">
						<div class="content">
							<!--<img src="images/banner-2.jpg" class="img-responsive"/>-->
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-calendar">
						<div class="heading"><h4>Calendar</h4></div>
						<div class="content">
							<center><form action="" role="form">        
								<div class="">
									<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">                </div>
									<input type="hidden" id="dtp_input2" value="" /><br/>
								</div>
							</form></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection