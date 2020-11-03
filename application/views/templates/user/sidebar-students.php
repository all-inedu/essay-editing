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

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($menus == 'dashboard') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('student/dashboard');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Program
    </div>
    <li class="nav-item <?php if ($menus == 'program-clients') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('student/programs');?>">
            <i class="fas fa-tasks"></i>
            <span>Program List</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Payment
    </div>
    <li class="nav-item <?php if ($menus == 'payment-clients') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('student/payment');?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Payment List</span></a>
    </li>
    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Report
    </div>
    <li class="nav-item <?php if ($menus == '') {echo 'active';}?>">
        <a class="nav-link" href="#">
            <i class="fas fa-file-upload"></i>
            <span>Essay List</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->