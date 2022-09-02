<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<style>
body {}
</style>

<head>
    <meta charset="utf-8">
    <title>404 Page Not Found</title>
    <link rel="stylesheet" href="<?=config_item('base_url');?>assets/css/bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center text-center mt-5">
            <div class="col-md-12 text-center">
                <img src="<?=config_item('base_url');?>assets/img/404-snow.gif" width="550">
            </div>
            <div class="col-md-12 text-primary">
                <h2>Sorry, we couldn't find this page.</h2>
                <hr width="10%">
                <a href="javascript:history.go(-1)" class="btn btn-sm text-danger">
                    <h5>Back to the previous page. </h5>
                </a>
            </div>
        </div>
    </div>
</body>

</html>