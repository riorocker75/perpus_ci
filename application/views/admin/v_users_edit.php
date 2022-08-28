<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>
  <a href="<?php echo base_url()?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i></i> Kembali</a>
</div>
	<?php show_alert()?>
		<!-- Content Row -->
		<div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ubah username dan password</h6>
                    </div>
                    <div class="card-body">
					<?php foreach($user as $u){ ?>
						<form action="<?php echo base_url().'admin/password_update' ?>" method="post">
							<div class="form-group">
								<label class="control-label ">Username</label>
												
									<input type="hidden" name="id" value="<?php echo $u->user_id ?>">
									<input type="text" name="user_login" class="form-control check-username" value="<?php echo $u->user_login ?>">
									<span class="check-username-output"></span>
									<?php echo form_error('user_login', '<div class="form-error">', '</div>'); ?>
								
							</div>

							
							<div class="form-group">
								<label class="control-label">Password</label>
									<input type="password" name="password" class="form-control" >
									<?php echo form_error('password', '<div class="form-error">', '</div>'); ?>
								<span style="font-size:12px;">Kosongkan jika tidak ingin merubah password lama</span>
							</div>

							
						<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan </button>
						</form>
					<?php }?>
                    </div>
                </div>
		    </div>
		</div>
</div>


<script type="text/javascript">
		$(document).ready(function(){
			$("input[type='text']").attr("autocomplete","off");
			$('.check-username').keyup(function(){
				var val = $(this).val();
				if(val.length > 0){ 
					var data = "val="+val;
					$.ajax({
						type:"post",
						data:data,
						url:"<?php echo base_url().'admin/cek_username_ajax' ?>",
						success: function(html){					
							if(html > 0){						
								$('.check-username').css("border-color","red");
								$('.check-username-output').html("<span style='font-size:12px;color:red' class='label label-danger'>Username telah ada ganti yang lain!</span>");
								$('input[type="submit"]').addClass("disabled");
							}else{
								$('.check-username').css("border-color","green");
								$('.check-username-output').html("<span style='font-size:12px;color:green' class='label label-success'>Username Tersedia !</span>");
								$('input[type="submit"]').removeClass("disabled");
							}
						}
					});
				}
			});
		});

		$(document).ready(function(){
			$("input[type='text']").attr("autocomplete","off");
			$('.check-email').keyup(function(){
				var val = $(this).val();
				if(val.length > 0){ 
					var data = "valemail="+val;
					$.ajax({
						type:"post",
						data:data,
						url:"<?php echo base_url().'admin/cek_email_ajax' ?>",
						success: function(html){					
							if(html > 0){						
								$('.check-email').css("border-color","red");
								$('.check-email-output').html("<span style='font-size:12px;color:red' class='label label-danger'>email telah ada ganti yang lain!</span>");
								$('input[type="submit"]').addClass("disabled");
							}else{
								$('.check-email').css("border-color","green");
								$('.check-email-output').html("<span style='font-size:12px;color:green' class='label label-success'>email Tersedia !</span>");
								$('input[type="submit"]').removeClass("disabled");
							}
						}
					});
				}
			});
		});
	</script>