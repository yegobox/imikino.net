@extends('reporter')

  @section('title', 'Create New Post')

  @section('stylesheets')
    {!! Html::style('/css/parsley.min.css') !!}
    {!! Html::style('/css/select2.min.css') !!}
    <script src="/js/tiny/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link lists code image imagetools fullscreen fullpage',
            menubar: true,
              /*menu: {
                  view: {title: 'Edit', items: 'cut, copy, paste'}
              }*/
              /*toolbar: 'undo redo | cut copy paste'*/
        });
    </script>
  @endsection
  
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
        </div>
        {!! Form::model($post, ['route' => ['reporterposts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  {{ Form::label('title', 'Title') }}
                  {{ Form::text('title',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('slug', 'Slug:') }}
                        {{ Form::text('slug', null, ['class' =>'form-control']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('featured_image', 'Update Featured Image:') }}
                        {{ Form::file('featured_image') }}
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      {{ Form::label('sport_id', 'Sport:') }}
                      {{ Form::select('sport_id', $sports, /*default value*/$post->sport_id, ['class' =>'form-control']) }}
                  </div>

                  <div class="form-group col-md-6">
                      {{ Form::label('location_id', 'Location:') }}
                      {{ Form::select('location_id', $locations, /*default value*/$post->location_id, ['class' =>'form-control']) }}
                  </div>
                </div>

                <div class="form-group">
                  {{ Form::hidden('author', Auth::user()->name, ['required' => '']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tags', 'Tags:') }}
                    {{ Form::select('tags[]', $tags, null, ['class' =>'form-control select2-multi', 'multiple' => 'multiple']) }}
                </div>

                <div class="form-group">
                  {{ Form::label('body') }}
                  {{ Form::textarea('body', null,['class' => 'form-control','rows' => '10'/*, 'required' => ''*/]) }}
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At: Date</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated: Date</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('reporterposts.show', 'Cancel', array($post->id ),array('class' => 'btn btn-danger btn-block')) !!}
                    </div>

                    <div class="col-sm-6"> 
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ./col -->
        {!! Form::close() !!}
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection

  @section('scripts')

    {!! Html::script('/js/parsley.min.js') !!}
    {!! Html::script('/js/select2.full.min.js') !!}

    <script type="text/javascript">
      $('.select2-multi').select2();
    </script>

  @endsection