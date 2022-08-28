<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Mitra Kerja (Agen)</h1>
  <a href="<?php echo base_url().'admin/mitra'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Mitra Kerja (Agen)</h6>
                    </div>
                    <div class="card-body">
                        <?php foreach($data as $dt){?>
                    <form action="<?php echo base_url().'admin/mitra_update'?>" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nama Agen</label>
                                    <input type="text" class="form-control form-control-user" name="nama" value="<?php echo $dt->nama?>">
                                    <input type="hidden"  name="id" value="<?php echo $dt->id?>">

                                     <?php echo form_error('nama', '<div class="form-error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Pemilik Agen</label>
                                    <input type="text" class="form-control form-control-user" name="pemilik" value="<?php echo $dt->pemilik?>">
                                     <?php echo form_error('pemilik', '<div class="form-error">', '</div>'); ?>

                                </div>

      

                                 <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control form-control-user" name="alamat" value="<?php echo $dt->alamat?>">
                                     <?php echo form_error('alamat', '<div class="form-error">', '</div>'); ?>

                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control form-control-user" name="email" value="<?php echo $dt->email?>">
                                     <?php echo form_error('email', '<div class="form-error">', '</div>'); ?>

                                </div>

                                 <div class="form-group">
                                    <label for="">Nomor Handphone</label>
                                    <input type="number" class="form-control form-control-user" name="no_hp" value="<?php echo $dt->no_hp?>" >
                                     <?php echo form_error('no_hp', '<div class="form-error">', '</div>'); ?>

                                </div>
                                 

                                
                            </div>

                            
                        </div>
                                <button class="btn btn-primary float-right" type="submit"><i class="fas fa-save"></i> Simpan Data</button>        
                        
                        </form>
                        <?php } ?>
                    </div>
                </div>
		    </div>
		</div>
</div>
