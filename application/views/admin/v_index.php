

  <!-- Begin Page Content -->
  <div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

		
		<?php if($this->session->userdata('level') == "admin"){?>
		<div class="row">
				<div class="col-lg-4 mb-4">
			<div class="card bg-info text-white shadow">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
					<i class="fas fa-users  fa-2x text-gray-300 "></i>
					</div>
					<div class="col mr-3" style="margin-left:20px">
						<?php echo $this->m_dah->tot_anggota()->num_rows(); ?> Anggota
						<div class="text-white-50">Jumlah Anggota</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>

		<!-- end jumlah kk -->
		<div class="col-lg-4 mb-4">
			<div class="card bg-danger text-white shadow">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<i class="fa fa-book fa-2x text-gray-300" aria-hidden="true"></i>
						<!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
					</div>
					<div class="col mr-3" style="margin-left:20px">
						<?php echo $this->m_dah->tot_buku(1)->num_rows(); ?> Buku Sekolah
						<div class="text-white-50">Jumlah Buku Sekolah</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>

		<div class="col-lg-4 mb-4">
			<div class="card bg-info text-white shadow">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<i class="fa fa-book fa-2x text-gray-300" aria-hidden="true"></i>
						<!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
					</div>
					<div class="col mr-3" style="margin-left:20px">
						<?php echo $this->m_dah->tot_buku(2)->num_rows(); ?> Buku Cerita
						<div class="text-white-50">Jumlah Buku Cerita</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>

		<!-- end jumlah surat -->

		  </div>
		<?php } ?>	
		<!-- end card info untuk admin -->

	<!-- Content Row -->
	<div class="row">

	  <!-- Pending Requests Card Example -->
	  <div class="col-xl-12 col-md-12 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
		  <div class="card-body">
			<div class="row no-gutters align-items-center">
			  <div class="col mr-2">

				
				<div class="h5 mb-0 font-weight ">
					<?php echo $this->m_dah->get_option('blog_welcome')?>
				</div>
			  </div>
			 
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<!-- Content Row -->


	<!-- Content Row -->
	

  </div>
  <!-- /.container-fluid -->
