  @extends('home')

  @section('title', 'All Comments')
  
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All posts</h3>

              <div class="box-tools">
                {!! $comments->links() !!}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th style="width: 150px">Created at</th>
                  <th></th>
                </tr>
                @foreach ($comments as $comment)
                  <tr>
                    <th>{{ $comment->id }}</th>
                    <td><b>{{ substr($comment->name, 0, 30) }}{{ strlen($comment->name) > 30 ? "..." : "" }}</b></td>
                    <td>{{ substr(strip_tags($comment->comment), 0, 50) }}{{ strlen($comment->comment) > 50 ? "..." : "" }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                      <a style="color:#fff" href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-info btn-flat btn-sm">View</a> <a style="color:#fff" href="{{ route('comments.edit', $comment->id )}}" class="btn btn-success btn-flat btn-sm">Edit</a> 
                      @if($comment->approved == 0)
                        <a href="{{ route('approvedApplications', $comment->id )}}" class="btn btn-primary btn-flat btn-sm">Approve</a>
                      @else
                        <a href="{{ route('disapprovedApplications', $comment->id )}}" class="btn btn-danger btn-flat btn-sm">Disapprove</a>
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