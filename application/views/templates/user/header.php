<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Essay Editing Portal</title>
    <link rel="icon" href="<?=base_url('assets/img/new-icons.png');?>">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/zoomss.css">
    <link href="<?=base_url('assets/');?>css/sb-admins.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="<?=base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <!--<link rel="stylesheet" href="style.css">-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="<?=base_url('assets/');?>css/selected2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/star-ratings.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/color.css">

    <script src="<?=base_url('assets/');?>js/slimselect.js"></script>
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/slimselect.css">

    <link rel="stylesheet" href="<?=base_url('assets/');?>css/our-style.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/rates.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/card-db.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Roboto', sans-serif;
    }

    @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,300);

    body {
        font-size: 15px;
        font-family: 'Roboto', sans-serif;
    }

    p {
        line-height: 1.6 !important;
    }

    .table td, .table th {
        padding: 8px 10px !important;
    }

    .form-control, .thumbnail {
        font-size: 13px !important;
    }

    /* table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
        background-color: #4988ff;
        margin-right: 50px;
    } */
    </style>
</head>

<body id="page-top">
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


    <!-- Page Wrapper -->
    <div id="wrapper">