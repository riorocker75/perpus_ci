<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Profil Perusahaan</h1>
  <a href="<?php echo base_url().'admin/mitra'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profil Perusahaan</h6>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo base_url().'admin/perusahaan_act'?>" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" class="form-control form-control-user" name="nama">
                                     <?php echo form_error('nama', '<div class="form-error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control form-control-user" name="alamat" >
                                     <?php echo form_error('alamat', '<div class="form-error">', '</div>'); ?>

                                </div>

      

                                 <div class="form-group">
                                    <label for="">Bidang Usaha</label>
                                    <input type="text" class="form-control form-control-user" name="bidang" >
                                     <?php echo form_error('bidang', '<div class="form-error">', '</div>'); ?>

                                </div>
                                 

                                
                            </div>

                            
                        </div>
                                <button class="btn btn-primary float-right" type="submit"><i class="fas fa-save"></i> Simpan Data</button>        
                        
                        </form>
                    </div>
                </div>
		    </div>
		</div>
</div>
