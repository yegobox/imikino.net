@extends('home')

@section('title', 'Show Live Post '. $post->title)

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
      <li class="active">Live Post {{ ucfirst($post->title) }}</li>
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
      
      <!-- ./col -->
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

                  <div class="col-sm-12">
                      {!! Form::open(['route' =>['admin_livestream.destroy', $post->id], 'method' => 'DELETE']) !!}

                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                      
                      {!! Form::close() !!}
                  </div>
                  <div style="margin-top:10px" class="col-sm-12">
                      {!! Html::linkRoute('admin_livestream.index', '<< See All posts', [],array('class' => 'btn btn-default btn-block')) !!}
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
