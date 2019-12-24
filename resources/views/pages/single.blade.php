@extends('main1')

@section('title', ucfirst($post->title))


@section('content')
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="archive-page container">
		<div class="">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box">
                        <h4 class="vid-name text-center">{{ ucfirst($post->title) }}</h4>
                        <div class="info text-center">
							<div style="display:inline">
								<span>By <b><a href="#">{{ ucfirst($post->author) }}</a></b></span>
								<span><i class="fa fa-calendar"></i>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</span>
								<span><i class="fa fa-eye"></i>{{ $post->views }} Views</span>
                        	</div>
                        </div><br/>
                        <div style="margin-bottom:12px" class="wrap-vid">
                            <div align="center"><img style="position:relative" src="{{asset('images/news/'. $post->image) }}" /></div>
                            <p style="margin-top:5px" class="text-center"><b>{{ $post->title }}</b></p>
                        </div>
                        <div class="line"></div><br />
                        <h4 class="vid-name text-center"></h4>
						<p style="margin-top: 20px">{!! $post->body !!}</p>

						@if(isset($post->image1))
						<img class="img-responsive pad" src="{{asset('images/news/image1'. $post->image1) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image1_txt }}</b></p>
						@endif

						@if(isset($post->image2))
						<img class="img-responsive pad" src="{{asset('images/news/image2'. $post->image2) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image2_txt }}</b></p>
						@endif

						@if(isset($post->image3))
						<img class="img-responsive pad" src="{{asset('images/news/image3'. $post->image3) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image3_txt }}</b></p>
						@endif

						@if(isset($post->image4))
						<img class="img-responsive pad" src="{{asset('images/news/image4'. $post->image4) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image4_txt }}</b></p>
						@endif

						@if(isset($post->image5))
						<img class="img-responsive pad" src="{{asset('images/news/image5'. $post->image5) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image5_txt }}</b></p>
						@endif

						@if(isset($post->image6))
						<img class="img-responsive pad" src="{{asset('images/news/image6'. $post->image6) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image6_txt }}</b></p>
						@endif

						@if(isset($post->image7))
						<img class="img-responsive pad" src="{{asset('images/news/image7'. $post->image7) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image7_txt }}</b></p>
						@endif

						@if(isset($post->image8))
						<img class="img-responsive pad" src="{{asset('images/news/image8'. $post->image8) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image8_txt }}</b></p>
						@endif

						@if(isset($post->image9))
						<img class="img-responsive pad" src="{{asset('images/news/image9'. $post->image9) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image9_txt }}</b></p>
						@endif

						@if(isset($post->image10))
						<img class="img-responsive pad" src="{{asset('images/news/image10'. $post->image10) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image10_txt }}</b></p>
						@endif

						@if(isset($post->image11))
						<img class="img-responsive pad" src="{{asset('images/news/image11'. $post->image11) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image11_txt }}</b></p>
						@endif

						@if(isset($post->image12))
						<img class="img-responsive pad" src="{{asset('images/news/image12'. $post->image12) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image12_txt }}</b></p>
						@endif

						@if(isset($post->image13))
						<img class="img-responsive pad" src="{{asset('images/news/image13'. $post->image13) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image13_txt }}</b></p>
						@endif

						@if(isset($post->image14))
						<img class="img-responsive pad" src="{{asset('images/news/image14'. $post->image14) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image14_txt }}</b></p>
						@endif

						@if(isset($post->image15))
						<img class="img-responsive pad" src="{{asset('images/news/image15'. $post->image15) }}" alt="No Picture Available">
						<p class="text-center"><b>{{ $post->image15_txt }}</b></p>
						@endif

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

@section('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c974adcf1220f3d"></script>
@endsection
