@extends('reporter')

  @section('title', 'All Pictures')
  
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
        <div class="col-md-12">
          <div class="alert" id="message" style="display: none" role="alert"></div>
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

        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All pictures</h3>
              <a href="{{ route('journalist.picture.create') }}" class="btn btn-sm bg-navy">Add Picture</a>

              <div class="box-tools">
                {!! $posts->links() !!}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Image</th>
                  <th>Address</th>
                  <th>Posted By</th>
                  <th style="width: 150px">Created at</th>
                </tr>
                @foreach ($pictures as $post)
                  <tr>
                    <th>{{ $post->id }}</th>
                    <td style="text-align: center"><p><img style="height: 100px" class="img-responsive" src="{{ asset('images/news/'.$post->image) }}" /></p></td>
                    <td><p><b>{{ __('https://imikino.rw/images/news/'.$post->image) }}</b></p></td>
                    <td><b><em>{{ ucfirst($post->reporter) }}</em></b></td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                  </tr>
                @endforeach
              </table>
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