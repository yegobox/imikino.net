  @extends('home')

  @section('title', 'All Messages')
  
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All posts</h3>

              <div class="box-tools">
                {!! $comments->links() !!}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>User</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th style="width: 150px">Created at</th>
                  <th></th>
                </tr>
                @foreach ($comments as $comment)
                  <tr>
                    <th>{{ $comment->id }}</th>
                    <td><b>{{ substr($comment->name, 0, 30) }}{{ strlen($comment->name) > 30 ? "..." : "" }}</b></td>
                    <td>{{ $comment->phone }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ substr(strip_tags($comment->message), 0, 50) }}{{ strlen($comment->message) > 50 ? "..." : "" }}</td>
                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                    <td>
                      <a style="color:#fff" href="{{ route('messages.show', $comment->id) }}" class="btn btn-info btn-flat btn-sm">View</a>
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