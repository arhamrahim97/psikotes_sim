<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href=" <?= base_url() . 'assets/img/favicon.ico' ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url() . 'assets/img/favicon.ico' ?>" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= 'assets/' ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- Custom styles for this template-->
    <link href="<?= 'assets/' ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
    <script src="<?= "assets/" ?>js/sweetalert.js"></script>
    <script src="<?= "assets/" ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= "assets/" ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= "assets/" ?>css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->

    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js" defer></script> -->
    <script type="text/javascript" charset="utf8" src="<?= "assets/" ?>js/jquery.dataTables.js" defer></script>
    <link href="<?= 'assets/' ?>css/select2.min.css" rel="stylesheet">
    <script src="<?= "assets/" ?>js/select2.min.js"></script>
    <script src="<?= "assets/" ?>vendor/ckeditor/ckeditor.js"></script>
    <style>
        .select2-close-mask {
            z-index: 2099;
        }

        .select2-dropdown {
            z-index: 3051;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .dataTables_filter {
            float: right;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .btn-primary {
            border-color: #e62129 !important;
            background-color: #e62129 !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #f26f74 !important;
            border-color: #f26f74 !important;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 181, 184, 0.5);
        }

        .btn-primary:focus,
        .btn-primary:active {
            color: #fff;
            background-color: #e62129 !important;
            border-color: #e62129 !important;
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #e62129 !important;
            border-color: #e62129 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #e62129 !important;
            border-color: #e62129 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 181, 184, 0.5);
        }

        .main-menu.menu-light .navigation>li.active>a {
            color: #20409a !important;
            font-weight: 400 !important;
        }

        .nav-link.active {
            /*background-color: rgb(145, 199, 73) !important;*/
            color: rgb(145, 199, 73) !important;
            border: 1px solid rgb(145, 199, 73) !important;
            background-color: white !important;
        }

        .main-menu.menu-light .navigation>li ul .active>a {
            color: #20409a !important;
            font-weight: 500 !important;
        }

        .main-menu.menu-light .navigation>li.open {
            border-left: 4px solid #20409a !important;
        }

        .breadcrumb-item a {
            color: #20409a !important;
        }

        .dataTables_filter {
            text-align: right !important;
        }

        .dataTables_paginate {
            float: right !important;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">