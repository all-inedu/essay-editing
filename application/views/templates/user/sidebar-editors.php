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

    <li class="nav-item <?php if ($menus == 'dashboard') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('editor/dashboard');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if($this->session->userdata('position')=='3'){?>
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
                    href="<?=base_url('editor/university');?>"><i class="fas fa-university"></i>&nbsp;
                    Universities</a>
                <!-- <a class="collapse-item <?php if ($submenus == 'essay-prompt') {echo 'active';}?>"
                    href="<?=base_url('editor/essay-prompt');?>"><i class="fas fa-file-upload"></i>&nbsp;
                    Essay Prompt</a> -->
                <a class="collapse-item <?php if ($submenus == 'categories') {echo 'active';}?>"
                    href="<?=base_url('editor/categories');?>">
                    <i class="fas fa-tasks"></i>&nbsp; Categories/Tags</a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Users
    </div>
    <li class="nav-item <?php if ($menus == 'list') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('editor/lists');?>">
            <i class="fas fa-user-plus"></i>
            <span>Editor List</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Managing
    </div>
    <li class="nav-item <?php if ($menus == 'all-essay') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('editor/all-essay');?>">
            <i class="fas fa-cloud-upload-alt"></i>
            <span>All Essays</span>
        </a>
    </li>
    
        
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Report
    </div>
    <li class="nav-item <?php if ($menus == 'export') {echo 'active';}?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#export" aria-expanded="true"
            aria-controls="essay">
            <i class="far fa-file-excel"></i>
            <span>Report List</span>
        </a>
        <div id="export" class="collapse <?php if ($menus == 'export') {echo '';}?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($submenus == 'students') {echo 'active';}?>"
                    href="<?=base_url('editor/export/students-essay');?>"><i class="far fa-file-excel"></i>&nbsp;
                    Ongoing Essay</a>
                <a class="collapse-item <?php if ($submenus == 'editors') {echo 'active';}?>"
                    href="<?=base_url('editor/export/editors-essay');?>"><i class="fas fa-file-excel"></i>&nbsp;
                    Completed Essay</a>
            </div>
        </div>
    </li>
    <?php }?>


    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Your Essays
    </div>
    <li class="nav-item <?php if ($menus == 'essay-list') {echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('editor/essay-list');?>">
            <i class="fas fa-file-upload"></i>
            <span>Essay List</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->