@extends('reporter')

  @section('title', 'All Posts')
  
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
                    <strong>Success:</strong> {!! Session::get('success') !!}
                </div>

            @endif

            @if (Session::has('disaproved'))

                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success:</strong> {!! Session::get('disaproved') !!}
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All posts</h3>

              <div class="box-tools">
                {!! $posts->links() !!}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Content</th>
                  @if(Auth::user()->job_title == 'Editor')
                  <th>Reporter</th>
                  @endif
                  <th>Created at</th>
                  <th></th>
                </tr>
                @foreach ($posts as $post)
                  <tr>
                    <th>{{ $post->id }}</th>
                    <td><b>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? "..." : "" }}</b></td>
                    <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                    @if(Auth::user()->job_title == 'Editor')
                    <td>{{ $post->author }}</td>
                    @endif
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>
                      <a style="color:#fff" href="{{ route('reporterposts.show', $post->id) }}" class="btn btn-info btn-flat btn-sm">View</a> <a style="color:#fff" href="{{ route('reporterposts.edit', $post->id )}}" class="btn btn-success btn-flat btn-sm">Edit</a>
                      @if (Auth::user()->job_title == 'Editor')
                        @if ($post->approved == false)
                          <a style="color:#fff" href="{{ route('editor.approve', $post->id) }}" class="btn btn-warning btn-flat btn-sm">Approve</a>
                        @else($post->approved == true)
                          <a style="color:#fff" href="{{ route('editor.disapprove', $post->id) }}" class="btn btn-danger btn-flat btn-sm">Disapprove</a>
                        @endif
                      @else 
                        @if ($post->approved == false)
                          <a style="color:#fff" href="#" class="btn btn-danger btn-flat btn-sm">Disapproved</a>
                        @else($post->approved == true)
                          <a style="color:#fff" href="#" class="btn btn-primary btn-flat btn-sm">Approved</a>
                        @endif
                      @endif
                    </td>
                  </tr>
                @endforeach
              </table>
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