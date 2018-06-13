  @extends('home')

  @section('title', 'All Sports')
  
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
                {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
                    <div class="form-group">
                        {{ Form::label('name', "Title:") }}
                        {{ Form::text('name', null,['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection