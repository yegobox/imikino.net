  @extends('reporter')

  @section('title', 'Create New Post')

  @section('stylesheets')
    {!! Html::style('/css/parsley.min.css') !!}
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
              {!! Form::open(['route' => 'reporterposts.store', 'data-parsley-validate' => 'true', 'files' => true]) !!}
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

                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('image1', 'Add Featured Image 1:') }}
                        {{ Form::file('image1') }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('image1_txt', 'Add details of image 1:') }}
                        {{ Form::text('image1_txt', null, ['class' =>'form-control']) }}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('image2', 'Add Featured Image 2:') }}
                        {{ Form::file('image2') }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('image2_txt', 'Add details of image 2:') }}
                        {{ Form::text('image2_txt', null, ['class' =>'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('image3', 'Add Featured Image 3:') }}
                        {{ Form::file('image3') }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('image3_txt', 'Add details of image 3:') }}
                        {{ Form::text('image3_txt', null, ['class' =>'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('image4', 'Add Featured Image 4:') }}
                        {{ Form::file('image4') }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('image4_txt', 'Add details of image 4:') }}
                        {{ Form::text('image4_txt', null, ['class' =>'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('image5', 'Add Featured Image 5:') }}
                        {{ Form::file('image5') }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('image5_txt', 'Add details of image 5:') }}
                        {{ Form::text('image5_txt', null, ['class' =>'form-control']) }}
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
        <!-- ./col -->
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