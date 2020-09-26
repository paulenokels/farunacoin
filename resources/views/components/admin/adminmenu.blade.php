<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dash">
        <div class="sidebar-brand-icon rotate-n-0">
        <img class="img-responsive" width="175" height="42" src=" {{ asset('img/site_logo.png') }}" alt="Faruna Coin" />

        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        ACTIONS
      </div>

      <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>View Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/settings') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Modify Settings</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/miners') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>View Miners</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/coin/transfer') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transfer Coins</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/coin/transaction/history') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transaction History</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/data/history') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Purchase History</span></a>
      </li>


     
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Support Center
      </div>

      

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/support/messages') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span> Support Messages</span></a>
      </li>

     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>