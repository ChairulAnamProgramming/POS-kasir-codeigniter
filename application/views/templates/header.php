<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/') ?>build/css/custom.min.css" rel="stylesheet">


    <!-- iCheck -->
    <link href="<?= base_url('assets/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?= base_url('assets/') ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?= base_url('assets/') ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?= base_url('assets/') ?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?= base_url('assets/') ?>vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('assets/') ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <style type="text/css">
     .bg-abu-abu {
      background-color: #73879c;
      padding-top: 1%;
      padding-bottom: 1%;
     }
     .margin-b
     {
      margin-bottom: 1%;
     }

     .total
     {
      background-color: #ceccc0;
      height: 60px;
     }

     .grand-total 
     {
      background-color: #f2d78e;
      height: 35px;
     }

     .kembalian
     {
      background-color: #d8d8d8;
      color: #757575;
      height: 35px;
     }
     .myTable 
     {
        width: 100%;
     }
   </style>
  </head>

  <body class="nav-md" onload="startTime()">