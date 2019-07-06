<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-follow">
						{{-- <div class="heading"><h4>Shakisha</h4></div>
						<div class="content">
							{{ Form::open(['route' => 'pages.postSearch', 'method'=>'get', 'data-parsley-validate' => 'true']) }}
								<div class="input-group">
									{{ Form::text('search',null,['style' => 'height:35px', 'class' => 'form-control','placeholder' => 'Andika ijambo ushakisha' ,'required']) }}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							{{ Form::close() }}
						</div> --}}
						<div class="heading"><h4>Dukurikire kuzindi mbuga</h4></div>
						<div class="content">
							<center>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<div class="addthis_inline_follow_toolbox"></div>
							{{--  <ul class="list-inline">
								<li>
									<a target="_blank" href="https://www.facebook.com/imikino.rw/">
										<div class="box-facebook">
											<span class="fa fa-facebook fa-2x icon"></span>
										</div>
									</a>
								</li>
								<li>
									<a target="_blank" href="https://twitter.com/ImikinoCom?lang=en">
										<div class="box-twitter">
											<span class="fa fa-twitter fa-2x icon"></span>
										</div>
									</a>
								</li>
								<li>
									<a target="_blank" href="https://plus.google.com/112885630146322775647">
										<div class="box-google">
											<span class="fa fa-google-plus fa-2x icon"></span>
										</div>
									</a>
								</li>
							</ul>  --}}
							</center>
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
										<span class="vimeo">{{ $aside->sport->name }}</span>
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
										<span class="vimeo">{{ $newone->location->name }}</span>
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
						<!-- Composite End -->
					</div>
				</div>