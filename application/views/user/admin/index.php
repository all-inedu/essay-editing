            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="card shadow animated--grow-in">
                            <div class="card-header">
                                <i class="fas fa-fw fa-donate"></i> &nbsp;Payment of Clients List
                            </div>
                            <div class="card-body">
                                <div class="row mt-3 mb-4">
                                    <div class="col-md-5 p-4 d-none d-xl-block ml-3" style="background:#00B2BC;">
                                        <img src="<?=base_url('assets/img/payment.png');?>"
                                            width="100%" class="img-responsive">
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <a class=" d-flex align-items-center text-decoration-none"
                                            href="<?=base_url('admin/payments');?>">
                                            <div class="mr-4 ml-3">
                                                <div class="icon-circle bg-danger text-white">
                                                    <i class="fas fa-stopwatch"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Pending List &nbsp;<span
                                                        class="badge badge-danger text-right"
                                                        id="pendingCount"></span></span>
                                            </div>
                                        </a>
                                        <hr>
                                        <a class=" d-flex align-items-center text-decoration-none mt-3"
                                            href="<?=base_url('admin/payments');?>">
                                            <div class="mr-4 ml-3">
                                                <div class="icon-circle bg-warning text-white">
                                                    <i class="far fa-clock"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Verify List &nbsp;<span
                                                        class="badge badge-warning text-right"
                                                        id="verifyCount"></span></span>
                                            </div>
                                        </a>
                                        <hr>
                                        <a class="d-flex align-items-center text-decoration-none mt-3"
                                            href="<?=base_url('admin/payments');?>">
                                            <div class="mr-4 ml-3">
                                                <div class="icon-circle bg-success text-white">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Paid List</span>
                                                <div class="small text-gray-500">Total : <?=count($paid);?></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 mt-3">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <a href="<?=base_url('admin/essay-list/verify');?>" class="text-decoration-none">
                                    <div class="card-db card-stats">
                                        <div class="card-header4 card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons"><img
                                                        src="<?=base_url('assets/img/list-dash2.png');?>"
                                                        width="50"></i>
                                            </div>
                                            <p class="card-category">Completed</p>
                                            <h3 class="card-title"><?=$completed;?>
                                                <small>Essays</small>
                                            </h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="fa fa-check-square fa-fw text-success"></i> <small
                                                    class="text-danger">See
                                                    the
                                                    list of
                                                    completed
                                                    essays.</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <a href="<?=base_url('admin/essay-list');?>" class="text-decoration-none">
                                    <div class="card-db card-stats">
                                        <div class="card-header3 card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons"><img
                                                        src="<?=base_url('assets/img/list-dash.png');?>" width="50"></i>
                                            </div>
                                            <p class="card-category">Ongoing</p>
                                            <h3 class="card-title"><?=$ongoing;?>
                                                <small>Essays</small>
                                            </h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="fas fa-exclamation-circle fa-fw text-danger"></i> <small
                                                    class="text-danger">See
                                                    the
                                                    list of
                                                    ongoing
                                                    essays.</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="<?=base_url('admin/clients');?>" class="text-decoration-none">
                            <div class="card-db card-stats">
                                <div class="card-header2 card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons"><img src="<?=base_url('assets/img/users.png');?>"
                                                width="50"></i>
                                    </div>
                                    <p class="card-category">Students</p>
                                    <h3 class="card-title"><?=$student;?>
                                        <small>Students</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="fa fa-user fa-fw text-primary"></i> <small class="text-danger">See
                                            the
                                            list of
                                            students.</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="<?=base_url('admin/mentors');?>" class="text-decoration-none">
                            <div class="card-db card-stats">
                                <div class="card-header2 card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons"><img src="<?=base_url('assets/img/mentor.png');?>"
                                                width="50"></i>
                                    </div>
                                    <p class="card-category">Mentors</p>
                                    <h3 class="card-title"><?=$mentors;?>
                                        <small>Mentors</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="fas fa-user-tag fa-fw text-primary"></i> <small
                                            class="text-danger">See
                                            the
                                            list of
                                            mentors.</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="<?=base_url('admin/editors');?>" class="text-decoration-none">
                            <div class="card-db card-stats">
                                <div class="card-header2 card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons"><img src="<?=base_url('assets/img/editor.png');?>"
                                                width="50"></i>
                                    </div>
                                    <p class="card-category">Editors</p>
                                    <h3 class="card-title"><?=$editors;?>
                                        <small>Editors</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="fas fa-user-cog fa-fw text-primary"></i> <small
                                            class="text-danger">See
                                            the
                                            list of
                                            edtitors.</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
            <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
            <script type="text/javascript">
//fungsi pending Count
function pendingCount() {
    $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>admin/admin-json/pendingCountJson',
        dataType: 'json',
        success: function(data) {
            $('#pendingCount').html(data.length);
        }
    });
}

setInterval(pendingCount, 10000);
pendingCount();

// Fungsi verify Count
function verifyCount() {
    $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>admin/admin-json/verifyCountJson',
        dataType: 'json',
        success: function(data) {
            $('#verifyCount').html(data.length);
        }
    });
}

setInterval(verifyCount, 10000);
verifyCount();
            </script>