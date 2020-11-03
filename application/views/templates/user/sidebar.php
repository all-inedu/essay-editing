<?php
$role = $this->session->userdata['role'];
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url();?>">
        <div class="sidebar-brand-icon">
            &nbsp;<img src="<?=base_url('assets/img/icons.png');?>" width="50">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Admin Sidebar -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($menus == 'dashboard') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('admin/dashboard');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Settings
    </div>
    <li class="nav-item <?php if ($menus == 'settings') {echo 'active';}?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true"
            aria-controls="settings">
            <i class="fas fa-cogs"></i>
            <span>Settings</span>
        </a>
        <div id="settings" class="collapse <?php if ($menus == 'settings') {echo '';}?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($submenus == 'universities') {echo 'active';}?>"
                    href="<?=base_url('admin/university');?>"><i class="fas fa-university"></i>&nbsp;
                    Universities</a>
                <a class="collapse-item <?php if ($submenus == 'essay-prompt') {echo 'active';}?>"
                    href="<?=base_url('admin/essay-prompt');?>"><i class="fas fa-file-upload"></i>&nbsp;
                    Essay Prompt</a>
                <a class="collapse-item <?php if ($submenus == 'program') {echo 'active';}?>"
                    href="<?=base_url('admin/program');?>">
                    <i class="fas fa-tasks"></i>&nbsp; Programs</a>
                <a class="collapse-item <?php if ($submenus == 'categories') {echo 'active';}?>"
                    href="<?=base_url('admin/categories');?>">
                    <i class="fas fa-tasks"></i>&nbsp; Categories/Tags</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Users
    </div>
    <li class="nav-item <?php if ($menus == 'users') {echo 'active';}?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
            aria-controls="users">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="users" class="collapse <?php if ($menus == 'users') {echo '';}?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($submenus == 'clients') {echo 'active';}?>"
                    href="<?=base_url('admin/clients/');?>">
                    <i class="fas fa-users"></i>&nbsp; Students</a>
                <a class="collapse-item <?php if ($submenus == 'mentors') {echo 'active';}?>"
                    href="<?=base_url('admin/mentors/');?>">
                    <i class="fas fa-user-friends"></i>&nbsp; Mentors</a>
                <a class="collapse-item <?php if ($submenus == 'editors') {echo 'active';}?>"
                    href="<?=base_url('admin/editors/');?>">
                    <i class="fas fa-user-plus"></i>&nbsp; Editors</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Payment of Clients
    </div>
    <li class="nav-item <?php if ($menus == 'payments') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('admin/payments/');?>">
            <i class="fas fa-fw fa-donate"></i>
            <span>Payment</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Essay List
    </div>
    <li class="nav-item <?php if ($menus == 'essay-list') {echo 'active';}?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#essay" aria-expanded="true"
            aria-controls="essay">
            <i class="fas fa-fw fa-file-upload"></i>
            <span>Essay List</span>
        </a>
        <div id="essay" class="collapse <?php if ($menus == 'essay') {echo '';}?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($submenus == 'ongoing') {echo 'active';}?>"
                    href="<?=base_url('admin/essay-list');?>"><i class="far fa-file-word"></i>&nbsp; Ongoing</a>
                <a class="collapse-item <?php if ($submenus == 'verified') {echo 'active';}?>"
                    href="<?=base_url('admin/essay-list/verify');?>"><i class="fas fa-file-word"></i>&nbsp;
                    Completed</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Essay List
    </div>
    <li class="nav-item <?php if ($menus == 'export') {echo 'active';}?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#export" aria-expanded="true"
            aria-controls="essay">
            <i class="far fa-file-excel"></i>
            <span>Export to Excell</span>
        </a>
        <div id="export" class="collapse <?php if ($menus == 'export') {echo '';}?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($submenus == 'students') {echo 'active';}?>"
                    href="<?=base_url('admin/export/students-essay');?>"><i class="far fa-file-excel"></i>&nbsp;
                    Students Essay</a>
                <a class="collapse-item <?php if ($submenus == 'editors') {echo 'active';}?>"
                    href="<?=base_url('admin/export/editors-essay');?>"><i class="fas fa-file-excel"></i>&nbsp;
                    Editors Essay</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->