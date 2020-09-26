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
        <a class="nav-link" href="{{ url('dash') }}">
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
      <a class="nav-link" href="{{ url('dash/coin/purchase') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Purchase Coins</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dash/coin/transfer') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transfer</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dash/coin/receive') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Receive</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dash/minning/activity') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Minning Account</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('dash/coin/transaction/history') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transaction History</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('dash/data/purchase') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Purchase Data</span></a>
      </li>


     
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Support Center
      </div>

      

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dash/support') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact Support</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('faq') }}" target="_blank">
          <i class="fas fa-fw fa-table"></i>
          <span>FAQs</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>