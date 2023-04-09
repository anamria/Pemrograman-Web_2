<aside class="main-sidebar elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Songs</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      @if (Auth::user()->role == 1 )
        <li class="nav-item">
          <a href="{{URL::to('/list_songscategory')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              List Songs Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/add_songscategory')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Add Songs Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/user_list')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              User List
            </p>
          </a>
        </li>
      @endif
      @if (Auth::user()->role == 2 )
        <li class="nav-item">
          <a href="{{URL::to('/list_songscategory')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              List Songs Category
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/add_songscategory')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Add Songs Category
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
      @endif
      @if (Auth::user()->role == 3 )
        <li class="nav-item">
          <a href="{{URL::to('/list_songscategory')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              List Songs Category
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
      @endif
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Log Out
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>