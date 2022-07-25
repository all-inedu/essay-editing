<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<?php $email = $this->session->userdata('email'); ?>
<script>
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('257973ebdd8b5e5bd54e', {
    cluster: 'ap1',
    forceTLS: true
});

var channel = pusher.subscribe('<?=$email;?>');
channel.bind('my-event', function(data) {
    $(".toast-body").html(data.message);
    $('.toast').toast('show');
    var x = document.getElementById("myAudio");
    x.play();
});
</script>

<audio id="myAudio">
    <source src="<?=base_url('assets/sound/notify.mp3');?>" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <div class="toast" data-autohide="false" style="position:fixed; right:70px; bottom:5px; z-index:999; width:300px;">
        <div class="toast-header bg-info text-white">
            <strong class="mr-auto">Notification</strong>
            <small class="text-muted times"></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
        </div>
    </div>

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <div class="sidebar-brand-text mx-3">
                <h3>Mentor's Dashboard</h3>
            </div>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
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
                        <?php $role = $this->session->userdata('role');?>
                        <a class="dropdown-item" href="<?=base_url('mentor/profile/change-password');?>">
                            <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i> Change Password</a>
                        <!--<a class="dropdown-item" href="<?=base_url('mentor/help');?>">-->
                        <!--    <i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i> Help</a>-->
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