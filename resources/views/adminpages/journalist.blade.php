  @extends('reporter')

  @section('title', 'Dashboard')
  
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporter Dashboard
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
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $posts->count() }}</h3>

              <p>All Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-md-pulse"></i>
            </div>
            <a href="{{ route('reporterposts.index') }}" class="small-box-footer">More <ion-icon name="pulse"></ion-icon></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <center><h3>Live Streaming</h3></center>
            </div>
            <div class="icon">
              <i class="ion ion-md-pulse"></i>
            </div>
            <a href="{{ route('livestream.index') }}" class="small-box-footer">More <ion-icon name="pulse"></ion-icon></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $pictures->count() }} <small style="color:white">pictures</small></h3>

              <p>Gallery</p>
            </div>
            <div class="icon">
              <i class="fa fa-image"></i>
            </div>
            <a href="{{ route('journalist.picture') }}" class="small-box-footer">More </a>
          </div>
        </div>
        <!-- ./col -->
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