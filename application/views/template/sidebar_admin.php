<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Dashboard_Admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Dashboard_Admin') ?>">
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Community Relation
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Surat_Masuk') ?>">
            <span>Case Community Relation</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Surat_Keluar') ?>">
            <span>Community Head BU-5</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Vip') ?>">
            <span>Pelanggan VIP</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Edoc') ?>">
            <span>E-Document</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Fibernode') ?>">
            <span>FiberNode</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Operator') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Operator</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profile
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Profile/edit_profile') ?>">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Edit Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Auth/change_password_admin') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Change Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->