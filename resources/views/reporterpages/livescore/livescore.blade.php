@extends('reporter')

@section('title', 'Livescore')

@section('stylesheets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Livescore
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Livescore</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                    <center><h1 class="box-title">Upcoming matches</h1></center>
                </div>
                <div class="box-body">

                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                    <center><h1 class="box-title">Add a new upcomming match</h1></center>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'journalist.livescore.post', 'data-parsley-validate' => 'true', 'files' => true]) !!}
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('teamOne', 'First Team') }}
                            {{ Form::text('teamOne',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('teamTwo', 'Second Team') }}
                            {{ Form::text('teamTwo',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('pitch', 'Pitch') }}
                            {{ Form::text('pitch',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                        </div>
                        <!-- text input -->
                        
                        <div class="form-group">
                            <label class="control-label">Starting Time</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" name="time" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        {{ Form::submit('Create Upcoming match', ['class' => 'btn btn-success btn-lg btn-block'])}}
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
@endsection