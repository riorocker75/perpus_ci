<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->m_dah->get_option('blog_name'); ?></title>
	<link rel="icon" type="image/png" href="">
	<!-- Global stylesheets -->
	<link href="<?php echo base_url(); ?>assets_f/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url(); ?>assets_f/css/sb-admin-2.css" rel="stylesheet">
	<!-- <link href="<?php echo base_url(); ?>assets_f/css/bootstrap.min.css" rel="stylesheet"> -->
	
	<link href="<?php echo base_url(); ?>assets_f/css/bootstrap-select.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
	<link href="<?php echo base_url(); ?>assets_f/css/custom.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_f/vendor/select/css/bootstrap-select.min.css" rel="stylesheet">
	
	<!-- /global stylesheets -->
<script src="<?php echo base_url(); ?>assets_f/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/select/js/bootstrap-select.min.js"></script>


	<!-- /theme JS files -->
</head>

<body id="page-top">

<div id="wrapper">


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion side_custom hidden-toggled" 
    id="accordionSidebar"
   
    >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        
        <div class="d-block  sidebar-brand-text mx-3" >
         <i class="fa fa-envelope"></i> 
          <!-- <p style="font-size:10px"><?php echo $this->m_dah->status_login($this->session->userdata('level')) ?> </p> -->
          
        </div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
	  <?php if($this->session->userdata('level') == "admin"){?>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      Admin	
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/anggota/'.$this->session->userdata('penduduk_id');?>">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Data Anggota</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/buku_sekolah/'.$this->session->userdata('penduduk_id');?>">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Data Buku Sekolah</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/buku_cerita/'.$this->session->userdata('penduduk_id');?>">
          <i class="fa fa-flag" aria-hidden="true"></i>
          <span>Data Buku Cerita</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/transaksi/'.$this->session->userdata('penduduk_id');?>">
          <i class="fa fa-book" aria-hidden="true"></i>
          <span>Data Transaksi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/laporan/'.$this->session->userdata('penduduk_id');?>">
          <i class="fa fa-print" aria-hidden="true"></i>
          <span>Data Laporan</span></a>
      </li>



     <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Setting
      </div>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/user/'.$this->session->userdata('penduduk_id');?>">
          <i class="fa fa-lock" aria-hidden="true"></i>
          <span>Users</span></a>
      </li>


      	  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/password_edit/'.$this->session->userdata('id');?>">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Ganti Password</span></a>
      </li>
	  
  
	<?php }?>

	<!------------------------ 
	|	end admin sidebar 
	|------------------------>

	<!------------------------ 
	|	start lurah sidebar 
	|------------------------>
	

	<!------------------------ 
	|	end lurah sidebar 
	|------------------------>

	<!------------------------ 
	|	start rakyat sidebar 
	|------------------------>
	
	<!------------------------ 
	|	end rakyat sidebar 
	|------------------------>

	  <?php if($this->session->userdata('level') == "admin"){?>
	  
     

    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/settings'?>">
          <i class="fa fa-cog" aria-hidden="true"></i>
          <span>Pengaturan Web</span></a>
      </li> -->


  

	  <?php }?>
   <!--  <hr class="sidebar-divider">
	  <div class="sidebar-heading">
        Tentang
      </div>

	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tentang" aria-expanded="true" aria-controls="tentang">
          <i class="fa fa-qrcode" aria-hidden="true"></i>
          <span>Tentang</span>
        </a>
        <div id="tentang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Semua Data:</h6>
            <a class="collapse-item" href="<?php echo base_url().'admin/umum'?>">Umum</a>
            <a class="collapse-item" href="<?php echo base_url().'admin/struktur_organisasi'?>">Struktur Organisasi</a>
            <a class="collapse-item" href="<?php echo base_url().'admin/pelayanan_surat'?>">Pelayanan Surat</a>
            <a class="collapse-item" href="<?php echo base_url().'admin/developer'?>">Pengembang</a>

		  </div>
        </div>
      </li> -->
      <hr class="sidebar-divider">
	
	  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/logout'?>">
        <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->	
	
	<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 buka">
	  <i class="fa fa-bars"></i>
	</button>
<div 
class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100  navbar-search"
style="width:85%!important"
>
<!-- <marquee behavior="scroll" direction="left" style="font-size:16px;font-weight:600;color:#6a1b9a;">
Selamat Datang <?php echo $this->m_dah->status_login($this->session->userdata('level')) ?>
&nbsp;Di Sistem Informasi Pelayanan Administrasi Kependudukan Desa Ulee Ceubrek Kecamatan Meurah Mulia Kabupaten Aceh Utara
</marquee> -->
</div>

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

	  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
	
	  <!-- Nav Item - Alerts -->
	  

	  

		</a>

    <!-- end notifkasi rakyat -->

	  <div class="topbar-divider d-none d-sm-block"></div>

	  <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow" style="text-transform: uppercase;font-size: 12px!important">
      
      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <?php echo $this->m_dah->status_login($this->session->userdata('level'));?>
      </a>
    </li>
    <div class="topbar-divider d-none d-sm-block"></div>
	  <li class="nav-item dropdown no-arrow">
		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('name');?></span>
		  <i class="fa fa-user"></i>
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
		 
      <a class="dropdown-item" href="<?php echo base_url().'admin/user_edit/'.$this->session->userdata('id');?>">
			<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
			Profil
		  </a>
		<!--   <a class="dropdown-item" href="#">
			<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
			Settings
		  </a>
		  <a class="dropdown-item" href="#">
			<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
			Activity Log
		  </a> -->
		  <!-- <div class="dropdown-divider"></div> -->
		  <a class="dropdown-item" href="<?php echo base_url().'admin/logout' ?>" >
			<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
			Logout
		  </a>
		</div>
	  </li>

	</ul>

  </nav>
  <!-- End of Topbar -->


		