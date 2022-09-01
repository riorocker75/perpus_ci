	  <!-- Scroll to Top Button-->
	  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
	
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
	<div class="copyright text-center my-auto">
	  <span>Pancabudi &copy;<?php echo date("Y")?></span>
	</div>
  </div>
</footer>
<!-- End of Footer -->

</div>
	</div>
	<!-- /main content -->

<!-- /page container -->


<!-- modal hapus -->
<div class="modal fade modal-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Peringatan</h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin Ingin Menghapus Data Ini ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn-delete-oke">Delete</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
  <script src="<?php echo base_url(); ?>assets_f/vendor/select/js/bootstrap-select.min.js"></script>

  <!-- <script src="<?php echo base_url(); ?>assets_f/js/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/tinymce/jquery.tinymce.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets_f/js/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/showpass.js"></script>

  <!-- cek nik -->
  <script type="text/javascript">
    $('.check-nik').keyup(function(){
        var val = $(this).val();        
        if(val.length > 0){ 
          var data = "val="+val;
          $.ajax({
            type:"post",
            data:data,
            url:"<?php echo base_url().'admin/cek_nik_ajax' ?>",
            success: function(html){          
              if(html > 0){           
                $('.check-nik').css("border-color","red");
                $('.check-nik-output').html("<span class='labil labil-danger' style='text-transform:none!important'>Nik sudah digunakan, jangan gunakan yang sama !!</span>");
                $('input[type="submit"]').addClass("disabled");
              }else{
                $('.check-nik').css("border-color","green");
                $('.check-nik-output').html("<span class='labil labil-success'>Nik Tersedia !</span>");
                $('input[type="submit"]').removeClass("disabled");
              }
            }
          });
        }
      });
  </script>

<!-- hapus foto dev-->
  <script type="text/javascript">


       $('body').on("click",".hapus-logo",function(){
        var id = $(this).attr('id');
        var data = "id="+id;
        if(confirm("Apakah anda yakin ingin menghapus logo surat ini ?")){
          $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>" + "admin/hapus_logo_surat",
            data: data,
            success: function() {                                                       
              location.reload();
            }
          });
        }
      });
  </script>
  <!-- end hapus foto dev -->
<!-- akhir modal hapus -->

<!-- manggil ckeditor -->
<script type="text/javascript">
     CKEDITOR.replace('editor1',
    {
         height: 600
    });
</script>

<script>
     CKEDITOR.replace( 'editor2',
    {
       customConfig : '<?php echo base_url()?>/assets_f/js/custom_ck.js',
        uiColor : '#9AB8F3'
    });

  
</script>
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

$(function () {
    $('.select-nik').selectpicker();
});
</script>


<!-- update notif -->
<?php if($this->session->userdata('level') == "rakyat"){?>
<script>
  $("#update_notif").click(function(){
    // var idx= <?php echo $this->session->userdata('penduduk_id')?>;
  $.ajax
    ({ 
        url: '<?php echo base_url().'user/update_notif/'.$this->session->userdata('penduduk_id') ?>',
        
        type: 'post',
        success: function(result)
        {
          console.log("berhasil");  
        }
    });
});

</script>
<script>
  $('select').selectpicker();
</script>


<?php }else{}?>

</body>
</html>
