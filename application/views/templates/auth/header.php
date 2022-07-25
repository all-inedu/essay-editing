<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title;?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url();?>assets/css/sb-admins.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }

    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }
    </style>
</head>

<body style="background:#dedede;">
    <div class="preloader">
        <div class="loading">
            <img src="https://cdn-images-1.medium.com/max/1600/1*inYwyq37FdvRPLRphTqwBA.gif" width="300">
        </div>
    </div>
    <div id="bg">
        <?php
date_default_timezone_set('Asia/Jakarta');
if ($this->session->flashdata('success')) {
    ?>
        <div class="flash-data" data-success="<?=$this->session->flashdata('success');?>"></div>
        <?php
} else if ($this->session->flashdata('error')) {
    ?>
        <div class="flash-data" data-error="<?=$this->session->flashdata('error');?>"></div>
        <?php
} else {?>
        <div class="flash-data" data-warning="<?=$this->session->flashdata('warning');?>"></div>
        <?php }?>