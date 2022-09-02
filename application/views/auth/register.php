<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="float-left mt-2" style="margin-left:-20px;">
                            <a href="<?=base_url('/');?>">
                                <img src="<?=base_url('assets/img/logo.png');?>" alt="Essay Editing System"
                                    class="img-responsive text-left" width="150" height="35">
                            </a>
                        </div>
                        <h1 class="h4 text-gray-900 text-right mt-2">Register</h1>

                        <hr>
                        <form class="user" method="post" action="<?=base_url();?>auth/register">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="first_name" class="form-control form-control-sm"
                                        placeholder="First Name" value="<?php echo set_value('first_name'); ?>">
                                    <?=form_error('first_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" name="last_name"
                                        placeholder="Last Name" value="<?php echo set_value('last_name'); ?>">
                                    <?=form_error('last_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="email"
                                    placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-sm" name="password1"
                                        placeholder="Password">
                                    <?=form_error('password1', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-sm" name="password2"
                                        placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-sm" placeholder="Address" name="address"
                                    rows=4><?php echo set_value('address'); ?></textarea>
                                <?=form_error('address', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-user btn-sm">
                                    Register Account
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?=base_url();?>auth/forgot">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?=base_url('auth/');?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>