<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Essay Editing System</title>
    <link rel="icon" href="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat/24/document-icon.png">
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
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="<?=base_url('assets/');?>css/selected2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/star-ratings.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/color.css">

    <script src="<?=base_url('assets/');?>js/slimselect.js"></script>
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/slimselect.css">

    <link rel="stylesheet" href="<?=base_url('assets/');?>css/customt.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/rates.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/cards-db.css">
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
        font-size: 14px;
        font-family: 'Roboto', sans-serif;
    }

    textarea,
    select,
    option,
    input {
        font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
    }

    .ss-main .ss-single-selected .placeholder,
    .ss-main .ss-single-selected .placeholder * {
        font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
    }

    .ss-main .ss-content .ss-list .ss-option {
        font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
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

    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
        top: auto;
        left: 10px;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: 70%;
    }

    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        float: left;
        text-align: right;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0;
        margin-left: 0px;
        border: 0px solid transparent;
    }

    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc_disabled:before {
        right: ;
        content: "";
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
        right: ;
        content: "";
    }

    @media only screen and (max-width: 600px) {
        div.dataTables_wrapper div.dataTables_filter label {
            font-weight: normal;
            white-space: nowrap;
            float: left;
            text-align: left;
        }
    }
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