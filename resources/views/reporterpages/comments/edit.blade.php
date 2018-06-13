@extends('reporter')

  @section('title', 'Edit this comment')
  
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
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Edit Comment</h1>

                    {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null,['class' => 'form-control', 'disabled' => '']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('comment', 'Comment:') }}
                            {{ Form::textarea('comment', null,['class' => 'form-control', 'rows' => '5']) }}
                        </div>

                        {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success']) }}

                    {{ Form::close() }}
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