  @extends('home')

  @section('title', 'All Sports')
  
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
            @if (Session::has('success'))

                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
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
            <div class="col-md-8">
                <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
            </div>
            <div class="col-md-2">
                <a style="margin-top:20px" href="{{ route('tags.edit', $tag->id)}}" class="btn btn-block btn-primary pull-right">Edit</a>
            </div>
            <div class="col-md-2">
                {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
                {{ Form::close() }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tag->posts as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @foreach( $post->tags as $tag)
                                        <span class="label label-default">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection