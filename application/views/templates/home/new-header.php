<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Essay Editing Portal</title>

    <!-- Favicon -->
    <link rel="icon" href="<?=base_url('assets/img/new-icons.png');?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?=base_url('assets/allin/');?>style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Roboto', sans-serif;
    }

    .single-service-area {
        position: relative;
        z-index: 1;
        padding: 20px 0px;
    }

    hr {
        margin-top: 0;

    }
    </style>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300);

    body {
        font: 14px 'Open Sans';
    }

    .form-control,
    .thumbnail {
        border-radius: 2px;
    }

    .btn-danger {
        background-color: #B73333;
    }

    /* File Upload */
    .fake-shadow {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .fileUpload {
        position: relative;
        overflow: hidden;
    }

    .fileUpload #logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .img-preview {
        max-width: 100%;
    }

    .login {
        margin-top: -16px;
        padding: 19px 10px 19px 10px;
        margin-bottom: -20px;
        background: #F89924;
        text-align: center;
    }

    .notif {
        margin-top: -20px;
        padding: 19px 10px 18px 10px;
        margin-bottom: -18px;
        background: #237BE0;
        text-align: center;
    }
    
    #scrollUp {
        opacity:0.6;
        bottom:10px;
        right: 10px;
        background-color: #4363bf;
    }

    @media only screen and (max-width: 600px) {
        .login {
            margin: 20px -20px 0 -20px;
            padding-top: 8px;
            padding-bottom: 8px;
            margin-bottom: 0px;
        }

        .notif {
            margin: 20px -20px 0 -20px;
            padding-top: 8px;
            padding-bottom: 8px;
            margin-bottom: 0px;
        }
    }
    </style>
</head>

<body>

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
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->
    <header class="bg-dark">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-md-5 pt-3 pb-3">
                        <div class="top-header-content">
                            <b class="text-white">Essay Editing Portal</b>
                        </div>
                    </div>
                    <div class="col-7 pt-3 d-lg-block d-none">
                        <div class="top-header-content text-right">
                            <p class="text-white" style="font-size:12px;">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Mon-Sat: 8.00 to
                                17.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone"
                                    aria-hidden="true"></i> Call us: <a class="text-white" href="tel:+6281808081363">+62
                                    818 0808 1363</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid pt-2 pb-2 shadow">
        <nav class=" container navbar navbar-expand-lg">
            <a class="nav-brand pr-5" href="<?=base_url();?>"><img src="<?=base_url('assets/img/logo-home.png');?>"
                    alt="Essay Editing" width="200px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item pr-3">
                    <a class="nav-link" href="#">Home</a>
                </li> -->
                </ul>
                <div class="notif" style="display:none;">
                    <a class="nav-link font-weight-bold text-white" href="<?=base_url('home/cart');?>">
                        <i class="fas fa-bell"></i>
                        <sup class="text-warning">
                            <b>
                                <?php if ($this->cart->total_items()) {echo $this->cart->total_items();} else {echo '';}?>
                            </b>
                        </sup>
                    </a>
                </div>
                <div class="login">
                    <?php if ($this->session->userdata('email')) {?>
                    <a class="nav-link text-white" href="
                                                <?php if ($role == 'students') {echo base_url('student/dashboard');} 
                                                else if ($role == 'admins') {echo base_url('admin/dashboard');} 
                                                else if ($role == 'mentors') {echo base_url('mentor/dashboard');} 
                                                else {echo base_url('editor/dashboard');}?>" class=""
                        title="Dashboard"> <i class="fas fa-tachometer-alt"></i>
                        <!-- &nbsp; Dashboard -->
                    </a>
                    <?php } else {?>
                    <a class="nav-link font-weight-bold text-white" href="<?=base_url('login');?>">
                        <i class="fas fa-sign-in-alt"></i>&nbsp; Login</a>
                    <?php }?>
                </div>
            </div>
        </nav>
    </div>