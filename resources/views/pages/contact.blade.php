@extends('main')

@section('title', 'Contact Us')

@section('stylesheets')
    {!! Html::style('/css/parsley.css') !!}
@endsection

@section('content')
    <div class="featured container">
		<div id="owl-demo" class="owl-carousel">
			
		</div>
	</div>
	<!-- Header -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="archive-page container">
		<div class="">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box">
						<center><div class="box-header">
							<h3 class="center">Tanga igitekerezo cg ikibazo cyawe hano</h3>
						</div></center>

						<center>
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
						</center>

						<div class="box-content">
							<div id="contact_form">
								<form id="ff" method="POST" action="{{ url('contact') }}" data-parsley-validate="">
									{{ csrf_field() }}
									<label>
									<span>Andika amazina yawe hano:</span>
									<input type="text"  name="name" id="name" required minlength="4">
									</label>
									<div class="row">
										<div class="col-md-6">
											<label>
											<span>Andika numero ya telefone hano:</span>
											<input type="tel"  name="phone" id="phone" required minlength="10">
											</label>
										</div>
										<div class="col-md-6">
											<label>
											<span>Andika email yawe hano:</span>
											<input type="email"  name="email" id="email" required>
											</label>
										</div>
									</div>
									<label>
									<span>Andika ubutumwa bwawe hano:</span>
									<textarea name="message" id="message" required minlength="5"></textarea>
									</label>
									<center><input class="sendButton" type="submit" name="Submit" value="Ohereza"></center>
								</form>
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

   {!! Html::script('/js/parsley.min.js') !!}

@endsection