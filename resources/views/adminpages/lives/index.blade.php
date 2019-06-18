@extends('home')

@section('title', 'All Live Posts')

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
              {!! $posts->links() !!}
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table">
              <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>Content</th>
                <th style="width: 150px">Created at</th>
                <th></th>
              </tr>
              @foreach ($posts as $post)
                <tr>
                  <th>{{ $post->id }}</th>
                  <td><b>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? "..." : "" }}</b></td>
                  <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td>
                    <a style="color:#fff" href="{{ route('admin_livestream.show', $post->id) }}" class="btn btn-info btn-flat btn-sm">View</a>
                    @if($post->approved == 0)
                        <a href="{{ route('approvedLive', $post->id )}}" class="btn bg-navy btn-flat btn-sm">Approve</a>
                    @else
                        <a href="{{ route('disapprovedLive', $post->id )}}" class="btn bg-maroon btn-flat btn-sm">Disapprove</a>
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