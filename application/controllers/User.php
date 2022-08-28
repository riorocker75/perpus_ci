<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->helper(array('url','dah_helper'));
		$this->load->model('m_dah');
		$this->load->library(array('user_agent','cart','form_validation','session'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
	}

	public function index(){
		$this->load->database();

	}

	function user_logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function user_profil(){
		$this->load->database();
		$id = $this->session->userdata('user_id');
		$w = array(
			'id' => $id
			);
		$data['profil'] = $this->m_dah->edit_data($w,'user')->result();
		$this->load->view('cms/header');
		$this->load->view('cms/user_profil',$data);
		$this->load->view('cms/footer');
	}

	function edit_profil(){
		if($this->session->userdata('user_status') != "login"){
			redirect(base_url());
		}
		$this->load->database();
		$id = $this->session->userdata('user_id');
		$w = array(
			'id' => $id
			);
		$data['profil'] = $this->m_dah->edit_data($w,'user')->result();
		$this->load->view('cms/header');
		$this->load->view('cms/user_edit_profil',$data);
		$this->load->view('cms/footer');
	}

	function user_edit_profil_act(){
		if($this->session->userdata('user_status') != "login"){
			redirect(base_url());
		}

		$this->load->database();
		$id = $this->session->userdata('user_id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kodepos = $this->input->post('kodepos');
		$telp = $this->input->post('telp');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email', 'Email','trim|required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('provinsi','provinsi','required');
		$this->form_validation->set_rules('kota','kota','required');
		$this->form_validation->set_rules('kecamatan','kecamatan','required');
		$this->form_validation->set_rules('kodepos','kodepos','required|is_numeric');
		$this->form_validation->set_rules('telp','telpon','required');

		if($this->form_validation->run()==false){
			$w = array(
				'id' => $id
				);
			$data['profil'] = $this->m_dah->edit_data($w,'user')->result();
			$this->load->view('cms/header');
			$this->load->view('cms/user_edit_profil',$data);
			$this->load->view('cms/footer');
		}else{
			$w = array(
				'id' => $id
				);
			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'provinsi' => $provinsi,
				'email' => $email,
				'telp' => $telp,
				'kota' => $kota,
				'kecamatan' => $kecamatan,
				'kodepos' => $kodepos
				);
			$this->m_dah->update_data($w,$data,'user');
			redirect(base_url().'user/?alert=update');
		}
	}


/*
-------------------------
Arsip surat
------------------------
*/

function arsip_surat(){
	$this->load->database();
	$id_penduduk=$this->session->userdata('penduduk_id');

	$data['surat_lain']=$this->m_dah->pilih_surat_lain_semua($id_penduduk,'surat_mohon')->result();

	
	$data['surat_lain_review']=$this->m_dah->pilih_surat_lain($id_penduduk,'review','surat_mohon')->result();
	$data['surat_lain_tolak']=$this->m_dah->pilih_surat_lain($id_penduduk,'ditolak','surat_mohon')->result();
	$data['surat_lain_terima']=$this->m_dah->pilih_surat_lain($id_penduduk,'diterima','surat_mohon')->result();
	
	$data['total_lain_terima']=$this->m_dah->pilih_surat_lain($id_penduduk,'diterima','surat_mohon')->num_rows();
	$data['total_lain_tolak']=$this->m_dah->pilih_surat_lain($id_penduduk,'ditolak','surat_mohon')->num_rows();
	$data['total_lain_review']=$this->m_dah->pilih_surat_lain($id_penduduk,'review','surat_mohon')->num_rows();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_arsip_user',$data);
	$this->load->view('admin/v_footer');	
}



/*
-------------------------
Pengajuan surat kk Baru
------------------------
*/
function mohon_kk_baru(){
	$this->load->database();
	$data['penduduk']=$this->m_dah->get_data('penduduk')->result();
	$id_user=$this->session->userdata('penduduk_id');
	
	$where_user=array(
		'id' => $id_user
	);
	$data['data_diri']=$this->m_dah->edit_data($where_user,'penduduk')->result();

	$this->load->view('admin/v_header');
	$this->load->view('admin/sesi_surat/x_kk_baru',$data);
	$this->load->view('admin/v_footer');

}	





function tester(){

	$this->load->view('admin/v_header');
	$this->load->view('tester');

	$this->load->view('admin/v_footer');

}

function tes_jam(){
	$this->load->database();
	$tgl=$this->input->post('tgl');
	$jam=$this->input->post('jam');

	$hasil =$tgl." ".$jam;

	$data=array(
		'tgl'=> $hasil
	);

	$this->m_dah->insert_data($data,'tes_in');

	redirect(base_url().'user/tester');

}


// update_notif user

function update_notif($id){
	 $this->load->database();
	
	$where=array(
		'penduduk_id' => $id
	);
	$data=array(
		'notif' => 3
	);

	$this->m_dah->update_data($where,$data,'surat_mohon');
}


function mohon_surat($id){
 	$this->load->database();
 	$where = array(
	'id' => $id
	);
 	$data['penduduk']=$this->m_dah->get_data('penduduk')->result();
	
	$id_user=$this->session->userdata('penduduk_id');
	$where_user=array(
		'id' => $id_user
	);
	$data['data_diri']=$this->m_dah->edit_data($where_user,'penduduk')->result();

	
    $data['surat'] = $this->m_dah->edit_data($where,'jenis_surat')->result();

	$this->load->view('admin/v_header');
	$this->load->view('admin/mohon_surat/v_aju_surat',$data);
	$this->load->view('admin/v_footer');
}

// disini untuk mengajukan permohonan surat dari penduduk / rakyat

function mohon_surat_act(){
 	$this->load->database();
	$id_user=$this->session->userdata('penduduk_id');

	$rand = rand(1000,9999);
	
	$kode_surat=$this->input->post('kode_surat');
	$id_surat=$this->input->post('id_surat');

	$kode_mohon=$kode_surat."-".$rand;

	$w_sid=array(
		'id' => $id_surat
	);
	$jenis_sr=$this->m_dah->edit_data($w_sid,'jenis_surat')->result();
	foreach ($jenis_sr as $jsr) {}

	$data_sr= array(
		'penduduk_id' => $id_user,
		'surat_id' => $id_surat,
		'jenis_surat' => $kode_surat,
		'tgl_ajukan' => date('Y-m-d'),
		'surat_mohon_id' => $kode_mohon,
		'ket_surat' => "Pengajuan Pembuatan ".$jsr->nama_surat,
		'notif' => 1,
		'status_surat' => "review"
	);
	$this->m_dah->insert_data($data_sr,'surat_mohon');
	$id_terakhir = $this->db->insert_id();	

	$config['upload_path'] = './upload/syarat/';
	$config['allowed_types'] = 'jpg|png|jpeg|pdf';
	if($_FILES["upload"]["name"]){
		$rand1=rand(1000,9999);
		$config['file_name'] = $rand1.'_'.$_FILES['upload']['name'];				
		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload('upload');
		if (!$upload){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$upload = $this->upload->data("file_name");
			$data = array('upload_data' => $this->upload->data());
			$this->m_dah->update_data(array('id' => $id_terakhir),array('upload' => $upload),'surat_mohon');			
		}
	
	}

	redirect(base_url().'admin/sesi_surat/?alert=terkirim');

}

function lihat_surat_lain($id){
	$this->load->database();
	$id_user=$this->session->userdata('penduduk_id');
	$where=array(
		'surat_mohon_id' =>	$id
	);

	$data['surat']=$this->m_dah->edit_data($where,'surat_mohon')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/lihat/lh_surat_lain',$data);
	$this->load->view('admin/v_footer');
}

















}
