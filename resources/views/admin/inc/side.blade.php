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
            <a href="#" class="nav-link active" style="background-color:#ff2832;">
              <i class="nav-icon fa fa-desktop"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('page.create')}}" class="nav-link active">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Create Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-cube"></i>
              <p>
                Categories
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.create')}}" class="nav-link active">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categories.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Products
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.create')}}" class="nav-link active">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Create Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">

  <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-shopping-basket"></i>
              <p>
                Orders
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('orders.index')}}" class="nav-link active">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Order</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.create')}}" class="nav-link active">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Images
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('productimages.create')}}" class="nav-link active">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Create Image</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('productimages.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Image</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Colors
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('colors.create')}}" class="nav-link active">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Create Color</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('colors.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Show Color</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link bg-dark">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('settings.index')}}" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i>
                  <p>Edit Settings</p>
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
