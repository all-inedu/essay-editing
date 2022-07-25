<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <div class="sidebar-brand-text mx-3">
                <h3>Student's Dashboard</h3>
            </div>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <?php if ($this->session->userdata('role') != 'students') {} else {?>
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter"><?=count($count_trans);?></span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <?php if (count($count_trans) == 0) {} else {?>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header bg-danger">
                            Payment List (Pending)
                        </h6>
                        <?php foreach ($count_trans as $t): ?>
                        <a class="dropdown-item d-flex align-items-center"
                            href="<?=base_url('student/payment/confirm/' . $t['id']);?>">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-stopwatch text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">
                                    <?=date("D, d M Y, h:i:s", strtotime($t['created_at']));?>
                                </div>
                                <span class="font-weight-bold">Transaction Code :
                                    <br><?=$t['transaction_code'];?></span>
                                <div class="small text-gray-500">Total Payment : Rp.
                                    <?=number_format($t['total'], 0, '.', '.');?></div>
                            </div>
                        </a>
                        <?php endforeach;?>
                    </div>
                    <?php }?>
                </li>
                <?php }?>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <!-- <img class="img-profile rounded-circle" src="<?=base_url('assets/img/user.png');?>"> -->
                        <span
                            class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('name');?></span>
                        <i class="fas fa-sort-down" style="margin-top:-5px;"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?=base_url('student/profile')?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <?php
if ($this->session->userdata('role') == 'students') {
    if ($user['updated_at'] == '0000-00-00 00:00:00') {
        ?>
        <div class="container-fluid">
            <a href="<?=base_url('student/profile/edit/');?>" class="text-decoration-none text-muted">
                <div class="alert alert-warning alert-dismissible fade show shadow border border-info" role="alert">

                    <strong><i class="fas fa-exclamation-circle"></i> &nbsp; Hello
                        <?=$this->session->userdata('name');?></strong>, Please complete your personal data.!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </a>
        </div>
        <?php }}?>