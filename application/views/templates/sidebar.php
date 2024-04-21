 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <i class="fas fa-cog"></i>
         </div>
         <div class="sidebar-brand-text mx-3">APTOOL</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <p>SURFACE</p>
    </div>
    <!-- Submenu items -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('surface/index'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Submenu items -->
    <li class="nav-item">
        <a class="nav-link"  href="<?= base_url('surface/tickets'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Ticket</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <p>Database Alat Ukur</p>
    </div>
    <!-- Submenu items -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('masterdata/alat_ukur'); ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Database Alat Ukur</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('masterdata/alat_bantu'); ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Database Alat Bantu</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    


     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('auth/logout'); ?> ">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->