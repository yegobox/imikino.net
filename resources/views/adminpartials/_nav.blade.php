<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b></span>
      <!-- logo for regular state and mobile devices -->
      <span style="font-family:cursive;font-size:20px;font-style:italic;text-shadow: 5px 4px 4px black;" class="logo-lg">
        <span style="color:lightskyblue">Imi</span><span style="color:gold">kino</span><span style="color:seagreen">.net</span>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ $notifications->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ $notifications->count() }} new messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach($notifications as $message)
                    <li><!-- start message -->
                      <a href="{{ route('messages.show', $message->id) }}">
                        <div class="pull-left">
                          <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          {{ ucfirst($message->name) }}
                          <small><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}</small>
                        </h4>
                        <p>{{ substr(strip_tags($message->message), 0, 10) }}{{ strlen(strip_tags($message->message)) > 10 ? '...' : "" }}</p>
                      </a>
                    </li>
                    <!-- end message -->
                    @endforeach
                </ul>
              </li>
              <li class="footer"><a href="{{ route('messages.index') }}">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-comment-o"></i>
              <span class="label label-warning">{{ $coms->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ $coms->count() }} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($coms as $comment)
                  <li>
                    <a href="{{ route('posts.show', $comment->post_id) }}">
                      <i class="fa fa-comment text-aqua"></i>Comment on {{ ucfirst($comment->post->title) }} from {{ ucfirst($comment->name) }}
                    </a>
                  </li>
                  @endforeach
                  {{-- <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li> --}}
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }} - Main Administrator
                  <small>Member since -- Date</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                    </a>
                  {!! Form::open(['route' =>['logout'], 'method' => 'POST', 'id' => 'logout-form']) !!}
                    {{ csrf_field() }}
                  {!! Form::close() !!}
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  