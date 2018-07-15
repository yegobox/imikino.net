@extends('main')

@section('title', 'Search')

@section('content')
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="archive-page container">
		<div class="">
			<div class="row">
				<div id="main-content" class="col-md-8">
			@if( count($posts) > 0)
				@foreach( $posts as $post)
					<div class="box">
						<div style="margin-bottom:12px" class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span class="vimeo">{{ $post->sport->name }}</span>
									<a href="{{ url($post->slug) }}">
										<i class="fa fa-file-text-o fa-5x" style="color: lightskyblue"></i>
									</a>
									<p style="font-size: 1.5em; font-weight: lighter; text-shadow: 5px 2px 4px #052B41;">{{ substr($post->title, 0, 25) }}{{ strlen($post->title) > 25 ? '...' : "" }}</p>
								</div>
								<div align="center"><img style="position:relative;height:150px" src="{{ asset('images/news/'.$post->image) }}" /></div>
							</div>
							<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }} <a href="{{ url($post->slug) }}" class="btn btn-success btn-xs">Soma iyi nkuru</a></p>
						</div>
						<div class="info">
							<span><i class="fa fa-calendar"></i> {{ date('M j, Y', strtotime($post->created_at)) }}</span> 
							<span><i class="fa fa-comment"></i> {{ $post->comments()->count() }} Comments</span>
							<span><i class="fa fa-eye"></i>{{ $post->views }} Views</span>
						</div>
					</div>
					<hr class="line">
				@endforeach
			@else
				<div class="box">
					<center><h2>Tubiseguyeho, ntagisubizo tubashije kubona!</h2></center>
				</div>
					
			@endif
					<div class="box">
						<center>
							{!! $posts->links() !!}
						<!--<ul class="pagination">
							<li>
							  <a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							  </a>
							</li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
							  <a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							  </a>
							</li>
						</ul>-->
						</center>
					</div>
				</div>
				@include('partials._aside')
			</div>
		</div>
	</div>


@endsection