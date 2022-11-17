<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">View Anggota</h1>
  <a href="<?php echo base_url().'admin/anggota'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Anggota</h6>
                    </div>
                    <?php foreach($data as $dt){?>
                    <div class="card-body">
                    <form  method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="hidden" class="form-control form-control-user" name="id" value="<?php echo $dt->id?>" disabled>

                                    <input type="text" class="form-control form-control-user" name="nama" value="<?php echo $dt->nama?>" disabled>
                                     <?php echo form_error('nama', '<div class="form-error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">NIS</label>
                                    <input type="text" class="form-control form-control-user" name="nis" value="<?php echo $dt->nis?>" disabled>
                                     <?php echo form_error('nis', '<div class="form-error">', '</div>'); ?>

                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                 <select class="custom-select form-control-border border-width-2"  name="jenis_kelamin" required="required" disabled>
                                        <option value="<?php echo $dt->jenis_kelamin?>" selected><?php echo $this->m_dah->jenis_kelamin($dt->jenis_kelamin)?></option>
                                        <option value="1">Pria</option>
                                        <option value="2">Wanita</option>
                                </select>
                                <?php echo form_error('jenis_kelamin', '<div class="form-error">', '</div>'); ?>
                                
                            </div>

                                 <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-user" name="tempat_lahir" value="<?php echo $dt->tempat_lahir?>" disabled>
                                     <?php echo form_error('tempat_lahir', '<div class="form-error">', '</div>'); ?>

                                </div>

                                       <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d',strtotime($dt->tanggal_lahir))?>" name="tanggal_lahir" disabled>
                                     <?php echo form_error('tanggal_lahir', '<div class="form-error">', '</div>'); ?>

                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail1">Tingkatan</label>
                                 <select class="custom-select form-control-border border-width-2"  name="tingkatan" required="required" disabled>
                                        <option value="<?php echo $dt->tingkatan?>" selected><?php echo $this->m_dah->tingkatan($dt->tingkatan)?></option>
                                        
                                        <option value="sd">Sekolah Dasar</option>

                                </select>
                                <?php echo form_error('tingkatan', '<div class="form-error">', '</div>'); ?>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tahun Masuk</label>
                                <input type="number" min="1900" max="2099" step="1" value="<?php echo date('Y')?>" class="form-control" name="tahun_masuk" value="<?php echo $dt->tahun_masuk?>" disabled>
                                <?php echo form_error('tahun_masuk', '<div class="form-error">', '</div>'); ?>

                            </div>

                                
                            </div>

                            
                        </div>
                        
                        </form>
                    </div>
                    <?php } ?>
                </div>
		    </div>
		</div>
</div>
