<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Essay Editing System</title>

    <!-- Favicon -->
    <link rel="icon" href="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat/24/document-icon.png">

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
    @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,300);

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

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-5">
                        <div class="top-header-content">
                            <p>Welcome to Essay Editing All-In Eduspace!</p>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="top-header-content text-right">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Mon-Sat: 8.00 to 17.00 <span
                                    class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone"
                                    aria-hidden="true"></i> Call us: (+12)-345-6789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img src="<?=base_url('assets/img/logo.png');?>"
                                alt="Essay Editing" width="170px"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a class="text-decoration-none" href="<?=base_url('/');?>">Home</a></li>
                                    <li><a class="text-decoration-none" href="<?=base_url('/');?>#about">About Us</a>
                                    </li>
                                    <li><a class="text-decoration-none" href="<?=base_url('/');?>#our-service">Our
                                            Service</a></li>
                                    <li>
                                        <!-- Book Icon -->
                                        <?php if ($this->session->userdata('email')) {?>
                                        <div class="">
                                            <a class="text-decoration-none" href="
                                                <?php if ($role == 'students') {echo base_url('student/dashboard');} 
                                                else if ($role == 'admins') {echo base_url('admin/dashboard');} 
                                                else if ($role == 'mentors') {echo base_url('mentor/dashboard');} 
                                                else {echo base_url('editor/dashboard');}?>"
                                                class="btn text-primary btn-sm pl-4 pr-4" title="Dashboard"> <i
                                                    class="fas fa-tachometer-alt"></i>
                                                <!-- &nbsp; Dashboard -->
                                            </a>
                                        </div>
                                        <?php } else {?>
                                        <div class="">
                                            <a class="btn btn-sm btn-primary rounded-pill pl-4 pr-4 text-white pt-0"
                                                href="<?=base_url('login');?>"><i class="fab fa-keycdn"></i>
                                                &nbsp; Login
                                            </a>
                                        </div>
                                        <?php }?>
                                    </li>
                                    <li>
                                        <a class="text-decoration-none" href="<?=base_url('home/cart');?>"
                                            class="text-dark"><i class="fas fa-bell"></i>

                                            <sup class="text-danger">
                                                <b>
                                                    <?php if ($this->cart->total_items()) {echo $this->cart->total_items();} else {echo '';}?>
                                                </b>
                                            </sup>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Header Area End -->