@extends('reporter')

  @section('title', 'Add Picture')
  
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Gallery</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Gallery</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upload your picture here</h3>

              <div class="box-tools">
                <a href="{{ route('journalist.picture') }}" class="btn btn-sm bg-maroon">All Picture</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <div class="col-md-12">
                {!! Form::open(['route' => 'journalist.picture.submit', 'data-parsley-validate' => 'true', 'files' => true]) !!}
                    <div class="form-group col-md-6">
                        {{ Form::label('image', 'Upload featured Image:') }}
                        {{ Form::file('image') }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::submit('Upload your picture', ['class' => 'btn btn-success btn-lg btn-block'])}}
                    </div>
                {!! Form::close() !!}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection