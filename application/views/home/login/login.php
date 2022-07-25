<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<style>
textarea,
input {
    font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
}
</style>

<?php
if ($this->session->flashdata('success')) {
    echo '<div class="flash-data" data-success="' . $this->session->flashdata('success') . '"></div>';
} else if ($this->session->flashdata('error')) {
    echo '<div class="flash-data" data-error="' . $this->session->flashdata('error') . '"></div>';
} else if ($this->session->flashdata('warning')) {
    echo '<div class="flash-data" data-warning="' . $this->session->flashdata('warning') . '"></div>';
} else if ($this->session->flashdata('login')) {
    echo '<div class="flash-data" data-login="' . $this->session->flashdata('login') . '"></div>';
}
?>

<section class="akame-service-area pt-4 pb-5" style="background: #9CECFB;
background: -webkit-linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
background: linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card shadow mt-3 mb-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-7 text-center bg-light">
                                <!-- https://cdn.dribbble.com/users/558267/screenshots/3087122/day-and-night.gif -->

                                <img src="<?=base_url('assets/img/editor.gif');?>" width="50%" height="50%"
                                    class="mt-4">
                            </div>
                            <div class="col-lg-5 pr-5 pl-5 pt-5 pb-4">
                                <div class="">
                                    <h1 class="h5 font-weight-bold text-primary text-center mt-2">Login as
                                        <?=ucfirst($title);?></h1>

                                    <hr>
                                    <?php if($title=='administrator'){ ?>
                                    <form class="user mt-4" method="post" action="<?=base_url('all-inedu');?>">
                                        <?php } ?>
                                        <form class="user mt-4" method="post"
                                            action="<?=base_url('login/auth/'.$title);?>">
                                            <?=form_error('email', '<div class="text-left"><small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small></div>');?>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" name="email"
                                                    placeholder="&#xf0e0; &nbsp; E-mail">
                                            </div>

                                            <?=form_error('password', '<div class="text-left"><small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small></div>');?>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control form-control-sm"
                                                    name="password" placeholder="&#xf2a8; &nbsp; Password">
                                            </div>

                                            <hr>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-danger btn-sm pr-5 pl-5">
                                                    <i class="fas fa-unlock"></i>&nbsp; Login
                                                </button>
                                            </div>
                                        </form>
                                        <hr class="mt-3">
                                        <div
                                            class="<?php if($title!='students'){ echo 'text-center'; } else {echo 'float-left';} ?>">
                                            <a class="small" href="<?=base_url('auth/forgot/'.$title);?>">Forgot
                                                Password?</a>
                                        </div>
                                        <?php if($title=='students'){ ?>
                                        <div class="float-right">
                                            <a class="small" href="#">Create an Account!</a>
                                        </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mb-5">
                <div <?php if($title=='administrator'){ echo 'hidden'; } ?>>
                    <small>
                        Login as
                        <a href="<?=base_url('login/auth/students');?>" class="text-success"
                            <?php if($title=='students'){ echo 'hidden'; } ?>>Students</a>
                        <a href="<?=base_url('login/auth/editors');?>" class="text-primary"
                            <?php if($title=='editors'){ echo 'hidden'; } ?>>| Editors</a>
                        <a href="<?=base_url('login/auth/mentors');?>" class="text-danger"
                            <?php if($title=='mentors'){ echo 'hidden'; } ?>>| Mentors</a>
                    </small>
                    <br>
                    <a href="<?=base_url('login');?>">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>