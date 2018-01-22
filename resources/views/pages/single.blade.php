@extends('main')

@section('title', ucfirst($post->title))

@section('content')
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="archive-page container">
		<div class="">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box">
                        <div style="margin-bottom:12px" class="wrap-vid">
                            <div align="center"><img style="position:relative" src="{{asset('images/news/'. $post->image) }}" /></div>
                            <p style="margin-top:5px" class="text-center"><b>{{ $post->title }}</b></p>
                        </div>
                        <div style="margin-top:5px" class="share">
                            <ul class="list-inline center">
                                <li class="fb-share-button" data-href="https://imikino.net/{{ $post->slug }}" data-layout="button" data-size="small" data-mobile-iframe="true"><a  class="fb-xfbml-parse-ignore btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fimikino.net%2F{{ $post->slug }}&amp;src=sdkpreparse"><i class="fa fa-facebook"></i> Share</a>
                                    <!--<div><a>Share</a></div>-->
                                </li>
                                <li><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a href="#" class="btn btn-google"><i class="fa fa-google-plus-square"></i> Google+</a></li>
                                <!--<li><a href="#" id="whatss" class="btn" style="background-color:green;color:white"><i class="fa fa-whatsapp"></i> WhatsApp</a></li>-->
                            </ul>
                        </div>
                        <div class="line"></div><br />
                        <div class="info text-center">
                            <h5>By <a href="#">{{ $post->author }}</a></h5>
                            <span><i class="fa fa-calendar"></i>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</span> 
                            <span><i class="fa fa-eye"></i>{{ $post->views }} Views</span>
                        </div>
                        <h4 class="vid-name text-center">{{ $post->title }}</h4>
                        <h4 class="vid-name text-center"></h4>
						<p style="margin-top: 20px">{!! $post->body !!}</p>
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
							 style="display:block; text-align:center;"
							 data-ad-layout="in-article"
							 data-ad-format="fluid"
							 data-ad-client="ca-pub-1410948886873143"
							 data-ad-slot="7692118961"></ins>
						<script>
							 (adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						<hr>
						<div class="tags">
							@foreach($post->tags as $tag)
								<a href="{{ route('tags', $tag->id) }}"><span class="label label-success">{{ $tag->name }}</span></a>
							@endforeach
						</div>
						<div class="line"></div>
						<div class="comment">
						@if (Session::has('success'))

							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Success:</strong> {{ Session::get('success') }}
							</div>

						@endif

						@if (count($errors) > 0)

						<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Errors:</strong>
								<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
								</ul>
							</div> 

						@endif
						</div>

						<hr class="line">
						@if( $post->comments()->count() > 0 )
						<div class="well well-lg box">
							<div class="box-header header-natural">
								<h2><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h2>
							</div>
							<div class="box-content">
								<div class="row">
									<div class="col-md-12">
										@foreach ($post->comments as $comment)
											@if($comment->approved == 1 )
											<div class="comment">
												<div class="author-info">
													<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=mm" }}" class="author-image">
													<div class="author-name">
														<h4>{{ $comment->name }}</h4>
														<p class="author-time">{{ date('F dS, Y - g:iA', strtotime($comment->created_at)) }}</p>
													</div>
												</div>
												<div class="comment-content">
													{{ $comment->comment }}
												</div>
											</div>
											@endif
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
						@endif
						
						<div class="comment">
							<h3 class="text-center">Gira icyo ubivugaho</h3>
							{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'name' => 'form1']) }}
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
                            				{{ Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Andika Izina hano', 'id' => 'name', 'required' => 'required']) }}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											{{ Form::tel('phone', null, ['class' => 'form-control input-lg', 'placeholder' => 'Andika Numero ya telefone hano', 'id' => 'phone', 'required' => 'required']) }}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{{ Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Andika Email yawe hano', 'id' => 'email']) }}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
                            				{{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Andika ubutumwa bwawe hano', 'id' => 'message', 'rows' => '5', 'cols'=> '25', 'required' => 'required']) }}
										</div>
                        				{{ Form::submit('Ohereza ubutumwa bwawe!', ['class' => 'btn btn-success btn-block', 'id' => 'btnBbooking']) }}
									</div>
								</div>
							{{ Form::close() }}
						</div>
					</div>
					<hr class="line">
					<div class="box">
						<div class="box-header header-natural">
							<h2>INKURU BIJYANYE</h2>
						</div>
						<div class="box-content">
							<div class="row">
							@foreach($sames as $same)
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div style="margin-bottom:12px" class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo"></span>
												<a href="{{ url( $same->slug ) }}">
													<i class="fa fa-file-text-o fa-5x" style="color: lightskyblue"></i>
												</a>
												<p class="hidden-sm hidden-xs" style="font-size: 1.5em; font-weight: lighter; text-shadow: 5px 2px 4px #052B41;">{{ substr($same->title, 0, 150) }}{{ strlen($same->title) > 150 ? '...' : "" }}</p>
											</div>
											<div align="center"><img src="{{ asset('images/news/'. $same->image) }}" /></div>
										</div>
										<p style="font-size: 0.5em; font-weight: lighter;" class="vid-name hidden-lg hidden-md"><a href="{{ url($same->slug) }}">{{ substr($same->title, 0, 150) }}{{ strlen($same->title) > 150 ? '...' : "" }}</a></p>
										<div class="info">
											<br />
											<h5>By <a href="#">{{ ucfirst($same->author) }}</a></h5>
											<span><i class="fa fa-calendar"></i>{{ date('M j, Y', strtotime($same->created_at)) }}</span> 
											<span><i class="fa fa-eye"></i>{{ $same->views }} Views</span>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div>
				</div>
				@include('partials._aside')
			</div>
		</div>
	</div>


@endsection