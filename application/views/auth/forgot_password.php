<div class="akame-service-area pt-4 pb-5" style="background: #9CECFB;
background: -webkit-linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
background: linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
">
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

                                    <h3 class="mt-2 mb-3">Forgot Your Password?</h3>
                                    We get it, stuff happens. Just enter your email address below and we'll send you a
                                    link to reset your password!
                                </div>
                                <form class="user mt-3" method="post" action="">
                                    <div class="form-group">
                                        <input type="hidden" name="role" value="<?=$role;?>">
                                        <input type="text" class="form-control form-control-sm text-center" id="email"
                                            name="email" placeholder="Enter Email Address...">
                                        <?=form_error('email', '<div class="text-center"><small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small></div>');?>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Reset Password
                                        </button>
                                    </div>
                                </form>
                                <br>
                                <div class="text-center">
                                    <a class="small" href="<?=base_url();?>login">Back to Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>