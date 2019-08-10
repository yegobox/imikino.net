@extends('home')

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
                    <strong>Post title:</strong> <a href="{{ route('posts.show', $comment->post_id) }}">{{ ucfirst($comment->post->title) }}</a><hr>
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