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
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">