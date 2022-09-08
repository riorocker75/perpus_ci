<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Data Pegawai</h1>
  <a href="<?php echo base_url().'admin/pegawai'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo base_url().'admin/pegawai_act'?>" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for=""> NIP</label>
                                    <input type="text" class="form-control form-control-user" name="nip">
                                     <?php echo form_error('nip', '<div class="form-error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" class="form-control form-control-user" name="nama" >
                                     <?php echo form_error('nama', '<div class="form-error">', '</div>'); ?>

                                </div>

                                <div class="form-group">
                                    <label for="">Nomor Handphone</label>
                                    <input type="number" class="form-control form-control-user" name="no_hp" >
                                     <?php echo form_error('no_hp', '<div class="form-error">', '</div>'); ?>

                                </div>

                                 <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control form-control-user" name="alamat" >
                                     <?php echo form_error('alamat', '<div class="form-error">', '</div>'); ?>

                                </div>

                                 <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input type="text" class="form-control form-control-user" name="jabatan" >
                                     <?php echo form_error('jabatan', '<div class="form-error">', '</div>'); ?>

                                </div>

                                 <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" class="form-control form-control-user" name="status" >
                                     <?php echo form_error('status', '<div class="form-error">', '</div>'); ?>

                                </div>
                              <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control form-control-user" name="lampiran" >
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
