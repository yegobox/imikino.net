@extends('reporter')

@section('title', 'Ratings')

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
      <li class="active">Ratings</li>
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
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>Team</th>
                            <th>Games</th>
                            <th>Won</th>
                            <th>Nulled</th>
                            <th>Lost</th>
                            <th>Points</th>
                            <th>Controls</th>
                        </tr>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($ratings as $rating)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td><span>{{ ucfirst($rating->team) }}</span></td>
                            <td>{{ $rating->gamePlayed }}</td>
                            <td>{{ $rating->gameGained }}</td>
                            <td>{{ $rating->gameNulled }}</td>
                            <td>{{ $rating->gameFailed }}</td>
                            <td>{{ $rating->points }}</td>
                            <td>
                                <a class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#myModalUpdate{{ $rating->id }}"><span class="fa fa-pencil-square-o"></span></a>
                                <button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#myModalDelete{{ $rating->id }}"><span class="fa fa-trash-o"></span></button>
                            </td>
                        </tr>
                        <!-- Update Modal -->
                        <div class="modal modal-success fade" id="myModalUpdate{{ $rating->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Update this event <b>{{ ucfirst($rating->team) }}</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($rating, ['route' => ['journalist.ratings.update', $rating->id], 'method' => 'PATCH', 'files' => true]) !!}
                                            <!-- text input -->
                                            <div class="row">
                                                <div class="col-xs-6 text-center">
                                                    <b>Game Played</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('gamePlayed', $rating->gamePlayed,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-xs-6 text-center">
                                                    <b>Game Won</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('gameGained', $rating->gameGained,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-xs-6 text-center">
                                                    <b>Game Equalized / Nulled</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('gameNulled', $rating->gameNulled,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-xs-6 text-center">
                                                    <b>Game Lost</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('gameFailed', $rating->gameFailed,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-xs-6 text-center">
                                                    <b>Game Won</b>
                                                </div>
                                                <div class="col-xs-6">
                                                        {{ Form::text('points', $rating->points,['class' => 'form-control col-xs-2', 'style' => 'width: 20%', 'required' => true]) }}
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
                        <div class="modal modal-danger fade" id="myModalDelete{{ $rating->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Delete this event <b>{{ ucfirst($rating->team) }}</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="font-size: 20px">Do you really want to delete this team on the list?</p>
                                        <div class="callout callout-warning lead text-center">
                                            <h4>{{ ucfirst($rating->team) }}</h4>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                      {!! Form::open(['route' =>['journalist.ratings.delete', $rating->id], 'method' => 'DELETE']) !!}
              
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
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                    <center><h1 class="box-title">Add a new team rate</h1></center>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'journalist.ratings.post', 'files' => true]) !!}
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('team', 'Name of Team') }}
                            {{ Form::text('team',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('gamePlayed', 'Game Played (Imikino yakinnye)') }}
                            {{ Form::text('gamePlayed',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('gameGained', 'Game Won (Imikino yatsinze)') }}
                            {{ Form::text('gameGained',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('gameNulled', 'Game Nulled (Imikino yanganyije)') }}
                            {{ Form::text('gameNulled',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('gameFailed', 'Game Failed (Imikino yatsinzwe)') }}
                            {{ Form::text('gameFailed',null,['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            {{ Form::label('points', 'Points') }}
                            {{ Form::text('points',null,['class' => 'form-control', 'required' => true]) }}
                        </div>

                        {{ Form::submit('Add team rate to the list', ['class' => 'btn btn-success btn-lg btn-block'])}}
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
