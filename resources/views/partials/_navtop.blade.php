	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<strong>Murakaza Neza!</strong>
				</div>
				<div class="col-md-5">
					{{ Form::open(['route' => 'pages.postSearch', 'method'=>'post', 'data-parsley-validate' => 'true']) }}
						<div style="padding-bottom:5px" class="input-group">
							{{ Form::text('search',null,['style' => 'height:30px', 'class' => 'form-control','placeholder' => 'Andika ijambo aha, ushakisha!' ,'required']) }}
							<span class="input-group-btn">
								<button type="submit" style="height:30px" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
							</span>
						</div>
					{{ Form::close() }}
				</div>
				<div class="col-md-4">
					<ul class="list-inline top-link link">
						<li><a href="{{ route('/') }}"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="{{ route('contact') }}"><i class="fa fa-comments"></i> Contact</a></li>
						<!--<li><a href="/login"><i class="fa fa-question-circle"></i> Login</a></li>
                        <li><a href="/register"><i class="fa fa-question-circle"></i> Register</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</nav>