  @extends('home')

  @section('title', 'Create New Post')

  @section('stylesheets')
    {!! Html::style('/css/parsley.css') !!}
    {!! Html::style('/css/select2.min.css') !!}
    <script src="/js/tiny/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link lists code image imagetools',
            menubar: false,
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
        <div class="col-md-10 col-md-offset-1">
          <div class="box box-warning">
            <div class="box-body">
              {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => 'true', 'files' => true]) !!}
                <!-- text input -->
                <div class="form-group">
                  {{ Form::label('title', 'Title') }}
                  {{ Form::text('title',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      {{ Form::label('slug', 'Slug:') }}
                      {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '',
                          'minlength' => '5', 'maxlength' => '255']) }}
                  </div>

                  <div class="form-group col-md-6">
                    {{ Form::label('featured_image', 'Upload featured Image:') }}
                    {{ Form::file('featured_image') }}
                  </div>
                </div>

                <div class="form-group">
                  {{ Form::hidden('author', Auth::user()->name, ['required' => '']) }}
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      {{ Form::label('sport_id', 'Sport:') }}
                      <select class="form-control" name="sport_id">
                          @foreach($sports as $sport)
                              <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                      {{ Form::label('location_id', 'Location:') }}
                      <select class="form-control" name="location_id">
                          @foreach($locations as $location)
                              <option value="{{ $location->id }}">{{ $location->name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="form-group">
                    {{ Form::label('tags', 'Tags:') }}
                    <select multiple class="form-control select2-multi" name="tags[]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  {{ Form::label('body') }}
                  {{ Form::textarea('body', null,['class' => 'form-control','rows' => '10'/*, 'required' => ''*/]) }}
                </div>

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block'])}}

              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
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