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
	
	<!-- /global stylesheets -->
<script src="<?php echo base_url(); ?>assets_f/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- /theme JS files -->

     <style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}

			/* @page { size: with x height */
			/*@page { size: 20cm 10cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			 .kepala{
        text-align:center;
        font-size: 28px;
        margin:40px 120px;

    }
    .kop_surat {
	position: relative;
	height: 4cm;
	display: flex;
	top: 0;
}

.logo_surat {
	height: 0.5cm;
	width: 0.5cm;
    position: absolute;
    left: 150px;
}
.logo_surat img{
    margin-top: 40px;
  width: 90px;
    height: 75px;
}
.logo_kanan{
    position: absolute;
        right: 150px;

}
.logo_kanan img{
     margin-top: 40px;
    width: 90px;
    height: 75px;
}
.judul_surat {
	padding-top: 0.5cm;
	padding-left: 1cm;
	padding-right: 1cm;
	font-size: 20pt;
	font-weight: 700;
	text-align: center;
	width: 14.8cm;
	/* background: red; */
	margin: 0 auto;
	/* line-height: 1.3;s */
}
	</style>
</head>

<body id="page-top" onload="window.print();">

<div id="wrapper">

    <div class="container">
        <div style="text-align:center;margin-top:30px">
        <h5> Rekapan Surat Keterangan Desa Kebun Balok</h5>
			<h5><?php echo date('Y') ?></h5>
        </div>

        <table id="datatable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                 <th>Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Jenis Surat</th>
                  <th>Pemohon</th>
            </tr>
        </thead>
        <tbody>
		 <?php $no=1; ?>
		<?php foreach($data as $dt){?>
			 
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo date('Y-m-d',strtotime($dt->tanggal)) ?></td>
                <td><?php echo $dt->no_surat ?></td>
                <td>
                    <?php echo $dt->jenis_surat ?>
                </td>
                <td><?php echo $dt->pemohon ?></td>
            </tr>  
		<?php } ?>
        </tbody>   
	</table>


    </div>

	
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
	<div class="copyright text-center my-auto">
	  <span>Surat &copy;<?php echo date("Y")?></span>
	</div>
  </div>
</footer>
<!-- End of Footer -->

</div>
	</div>
	<!-- /main content -->

<!-- /page container -->


  <!-- Bootstrap core JavaScript-->
  
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets_f/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets_f/js/bootstrap.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets_f/js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets_f/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/bootstrap-select.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->
  <!-- Page level custom scripts -->

  <!-- <script src="<?php echo base_url(); ?>assets_f/js/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/tinymce/jquery.tinymce.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets_f/js/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/showpass.js"></script>


<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
  $('#review-tabel').DataTable();
  $('#ditolak-tabel').DataTable();
  $('#diterima-tabel').DataTable();

  $('#lain-review-tabel').DataTable();
  $('#lain-ditolak-tabel').DataTable();
  $('#lain-diterima-tabel').DataTable();

  // untuk mematikan fungsi b-sort databael
  // $('#dataTable').DataTable({
  //     "columnDefs": [
  //       { "orderable": false, "targets": 0 }
  //     ],
  //     "bSort" : false,
  //     "ordering": false



});

</body>
</html>



		