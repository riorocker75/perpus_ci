<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Buku Sekolah</h1>
  <!-- <a href="<?php echo base_url().'admin/buku_sekolah'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a> -->
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Buku Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <?php foreach($data as $dt){?>
                    <form action="<?php echo base_url().'admin/sekolah_update'?>" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="hidden"  name="id" value="<?php echo $dt->id?>">

                                    <input type="text" class="form-control form-control-user" value="<?php echo $dt->judul?>" name="judul" required>
                                     <?php echo form_error('judul', '<div class="form-error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Penulis</label>
                                    <input type="text" class="form-control form-control-user" name="penulis" value="<?php echo $dt->penulis?>" required>
                                     <?php echo form_error('penulis', '<div class="form-error">', '</div>'); ?>

                                </div>

      

                                 <div class="form-group">
                                    <label for="">Penerbit</label>
                                    <input type="text" class="form-control form-control-user" name="penerbit" value="<?php echo $dt->penerbit?>" required>
                                     <?php echo form_error('penerbit', '<div class="form-error">', '</div>'); ?>

                                </div>

                                <div class="form-group">
                                    <label for="">Tahun Terbit</label>
                                    <input type="number" min="1900" max="2099" step="1" class="form-control form-control-user" name="tahun_terbit" value="<?php echo $dt->tahun_terbit?>" required>
                                     <?php echo form_error('tahun_terbit', '<div class="form-error">', '</div>'); ?>

                                </div>

                                 <div class="form-group">
                                    <label for="">Jumlah Buku</label>
                                    <input type="text" class="form-control form-control-user" name="jumlah" value="<?php echo $dt->jumlah?>" required>
                                     <?php echo form_error('jumlah', '<div class="form-error">', '</div>'); ?>

                                </div>

                                <div class="form-group">
                                    <label for="">Lokasi Buku</label>
                                    <input type="text" class="form-control form-control-user" name="lokasi" value="<?php echo $dt->lokasi?>" required>
                                     <?php echo form_error('lokasi', '<div class="form-error">', '</div>'); ?>

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
