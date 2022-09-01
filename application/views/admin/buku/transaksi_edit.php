<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Perpanjangan Pinjam</h1>
  <a href="<?php echo base_url().'admin/anggota_add'?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
</div>

		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">perpanjangan</h6>
                    </div>
                    <div class="card-body">
                        <?php foreach($data as $dt){?>
                    <form action="<?php echo base_url().'admin/transaksi_update'?>" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-lg-6">
                              
                                <?php 
                                    $anggota=$this->m_dah->get_data_from('anggota','id',$dt->anggota_id)->row();
                                    $buku=$this->m_dah->get_data_from('buku','id',$dt->buku_id)->row();

                                ?>
                                <div class="form-group">
                                    <label for="">Nama Peminjam</label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo $anggota->nama; ?>" disabled>
                                    <input type="hidden" name="id" class="form-control form-control-user" value="<?php echo $dt->id; ?>" >

                                </div>

                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo $buku->judul; ?>" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="">Tanggal Pinjam</label>
                                    <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d',strtotime($dt->tanggal_pinjam))?>" name="tanggal_pinjam" >
                                     <?php echo form_error('tanggal_pinjam', '<div class="form-error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Kembali</label>
                                    <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d',strtotime($dt->tanggal_kembali))?>" name="tanggal_kembali" >
                                     <?php echo form_error('tanggal_kembali', '<div class="form-error">', '</div>'); ?>
                                </div>

              

                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <input type="text"  class="form-control" name="ket">
                                <?php echo form_error('ket', '<div class="form-error">', '</div>'); ?>

                            </div>

                                
                            </div>

                            
                        </div>
                                <button class="btn btn-primary float-right" type="submit"><i class="fas fa-save"></i> Perpanjang</button>        
                        
                        </form>
                        <?php } ?>
                    </div>
                </div>
		    </div>
		</div>
</div>
