<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HM Page</title>
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
      </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       <!--  <a class="navbar-brand" href="#">CV SAKURA</a> -->
      </div>
    </nav> 
    <nav class="navbar-default navbar-side">
      <div class="sidebar-collapse">
        <div class="user">
          <img src="<?php echo base_url('assets/images/logowebsite.png') ?> " alt="">
          
          <br>
          
          <!-- <p>Selamat Datang Kepala Gudang
            Bapak<?php foreach ($user as $key => $value): ?>
            <?php echo $value['username_kepala'] ?>
          <?php endforeach ?><p> -->
          <!--   <p>

            Kepala Gudang
            <br>
            <?php echo $this->fungsi->user_login()->username_kepala ?>
            </p>  -->

             <p>
              Kepala Gudang
              <br>
              <?php echo $_SESSION['kepala']['username_kepala']; ?>
            </p> 
        </div> 
        <ul class="nav" id="main-menu">
          <li><a href="<?php echo base_url("kepala") ?>"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="<?php echo base_url("kepala/profil") ?>"><i class="fas fa-user"></i> Profile</a></li>
          <li class="tr-tree">
            <a href="#"><i class="fas fa-server"></i> Data Master <i class="pull-right fas fa-angle-down"></i></a>
            <ul class="tr-tree-menu">

              <li><a href="<?php echo base_url("kepala/admin") ?>"> Admin</a></li>
              <li><a href="<?php echo base_url("kepala/bahan") ?>"> Bahan</a></li>
              <li><a href="<?php echo base_url("kepala/pelanggan") ?>"> Pelanggan</a></li>
              <li><a href="<?php echo base_url("kepala/pemasok") ?>"> Pemasok</a></li>
            </ul>
          </li>

           <li class="tr-tree">
            <a href="#"><i class="fas fa-book"></i> Laporan - Laporan <i class="pull-right fas fa-angle-down"></i></a>
            <ul class="tr-tree-menu">

              <li><a href="<?php echo base_url("kepala/masuk") ?>">Masuk</a></li>
              <li><a href="<?php echo base_url("kepala/keluar") ?>">Keluar</a></li>
              <li><a href="<?php echo base_url("kepala/produksi") ?>">Produksi</a></li>
              <li><a href="<?php echo base_url("kepala/distribusi") ?>">Distribusi</a></li>
            </ul>
          </li>

          <li><a href="<?php echo base_url("kepala/perhitungan") ?>"><i class="fas fa-calculator"></i> Perhitungan</a></li>

          <li><a href="<?php echo base_url("kepala/logout") ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>        
      </div>
    </nav>
    <div id="page-wrapper">
      <div id="page-inner">
      