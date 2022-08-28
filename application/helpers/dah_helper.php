<?php 

function show_alert(){
	if(isset($_GET['alert'])){
		$alert = $_GET['alert'];
		if($alert == "add"){
			echo "<div class='alert alert-success alert-dah'>Data Berhasil Di Tambah. <span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "delete"){
			echo "<div class='text-center alert alert-success alert-dah'>Data Berhasil Di Hapus. <span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "update"){
			echo "<div class='text-center alert alert-success alert-dah'>Data Berhasil Di Update. <span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "login-failed"){
			echo "<div class='alert alert-danger alert-dah'>Username & Password Salah !</div>";
		}else if($alert == "setting-update"){
			echo "<div class='alert alert-success alert-dah'>Pengaturan Berhasil Di Ubah.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "page-saved"){
			echo "<div class='alert alert-success alert-dah'>Halaman Berhasil Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "page-delete"){
			echo "<div class='alert alert-success alert-dah'>Halaman Berhasil Di Hapus.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "post-saved"){
			echo "<div class='text-center alert alert-success alert-dah'>Post Berhasil Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "post-delete"){
			echo "<div class='text-center alert alert-success alert-dah'>Data Berhasil Di Hapus Permanen.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "post-trash"){
			echo "<div class='alert alert-success alert-dah'>Post Berhasil Di Pindahkan Ke Tong Sampah.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "menu-saved"){
			echo "<div class='alert alert-success alert-dah'>Menu Berhasil Di Simpan.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "menu-delete"){
			echo "<div class='alert alert-success alert-dah'>Menu Berhasil Di Hapus.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "widget-delete"){
			echo "<div class='alert alert-success alert-dah'>Widget Berhasil Di Hapus.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "user-add"){
			echo "<div class='text-center alert alert-success alert-dah'>User Berhasil Di Tambah.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "user-update"){
			echo "<div class='alert alert-success alert-dah'>Data User Berhasil Di Update.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "remove-cart"){
			echo "<div class='text-center alert alert-success alert-dah'>Produk berhasil di hapus dari keranjang.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "update-cart"){
			echo "<div class='text-center alert alert-success alert-dah'>Keranjang berhasil di update.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "order-sukses"){
			echo "<div class='text-center alert alert-success alert-dah'>Order berhasil ! Silahkan lakukan pembayaran.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "daftar-sukses"){
			echo "<div class='text-center alert alert-success alert-dah'>Pendaftaran berhasil! Silahkan login.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "slip-upload"){
			echo "<div class='text-center alert alert-success alert-dah'>Bukti pembayaran berhasil di upload. Silahkan tunggu konfirmasi.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "slip-error"){
			echo "<div class='text-center alert alert-warning alert-dah'>Bukti pembayaran gagal di upload.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}else if($alert == "login-gagal"){
			echo "<div class='text-center alert alert-danger alert-dah'>Login gagal !<br/>periksa username & password kamu.<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}	
		else if($alert == "terkirim"){
			echo "<div class='text-center alert alert-success alert-dah'>Permohonan Data Anda  Berhasil Diajukan Ke Sekretaris Desa, Mohon Bersabar Untuk Menunggu Status Datanya<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}	
			else if($alert == "tambah"){
			echo "<div class='text-center alert alert-success alert-dah'>Berhasil ditambahkan<span class='glyphicon glyphicon-remove pull-right btn-hide-alert'></span></div>";
		}	

	}
}







?>