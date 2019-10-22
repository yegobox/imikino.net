@extends('reporter')

@section('title', 'Livescore')

@section('stylesheets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
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
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
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
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                    <center><h1 class="box-title">All matches</h1></center>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped">
                        @foreach ($livescores as $livescore)
                        <tr>
                            <th><span style="text-align: right">{{ $livescore->teamOne }}</span></th>
                            <th>
                                <center>
                                    {{ isset($livescore->teamOneGoals) ? $livescore->teamOneGoals : "?" }} - {{ isset($livescore->teamTwoGoals) ? $livescore->teamTwoGoals : "?" }}
                                </center>
                            </th>
                            <th>{{ $livescore->teamTwo }}</th>
                            <th><span class="badge bg-navy">{{ date('h:i: A',strtotime($livescore->time))}}</span></th>
                            <th><span class="badge bg-green">{{ date('l, d F',strtotime($livescore->time)) }}</span></th>
                            <th>
                                <a class="btn btn-xs btn-info btn-flat" data-toggle="modal" data-target="#myModalEdit{{ $livescore->id }}"><span class="fa fa-pencil-square-o"></span></a>
                                <a class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#myModalUpdate{{ $livescore->id }}"><span class="fa fa-send-o"></span></a>
                                <button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#myModalDelete{{ $livescore->id }}"><span class="fa fa-trash-o"></span></button>
                            </th>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal modal-info fade" id="myModalEdit{{ $livescore->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit this event <b>{{ ucfirst($livescore->teamOne)." vs ".ucfirst($livescore->teamTwo) }}</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($livescore, ['route' => ['journalist.livescore.edit', $livescore->id], 'method' => 'PUT', 'files' => true]) !!}
                                            <!-- text input -->
                                            <div class="form-group">
                                                {{ Form::label('teamOne', 'First Team') }}
                                                {{ Form::text('teamOne',null,['class' => 'form-control', 'required' => true]) }}
                                            </div>
                                            <!-- text input -->
                                            <div class="form-group">
                                                {{ Form::label('teamTwo', 'Second Team') }}
                                                {{ Form::text('teamTwo',null,['class' => 'form-control', 'required' => true]) }}
                                            </div>
                                            <!-- text input -->
                                            <div class="form-group">
                                                {{ Form::label('pitch', 'Pitch') }}
                                                {{ Form::text('pitch',null,['class' => 'form-control', 'required' => true]) }}
                                            </div>
                                            <!-- text input -->
                                            
                                            <div class="form-group">
                                                <label class="control-label">Starting Time</label>
                                                <div class='input-group date' id='datetimepickerEdit{{ $livescore->id }}'</div>
                                                    {!! Form::text('time', null, ['class' => 'form-control', 'required' => true]) !!}
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
                                        {{ Form::submit('Save changes', ['class' => 'btn btn-sm btn-success'])}}
                                      {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.Edit modal -->
                        <!-- Update Modal -->
                        <div class="modal modal-success fade" id="myModalUpdate{{ $livescore->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Update this event <b>{{ ucfirst($livescore->teamOne)." vs ".ucfirst($livescore->teamTwo) }}</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($livescore, ['route' => ['journalist.livescore.update', $livescore->id], 'method' => 'PATCH', 'files' => true]) !!}
                                            <!-- text input -->
                                            <div class="row">
                                                <div class="col-xs-6 text-center">
                                                    <b>{{ $livescore->teamOne }}</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('teamOneGoal', $livescore->teamOneGoals,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-xs-6 text-center">
                                                    <b>{{ $livescore->teamTwo }}</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('teamTwoGoal', $livescore->teamTwoGoals,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                                          {{ Form::submit('Save changes', ['class' => 'btn btn-sm btn-info'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.Update modal -->
                        <!-- Delete Modal -->
                        <div class="modal modal-danger fade" id="myModalDelete{{ $livescore->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Delete this event <b>{{ ucfirst($livescore->teamOne)." vs ".ucfirst($livescore->teamTwo) }}</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="font-size: 20px">Do you really want to delete this event?</p>
                                        <div class="callout callout-warning lead text-center">
                                            <h4>{{ ucfirst($livescore->teamOne)." vs ".ucfirst($livescore->teamTwo) }}</h4>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                      {!! Form::open(['route' =>['journalist.livescore.delete', $livescore->id], 'method' => 'DELETE']) !!}
              
                                      {!! Form::submit('Confirm', ['class' => 'btn btn-warning btn-sm']) !!}
                                      
                                      {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.Delete modal -->
                        @endforeach
                    </table>
                </div>
                <div class="box-footer">
                    <div class="box-tools text-center">
                          {!! $livescores->links() !!}
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                    <center><h1 class="box-title">Add a new upcomming match</h1></center>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'journalist.livescore.post', 'files' => true]) !!}
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('teamOne', 'First Team') }}
                            {{ Form::text('teamOne',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('teamTwo', 'Second Team') }}
                            {{ Form::text('teamTwo',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('pitch', 'Pitch') }}
                            {{ Form::text('pitch',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        
                        <div class="form-group">
                            <label class="control-label">Starting Time</label>
                            <div class='input-group date' id='datetimepicker1'>
                                {!! Form::text('time', null, ['class' => 'form-control', 'required' => true]) !!}
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
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
        @foreach ($livescores as $livescore)
         $('#datetimepickerEdit{{ $livescore->id }}').datetimepicker();
        @endforeach
    });
</script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
@endsection