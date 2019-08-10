@extends('home')

@section('title', 'Message from '.ucfirst($message->name))

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
          <div class="box-header">
            <h3 class="box-title">Message from {{ ucfirst($message->name) }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
              <div class="col-lg-12">
                    <h4>Name : {{ ucfirst($message->name) }}</h4>
                    <h4>Phone : {{ ucfirst($message->phone) }}</h4>
                    <h4>Email : {{ ucfirst($message->email) }}</h4>
                    <h4>Sent : {{ $message->created_at->diffForHumans() }}</h4>
                    <h4 style="text-align: justify">Message : {!! $message->message !!}</h4>
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