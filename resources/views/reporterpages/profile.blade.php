@extends('reporter')

@section('title', $user->name.' Profile')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile
      <small>Reporter {{ ucfirst($user->name) }}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Reporter</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
          @if (Session::has('success'))

              <div class="alert alert-info" role="alert">
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
      <div class="col-lg-12 col-xs-12">
          <div class="box box-primary">
              <div class="box-body">
                <div class="row">
                    <div style="align-text:center" class="col-lg-6">
                        <p class="text-center"><img id="uploaded_image" style="border-radius: 50%" src="{{ asset('admin/dist/img/'.$user->image) }}" alt="No Picture"/></p>
                        <div class="col-md-12">
                          <div class="alert" id="message" style="display: none" role="alert"></div>
                          <form id="profile-picture" enctype="multipart/form-data">
                            <div class="row text-center">
                                <div class="form-group col-md-6">
                                  <button id="upload" class="btn btn-sm btn-flat btn-primary">Upload</button>
                                </div>
                                <div class="form-group col-md-6">
                                    {{--  {{ Form::label('image1', 'Add Featured Image 1:') }}  --}}
                                    <input type="file" name="image" id="image"/>
                                    <input style="display: none" type="text"  name="user_id" id="title" value="{{ $user->id }}"/>
                                </div>
                            </div>
                            {{--  <div class="progress">
                                <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                  <span class="sr-only">45% Complete</span>
                                </div>
                            </div>  --}}
                          </form>
                        </div>
                        <p class="text-center">Name: {{ ucfirst($user->name) }}</p>
                        <p class="text-center">Phone: {{ $user->phone }}</p>
                        <p class="text-center">Email: {{ $user->email }}</p>
                        <p class="text-center">Job Tile: {{ $user->job_title }}</p>
                        <p class="text-center">Created : {{ $user->updated_at->diffForHumans() }}</p>
                        <p class="text-center">Latest modification : {{ $user->updated_at->diffForHumans() }}</p>
                    </div>
                    <div class="col-lg-6">
                      <h1>Edit your details here.</h1>
                      {!! Form::model($user, ['route' => ['journalist.profile.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
                      
                      <!-- text input -->
                      <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                      </div>

                      <!-- text input -->
                      <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                      </div>

                      <!-- text input -->
                      <div class="form-group">
                        {{ Form::label('job_title', 'Job Title') }}
                        {{ Form::text('job_title',Auth::user()->job_title,['class' => 'form-control', 'disabled']) }}
                      </div>

                      <!-- text input -->
                      <div class="form-group">
                        {{ Form::label('phone', 'Phone Number') }}
                        {{ Form::text('phone',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                      </div>

                      {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}


                      {!! Form::close() !!}
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
@endsection
