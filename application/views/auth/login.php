<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mt-4">

        <div class="col-xl-12 col-lg-12 col-md-12 text-center">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="float-left mt-2" style="margin-left:-20px;">
                                    <a href="<?=base_url('/');?>">
                                        <img src="<?=base_url('assets/img/logo.png');?>" alt="Essay Editing System"
                                            class="img-responsive text-left" width="150" height="35">
                                    </a>
                                </div>
                                <h1 class="h4 text-gray-900 text-right mt-2">Login Page</h1>

                                <hr>
                                <form class="user mt-4" method="post" action="<?=base_url('auth');?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Enter Email Address..."
                                            value="<?=set_value('email');?>">
                                        <?=form_error('email', '<div class="text-center"><small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small></div>');?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password">
                                        <?=form_error('password', '<div class="text-center"><small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small></div>');?>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?=base_url();?>auth/forgot">Forgot
                                        Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?=base_url();?>auth/register">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>