  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/mb_logo_round.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bucket Lister</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/contacts" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Contacts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-music"></i>
              <p>
                Songs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/setlistgroups" class="nav-link">
              <i class="nav-icon far fa-clone"></i>
              <p>
                Setlists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/setlistgroups" class="nav-link">
              <i class="nav-icon fas fa-guitar"></i>
              <p>
                Gigs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/setlistgroups" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Gear Checklists
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>