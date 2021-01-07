<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
    <!-- Sweetalert -->
    <script src="<?= base_url('assets/'); ?>sweetalert/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>my-assets/mystyle.css">

    <!-- Data Tables -->
    <link rel=" stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <style>
        .btn-codeview {
            display: none;
        }

        /* 
        button[data-name=resizedDataImage] {
            position: relative;
            overflow: hidden;
        }

        button[data-name=resizedDataImage] input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            font-size: 200px;
            max-width: 100%;
            -ms-filter: 'alpha(opacity=0)';
            direction: ltr;
            cursor: pointer;
        } */
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->