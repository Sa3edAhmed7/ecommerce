<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image"><br>
          <a style="margin-left: 15px; margin-top:20px" href="#" class="d-block"><h6 style="color:#000; font-weight:bold;">{{ Auth::user()->name }}</h6></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
            <a href="#" class="nav-link" style="background-color:#D10034; color:#ffffff;">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('editprofile.index') }}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item menu-open">

            <a href="#" class="nav-link" style="background-color:#000000; color:#ffffff;">
              <i class="nav-icon fa fa-shopping-basket"></i>
              <p>
                Orders
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link active">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Order</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a style="width:3.6rem" href="#" class="nav-link bg-dark" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-window-close"aria-hidden="true"></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
