@extends('reporter')

  @section('title', 'Edit Post '. $post->title)
  
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
          <div class="alert" id="message" style="display: none" role="alert"></div>
            @if (Session::has('success'))

                <div class="alert alert-info" role="alert">
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
        <div class="col-md-8">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <h3 class="text-center">{{ $post->title }}</h3>
              <img class="img-responsive pad" src="{{asset('images/news/'. $post->image) }}" alt="No Picture Available">

              <p>{!! $post->body !!}</p>

              <span id="uploaded_image"></span>
              <p id="txt1" class="text-center"></p>

              <span id="uploaded_image2"></span>
              <p id="txt2" class="text-center"></p>

              <span id="uploaded_image3"></span>
              <p id="txt3" class="text-center"></p>

              <span id="uploaded_image4"></span>
              <p id="txt4" class="text-center"></p>

              <span id="uploaded_image5"></span>
              <p id="txt5" class="text-center"></p>

              {{-- @if(isset($post->image1))
              <img class="img-responsive pad" src="{{asset('images/news/image1'. $post->image1) }}" alt="No Picture Available">
              <p class="text-center"><b>{{ $post->image1_txt }}</b></p>
              @endif

              @if(isset($post->image2))
              <img class="img-responsive pad" src="{{asset('images/news/image2'. $post->image2) }}" alt="No Picture Available">
              <p class="text-center"><b>{{ $post->image2_txt }}</b></p>
              @endif

              @if(isset($post->image3))
              <img class="img-responsive pad" src="{{asset('images/news/image3'. $post->image3) }}" alt="No Picture Available">
              <p class="text-center"><b>{{ $post->image3_txt }}</b></p>
              @endif

              @if(isset($post->image4))
              <img class="img-responsive pad" src="{{asset('images/news/image4'. $post->image4) }}" alt="No Picture Available">
              <p class="text-center"><b>{{ $post->image4_txt }}</b></p>
              @endif

              @if(isset($post->image5))
              <img class="img-responsive pad" src="{{asset('images/news/image5'. $post->image5) }}" alt="No Picture Available">
              <p class="text-center"><b>{{ $post->image5_txt }}</b></p>
              @endif --}}

              <span class="description">Posted on - {{ date('M j, Y h:i A', strtotime($post->created_at)) }}</span>
              <!--<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>-->
              <hr>
              <div class="tags">
                  @foreach($post->tags as $tag)
                      <span class="label label-default">{{ $tag->name }}</span>
                  @endforeach
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <h4>{{ $post->comments()->count() }} Comments</h4>
            </div>
            <div class="box-footer box-comments">
              @foreach($post->comments as $comment)
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=mm" }}" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        {{ $comment->name }}
                        <span class="text-muted pull-right">{{ date('F dS, Y - g:iA', strtotime($comment->created_at)) }}</span>
                      </span><!-- /.username -->
                      {{ $comment->comment }}
                      <div class="pull-right">
                        <p><a href="{{ route('comments.edit', $comment->id) }}" style="margin: 2px 2px 2px 2px" class="btn btn-sm btn-primary">Edit</a><a href="{{ route('comments.delete', $comment->id) }}" style="margin: 2px 2px 2px 2px" class="btn btn-sm btn-danger">Delete</a></p>
                      </div>
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              @endforeach
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload other images here</h3>
            </div>
            <div class="box-body">
                
                {{--  {!! Form::open(['route' => 'ajaxupload.action','method' => 'post', 'id' => 'upload-form', 'files' => true]) !!}  --}}
                
                <form id="upload-form" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-md-6">
                          {{--  {{ Form::label('image1', 'Add Featured Image 1:') }}  --}}
                          <input type="file" name="image1" id="image1"/>
                          {{ Form::label('image1_txt', 'Add details of image 1:') }}
                          {{ Form::text('image1_txt', null, ['class' =>'form-control']) }}
                          <input style="display: none" type="text"  name="post" id="title" value="{{ $post->id }}"/>
                      </div>
                      <div class="form-group col-md-6">
                        <button id="upload" class="btn btn-block btn-flat btn-primary">Upload</button>
                      </div>
                  </div>
                  {{--  <div class="progress">
                      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        <span class="sr-only">45% Complete</span>
                      </div>
                  </div>  --}}
                </form>

                <form id="upload-form2" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-md-6">
                          {{--  {{ Form::label('image1', 'Add Featured Image 1:') }}  --}}
                          <input type="file" name="image2" id="image2"/>
                          {{ Form::label('image2_txt', 'Add details of image 2:') }}
                          {{ Form::text('image2_txt', null, ['class' =>'form-control']) }}
                          <input style="display: none" type="text"  name="post" id="title" value="{{ $post->id }}"/>
                      </div>
                      <div class="form-group col-md-6">
                        <button id="upload2" class="btn btn-block btn-flat btn-primary">Upload</button>
                      </div>
                  </div>
                  {{--  <div class="progress">
                      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        <span class="sr-only">45% Complete</span>
                      </div>
                  </div>  --}}
                </form>

                <form id="upload-form3" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-md-6">
                          {{--  {{ Form::label('image1', 'Add Featured Image 1:') }}  --}}
                          <input type="file" name="image3" id="image3"/>
                          {{ Form::label('image3_txt', 'Add details of image 3:') }}
                          {{ Form::text('image3_txt', null, ['class' =>'form-control']) }}
                          <input style="display: none" type="text"  name="post" id="title" value="{{ $post->id }}"/>
                      </div>
                      <div class="form-group col-md-6">
                        <button id="upload3" class="btn btn-block btn-flat btn-primary">Upload</button>
                      </div>
                  </div>
                  {{--  <div class="progress">
                      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        <span class="sr-only">45% Complete</span>
                      </div>
                  </div>  --}}
                </form>
                
                <form id="upload-form4" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-md-6">
                          {{--  {{ Form::label('image1', 'Add Featured Image 1:') }}  --}}
                          <input type="file" name="image4" id="image4"/>
                          {{ Form::label('image4_txt', 'Add details of image 4:') }}
                          {{ Form::text('image4_txt', null, ['class' =>'form-control']) }}
                          <input style="display: none" type="text"  name="post" id="title" value="{{ $post->id }}"/>
                      </div>
                      <div class="form-group col-md-6">
                        <button id="upload4" class="btn btn-block btn-flat btn-primary">Upload</button>
                      </div>
                  </div>
                  {{--  <div class="progress">
                      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        <span class="sr-only">45% Complete</span>
                      </div>
                  </div>  --}}
                </form>

                
                <form id="upload-form5" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-md-6">
                          {{--  {{ Form::label('image1', 'Add Featured Image 1:') }}  --}}
                          <input type="file" name="image5" id="image5"/>
                          {{ Form::label('image5_txt', 'Add details of image 5:') }}
                          {{ Form::text('image5_txt', null, ['class' =>'form-control']) }}
                          <input style="display: none" type="text"  name="post" id="title" value="{{ $post->id }}"/>
                      </div>
                      <div class="form-group col-md-6">
                        <button id="upload5" class="btn btn-block btn-flat btn-primary">Upload</button>
                      </div>
                  </div>
                  {{--  <div class="progress">
                      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        <span class="sr-only">45% Complete</span>
                      </div>
                  </div>  --}}
                </form>
                {{--  {{ Form::close() }}  --}}
                  {{--  <div class="row">
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
                  </div>  --}}
                  {{--  {{ Form::submit('Upload images', ['class' => 'btn btn-success btn-lg btn-block'])}}  --}}
                
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At: Date</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated: Date</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('reporterposts.edit', 'Edit', array($post->id ),array('class' => 'btn btn-primary btn-block')) !!}
                    </div>

                    <div class="col-sm-6">
                        {!! Form::open(['route' =>['reporterposts.destroy', $post->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        
                        {!! Form::close() !!}
                    </div>
                    <div style="margin-top:10px" class="col-sm-12">
                        {!! Html::linkRoute('reporterposts.index', '<< See All posts', [],array('class' => 'btn btn-default btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection