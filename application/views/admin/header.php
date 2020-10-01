<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <!--  <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome.css"> -->
  <!--  <link rel="stylesheet" href="bootstrap/fontawesome/css/fontawesome.all.css"> -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css'); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/sendiri.css'); ?>">
</head>
<body>

  <div id="wrapper">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <h2 class ="text-center"style="color : white" >SISTEM MANAJEMEN PERGUDANGAN CV SAKURA</h2>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Trainit</a> -->
      </div>
    </nav> 
    <nav class="navbar-default navbar-side">
      <div class="sidebar-collapse">
        <div class="user">
          <img src="<?php echo base_url('assets/images/logowebsite.png') ?> " alt="">
          
          <p> 
           Administrator
            <br>
            <?php echo $_SESSION['admin']['username_admin']; ?></p>
        </div> 
        <ul class="nav" id="main-menu">
          <li><a href="<?php echo base_url("admin") ?>"><i class="fas fa-home"></i> Home</a></li><li><a href="<?php echo base_url("admin/masuk") ?>"><i class="fas fa-arrow-alt-circle-right"></i></i> Transaksi Masuk</a></li>

          <li><a href="<?php echo base_url("admin/keluar") ?>"><i class="fas fa-arrow-alt-circle-left"></i></i> Transaksi Keluar</a></li>

          <li><a href="<?php echo base_url("admin/produksi") ?>"><i class="fas fa-industry"></i> Transaksi Produksi</a></li>

          <li><a href="<?php echo base_url("admin/distribusi") ?>"><i class="fas fa-motorcycle"></i></i> Transaksi Distribusi</a></li>

          <li><a href="<?php echo base_url("admin/logout") ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>        
      </div>
    </nav>
    <div id="page-wrapper">
      <div id="page-inner">