<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mt-2">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?=base_url('assets/img/logo.png');?>" alt="Essay Editing System"
                                        class="img-responsive text-left" width="150" height="35">
                                    <h1 class="h4 text-gray-900 mb-2 mt-3">Change Password</h1>
                                    <h5 class="text-muted"><?=$this->session->userdata('reset-email');?></h5>
                                </div>
                                <hr>
                                <form class="user" method="post" action="<?=base_url('auth/changePassword');?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-sm" id="email"
                                            name="password1" placeholder="Enter new password..">
                                        <?=form_error('password1', '<div class="text-center"><small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small></div>');?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-sm" id="email"
                                            name="password2" placeholder="Enter repeat password..">
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Reset Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>