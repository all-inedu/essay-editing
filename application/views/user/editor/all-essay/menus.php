<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card-db">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/all-essay.png');?>" width="84%" class="mt-4 mb-4">
                </div>
                <div class="card-header4">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>ALL ESSAYS</h4>
                        </div>
                        <div class="col-md-4 text-right mt-1">
                            <h4><i class="fas fa-arrow-circle-right"></i></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('editor/all-essay/lists/student-essay');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header2 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/uploaded.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Not Assign</p>
                                <h3 class="card-title"><?=$uploaded;?>
                                    <small>Essay</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-cloud-upload-alt"></i>&nbsp; <small class="text-danger">See
                                        the
                                        list of
                                        uploaded essay.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('editor/all-essay/lists/assign');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header2 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/assign.jpg');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Assigned</p>
                                <h3 class="card-title"><?=$assigned;?>
                                    <small>Essay</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-paper-plane"></i>&nbsp; <small class="text-danger">See
                                        the
                                        list of
                                        assignments.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('editor/all-essay/lists/process');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header2 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/ongoing.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Ongoing</p>
                                <h3 class="card-title"><?=$processed;?>
                                    <small>Essay</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-edit"></i>&nbsp; <small class="text-danger">See
                                        the
                                        list of
                                        ongoing essay.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('editor/all-essay/lists/completed');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header2 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/task-completed.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Completed</p>
                                <h3 class="card-title"><?=$completed;?>
                                    <small>Essay</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-check-circle"></i>&nbsp; <small class="text-danger">See
                                        the
                                        list of
                                        completed essay.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>