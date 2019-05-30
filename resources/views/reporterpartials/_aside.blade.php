<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/'.Auth::user()->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!--<li class="active treeview">-->
        <li class="treeview {{ Request::is('reporter/profile') ? " active " : " "}}">
          <a href="{{ route('journalist.profile') }}">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('reporter/reporterposts') ? "active" : "" || Request::is('reporter/reporterposts/create') ? "active" : ""}}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{ Request::is('reporter/reporterposts') ? "active" : ""}}"><a href="{{ route('reporterposts.index') }}"><i class="fa fa-circle-o"></i> All your posts</a></li>
            <li class="{{ Request::is('reporter/reporterposts/create') ? "active" : ""}}"><a href="{{ route('reporterposts.create') }}"><i class="fa fa-circle-o"></i> Create New Post</a></li>
        </li>
        <!--<li>
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Journalists</span>
          </a>
        </li>
        <li class="{{ Request::is('comments') ? "active" : ""}}">
          <a href="{{ route('comments.index') }}">
            <i class="fa fa-comment"></i>
            <span>Comments</span>
          </a>
        </li>
        <li>
          <a href="{{ route('messages.index') }}">
            <i class="fa fa-envelope"></i>
            <span>Messages</span>
          </a>
        </li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>