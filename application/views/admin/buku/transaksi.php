<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>



  </div>


  
  <!-- Content Row -->

  

  <div class="row">

    <div class="col-lg-12 mb-4">
    <?php show_alert() ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary" style="line-height: 1.5">Data Transaksi</h6>


        </div>

        <div class="card-body">
          <div class="float-right">
            <?php if ($this->session->userdata('level') == "admin") { ?>
              <a href="<?php echo base_url().'admin/transaksi_add' ?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-home" aria-hidden="true"></i> Tambah </a>
              <a href="<?php echo base_url().'admin/transaksi_cetak' ?>" class="d-sm-inline-block btn btn-sm btn-default shadow-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</a>

            <?php } else {
            } ?>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Judul Buku</th>
                  <th>Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Terlambat</th>
                  <th>Kembali</th>
                  <th>Perpanjang</th>


                </tr>
              </thead>
              <tbody>
                <?php $n = 1;
                foreach ($data as $dt) { ?>
                <?php 
                    $anggota = $this->m_dah->get_data_from('anggota','id',$dt->anggota_id)->row();
                    $buku = $this->m_dah->get_data_from('buku','id',$dt->buku_id)->row();

                    $date1 = date('Y-m-d');
                    $date2 =date('Y-m-d',strtotime($dt->tanggal_kembali));
                    $diff = abs(strtotime($date1) - strtotime($date2));
                   
                    if($date2 < $date1){
                        $telat = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    }else{
                        $telat ="0";
                    }
                ?>
                  <tr>
                    <td><?php echo $n++; ?></td>
                    <td><?php echo $buku->judul; ?></td>
                    <td><?php echo $anggota->nama; ?></td>
                    <td><?php echo date('Y-m-d',strtotime($dt->tanggal_pinjam));?></td>
                    <td><?php echo date('Y-m-d',strtotime($dt->tanggal_kembali));?></td>
                    <td>

                        <?php if($dt->status == "1"){?>
                        <label class="<?php if($telat > 0){echo "badge badge-danger";}else{echo "badge badge-info";}?>">
                            <?php echo $telat; ?> hari
                        </label>

                        <?php }elseif($dt->status == "2"){?>
                            <label class="badge badge-success">
                                Selesai Meminjam
                             </label>
                        <?php } ?>
                    
                    </td>


                    <td style="text-align: center;">
                        <?php if($dt->status == "1"){?>
                            <a title="pengembalian" href="<?php echo base_url() . 'admin/transaksi_kembali/'.$dt->id ?>">Kembali </a>
                        <?php }elseif($dt->status =="2"){?>
                            <label class="badge badge-default">
                                Transaksi selesai
                             </label>
                         <?php } ?>   
                    </td>
                    <td style="text-align: center;">
                        
                    <?php if($dt->status == "1"){?>
                      <a title="perpanjang" href="<?php echo base_url() . 'admin/transaksi_edit/'.$dt->id ?>">Perpanjang </a>
                        <?php }elseif($dt->status =="2"){?>
                            <label class="badge badge-default">
                                Transaksi selesai
                             </label>
                         <?php } ?> 
                     
                    </td>

                  </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>