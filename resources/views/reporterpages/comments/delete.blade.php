@extends('reporter')

  @section('title', 'Delete this comment')
  
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <div class="col-md-8 col-md-offset-2">
                  <h1>DELETE THIS COMMENT</h1>
                  <p>
                      <strong>Name:</strong> {{ $comment->name }}<hr>
                      <strong>Email:</strong> {{ $comment->email }}<hr>
                      <strong>Comment:</strong> {{ $comment->comment }}<hr>

                      {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                          {{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
                      {{ Form::close() }}
                  </p>
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