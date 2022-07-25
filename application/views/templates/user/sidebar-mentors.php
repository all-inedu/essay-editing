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
        <a class="nav-link" href="<?=base_url('mentor/dashboard');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
        <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Your Essays
    </div>
    <li class="nav-item <?php if ($menus == 'essay-list') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('mentor/essay-list');?>">
            <i class="fas fa-file-upload"></i>
            <span>Essay List</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Users
    </div>
    <li class="nav-item <?php if ($menus == 'students') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('mentor/students/');?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Students</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Request
    </div>
    <li class="nav-item <?php if ($menus == 'program') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('mentor/program/essay');?>">
            <i class="fas fa-fw fa-tags"></i>
            <span>New Request</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->