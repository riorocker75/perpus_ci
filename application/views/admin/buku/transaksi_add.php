<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
  <a href="<?php echo base_url().'admin/transaksi'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo base_url().'admin/transaksi_act'?>" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                              

                               
                                

                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Peminjam</label>
                                    <select class="custom-select selectpicker form-control-border border-width-2" data-live-search="true" name="anggota" required="required">
                                            <option value="">--Pilih Anggota--</option>
                                            <?php 
                                                $anggota=$this->m_dah->get_data_desc('id','anggota')->result();
                                                foreach($anggota as $ag){
                                            ?>
                                            <option value="<?php echo $ag->id?>"><?php echo $ag->nis ?> | <?php echo $ag->nama?></option>
                                            <?php }?>
                                    </select>
                                    <?php echo form_error('anggota', '<div class="form-error">', '</div>'); ?>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Buku</label>
                                    <select class="custom-select selectpicker form-control-border border-width-2" data-live-search="true" name="buku" required="required">
                                            <option value="">--Pilih Buku--</option>
                                            <?php 
                                                $buku=$this->m_dah->get_data_desc('id','buku')->result();
                                                foreach($buku as $bk){
                                            ?>
                                            <option value="<?php echo $bk->id?>"><?php echo $bk->judul ?> </option>
                                            <?php }?>
                                    </select>
                                    <?php echo form_error('buku', '<div class="form-error">', '</div>'); ?>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="">Tanggal Pinjam</label>
                                    <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d')?>" name="tanggal_pinjam" >
                                     <?php echo form_error('tanggal_pinjam', '<div class="form-error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Kembali</label>
                                    <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d')?>" name="tanggal_kembali" >
                                     <?php echo form_error('tanggal_kembali', '<div class="form-error">', '</div>'); ?>
                                </div>

              

                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <input type="text"  class="form-control" name="ket">
                                <?php echo form_error('ket', '<div class="form-error">', '</div>'); ?>

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
