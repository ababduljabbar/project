<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img  src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img width="40px" height="40px" src="{{ asset( Auth::user()->profile_img) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                 
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user text-info"></i>
              
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.brand') }}" class="nav-link">
              <i class="nav-icon fas fa-flag text-info"></i>
              <p>Brand</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('admin.category') }}" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down text-info"></i>
              <p>Category</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('admin.product') }}" class="nav-link">
              <i class="nav-icon fas fa-images text-info"></i>
              <p>Product</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-circle-notch text-danger"></i>
              
              <p>Log Out </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>