<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function cache(){
		$nama="umam";
		$this->m_dah->simpan_cache($nama);
	}

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->helper('dah_helper');
		$this->load->library(array('session','form_validation','cart'));	
		$this->load->model('m_dah');
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'xlog');
		}
	}	

	public function index(){
		$this->load->database();			
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/v_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	function settings(){
		$this->load->database();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_settings');
		$this->load->view('admin/v_footer');
	}

	function settings_act(){
		$this->load->database();		
		$blog_name = $this->input->post('blog_name');
		$blog_description = $this->input->post('blog_description');	
		$blog_welcome = $this->input->post('blog_welcome');		

		$this->m_dah->update_data(array('option_name' => 'blog_name'),array('option_value' => $blog_name),'dah_options');
		$this->m_dah->update_data(array('option_name' => 'blog_description'),array('option_value' => $blog_description),'dah_options');
		$this->m_dah->update_data(array('option_name' => 'blog_welcome'),array('option_value' => $blog_welcome),'dah_options');

		$rand = rand();
		$config['upload_path'] = './dah_image/system/';
		$config['allowed_types'] = 'gif|jpg|png';				
		$config['file_name'] = $rand.'_'.$_FILES['blog_logo']['name'];				
		$this->load->library('upload', $config);

		if($_FILES['blog_logo']['name'] != ""){			
			if(!$this->upload->do_upload('blog_logo')){			
				$error = array('error' => $this->upload->display_errors());			
				$this->load->view('admin/v_header');
				$this->load->view('admin/v_settings',$error);
				$this->load->view('admin/v_footer');
			}else{
				$data = array('upload_data' => $this->upload->data());			
				$file_name = $data['upload_data']['file_name'];
				@chmod("./dah_image/system/" . $this->m_dah->get_option('blog_logo'), 0777);
				@unlink('./dah_image/system/' . $this->m_dah->get_option('blog_logo'));
				$this->m_dah->update_data(array('option_name' => 'blog_logo'),array('option_value' => $file_name),'dah_options');			
				redirect('admin/settings/?alert=setting-update');			
			}
		}else{			
			redirect('admin/settings/?alert=setting-update');			
		}		
	}

	// page

	
	
	// end menu

	

	function cek_username_ajax(){
		$this->load->database();
		$val = $this->input->post('val');		
		echo $this->m_dah->edit_data(array('user_login' => $val),'user')->num_rows();
	}

	function cek_email_ajax(){
		$this->load->database();
		$val = $this->input->post('valemail');		
		echo $this->m_dah->edit_data(array('user_email' => $val),'user')->num_rows();
	}

	function password_edit($id){
		$this->load->database();	
		if($id == ""){
			redirect(base_url());
		}else{			
			$where = array(
				'user_id' => $id
				);				
			$data['user'] = $this->m_dah->edit_data($where,'user')->result();			
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_users_edit',$data);
			$this->load->view('admin/v_footer');
		}
	}

	function password_update(){
		$this->load->database();	
	
		$id = $this->input->post('id');
		$this->form_validation->set_rules('user_login','Username','required');
		if($this->form_validation->run() == false){
			$where = array(
				'user_id' => $id
				);				
			$data['user'] = $this->m_dah->edit_data($where,'user')->result();			
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_users_edit',$data);
			$this->load->view('admin/v_footer');
		}else{			
			$password = $this->input->post('password');
			$where = array(
				'user_id' => $id
				);
			if($password != ""){
				$data = array(
					'user_login' => $this->input->post('user_login'),
					'user_pass' => md5($password)
					);				
			}else{
				$data = array(
					'user_login' => $this->input->post('user_login'),
					);		
			}			
			$this->m_dah->update_data($where,$data,'user');			
			redirect('admin/password_edit/'.$id.'/?alert=user-update');	
		}	
	}

	
	// start user
	function user(){

			$data['data']=$this->m_dah->edit_data($where,'user')->result();
			
			$this->load->view('admin/v_header');
			$this->load->view('admin/sistem/user_data',$data);
			$this->load->view('admin/v_footer');
	}

		function user_add(){

			$this->load->view('admin/v_header');
			$this->load->view('admin/sistem/user_add');
			$this->load->view('admin/v_footer');
	}
	function user_act(){
	 	$this->load->database();

		$this->form_validation->set_rules('nama','Data harus terisi','required');
		$this->form_validation->set_rules('username','Data harus terisi','required');
		$this->form_validation->set_rules('password','Data harus terisi','required');


		if($this->form_validation->run() != true){
			 redirect(base_url().'admin/user_add');
		}else{
		
			$data_pd=array(
				'user_name' => $this->input->post('nama'),
				'user_login' => $this->input->post('username'),
				'user_pass' => md5($this->input->post('password')),
				'user_status' =>1,

				'user_lvl' => $this->input->post('level'),

			);
			$this->m_dah->insert_data($data_pd,'user');
			$id_terakhir = $this->db->insert_id();

			redirect(base_url().'admin/user/?alert=add');

		}

 }


 	function user_view($id){
			$this->load->database();
			$where=array(
				'user_id' =>	$id
			);
			$data['data']=$this->m_dah->edit_data($where,'user')->result();
			
			$this->load->view('admin/v_header');
			$this->load->view('admin/sistem/user_view',$data);
			$this->load->view('admin/v_footer');

		}

		function user_edit($id){
			$this->load->database();
			$where=array(
				'user_id' =>	$id
			);
			$data['data']=$this->m_dah->edit_data($where,'user')->result();
			
			$this->load->view('admin/v_header');
			$this->load->view('admin/sistem/user_edit',$data);
			$this->load->view('admin/v_footer');

		}

        function user_update(){
			$this->load->database();
         		$this->form_validation->set_rules('nama','Data harus terisi','required');
                $this->form_validation->set_rules('username','Data harus terisi','required');
                $this->form_validation->set_rules('password','Data harus terisi','required');


			$id = $this->input->post('id');
			$where=array(
				'user_id' =>$id
			);

            $password=$this->input->post('password');

			if($this->form_validation->run() != true){
				redirect(base_url().'admin/user_add');
			}else{

                if($password != ""){
                    $data_pd=array(
                        'user_name' => $this->input->post('nama'),
                        'user_login' => $this->input->post('username'),
                        'user_pass' => md5($this->input->post('password')),
                        'user_lvl' => $this->input->post('level'),
                    );
				    $this->m_dah->update_data($where,$data_pd,'user');
                }else{
                     $data_pd=array(
                        'user_name' => $this->input->post('nama'),
                        'user_login' => $this->input->post('username'),
                        'user_lvl' => $this->input->post('level'),
                    );
				    $this->m_dah->update_data($where,$data_pd,'user');    
                }

				redirect(base_url().'admin/user/?alert=update');

			}
			
		}

         function user_delete($id){
			$this->load->database();
			if($id == ""){
				redirect('base_url()');
			}else{
				$where = array(
					'user_id' => $id
					);

				$this->m_dah->delete_data($where,'user');

				redirect('admin/user/?alert=post-delete');
			}
		}

	// end user

	
	function update_option(){
		$this->load->database();
		$option = $this->input->post('option');
		$value = $this->input->post('value');
		$where = array(
			'option_name' => $option
			);
		$data = array(
			'option_value' => $value
			);
		$this->m_dah->update_data($where,$data,'dah_options');
	}

	
	/*
|---------------------------------
|	Bagian tambah data agama
|----------------------------------
*/

	function agama(){
		$this->load->database();
		
		$data['agama']=$this->m_dah->get_data('agama')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/data_opsi/v_data_agama',$data);
		$this->load->view('admin/v_footer');
	}

	function agama_add(){
		$this->load->database();
		$this->form_validation->set_rules('agama','Agama','required');
		if($this->form_validation->run() != true){
			$data['agama'] = $this->m_dah->get_data('agama')->result();
			$this->load->view('admin/v_header');
			$this->load->view('admin/data_opsi/v_data_agama',$data);
			$this->load->view('admin/v_footer');
		}else{
			$agama = $this->input->post('agama');
			$data=array(
				'agama' => $agama
			);
			$this->m_dah->insert_data($data,'agama');
			redirect(base_url().'admin/agama?alert=add');
		}
	
	}

	function agama_edit($id){
		$this->load->database();

		if($id == ""){
			// redirect('admin/agama');
		}else{			
			$where = array(
				'id' => $id
				);	
			$data['edit'] = $this->m_dah->edit_data($where,'agama')->result();
			$data['agama']=$this->m_dah->get_data('agama')->result();

			$this->load->view('admin/v_header');
			$this->load->view('admin/data_opsi/v_edit_agama',$data);
			$this->load->view('admin/v_footer');
		}
		
	}
	function agama_update(){
		$this->load->database();
		$id = $this->input->post('id');
		$this->form_validation->set_rules('agama','agama','required');
		if($this->form_validation->run() != true){
			$where = array(
				'id' => $id
				);	
			$data['edit'] = $this->m_dah->edit_data($where,'agama')->result();
			$data['agama'] = $this->m_dah->get_data('agama')->result();
			$this->load->view('admin/v_header');
			$this->load->view('admin/data_opsi/v_edit_agama',$data);
			$this->load->view('admin/v_footer');
		}else{			
			$agama = $this->input->post('agama');
			$data = array(
				'agama' => $agama
				);
			
			$w = array(
				'id' => $id
				);
			$this->m_dah->update_data($w,$data,'agama');
			redirect(base_url().'admin/agama/?alert=update');
		}	
		
	}

	function agama_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/agama');
		}else{
			$wt = array(
				'id' => $id
				);
			$this->m_dah->delete_data($wt,'agama');
			
			redirect('admin/agama/?alert=delete');
		}
	}

/*
|---------------------------------
|	Bagian pegawai
|----------------------------------
*/
	function pegawai(){
		$this->load->database();
		
		$data['data']=$this->m_dah->get_data_desc('id','pegawai')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/sistem/pegawai_data',$data);
		$this->load->view('admin/v_footer');
	}

	 function pegawai_add(){
	 	$this->load->database();
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/sistem/pegawai_add');
		$this->load->view('admin/v_footer');
	 }


	function pegawai_act(){
	 	$this->load->database();

		$this->form_validation->set_rules('nama','Data harus terisi','required');
		$this->form_validation->set_rules('nip','Data harus terisi','required');
		
		$this->form_validation->set_rules('no_hp','Data harus terisi','required');
		$this->form_validation->set_rules('alamat','Data harus terisi','required');

		$this->form_validation->set_rules('jabatan','Data harus terisi','required');
		$this->form_validation->set_rules('status','Data harus terisi','required');
	
		

		if($this->form_validation->run() != true){
			 redirect(base_url().'admin/pegawai_add');
		}else{
		
			$data_pd=array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'tanggal' => date('Y-m-d'),
				'no_hp' => $this->input->post('no_hp'),
				'jabatan' => $this->input->post('jabatan'),
				'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),

			);
			$this->m_dah->insert_data($data_pd,'pegawai');
			$id_terakhir = $this->db->insert_id();

			$config['upload_path'] = './upload/foto/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$lampiran = "lampiran";
			if($_FILES["lampiran"]["name"]){
				$rand1=rand(1000,9999);
				$config['file_name'] = $rand1.'_'.$_FILES['lampiran']['name'];				
				$this->load->library('upload', $config);
				$lampiran = $this->upload->do_upload('lampiran');
				if (!$lampiran){
					$error = array('error' => $this->upload->display_errors());
				}else{
					$lampiran = $this->upload->data("file_name");
					$data = array('upload_data' => $this->upload->data());
					$this->m_dah->update_data(array('id' => $id_terakhir),array('lampiran' => $lampiran),'pegawai');			
				}
			
			}
			redirect(base_url().'admin/pegawai/?alert=add');

		}

 }


 	function pegawai_view($id){
			$this->load->database();
			$where=array(
				'id' =>	$id
			);
			$data['data']=$this->m_dah->edit_data($where,'pegawai')->result();
			
			$this->load->view('admin/v_header');
			$this->load->view('admin/sistem/pegawai_view',$data);
			$this->load->view('admin/v_footer');

		}

		function pegawai_edit($id){
			$this->load->database();
			$where=array(
				'id' =>	$id
			);
			$data['data']=$this->m_dah->edit_data($where,'pegawai')->result();
			
			$this->load->view('admin/v_header');
			$this->load->view('admin/sistem/pegawai_edit',$data);
			$this->load->view('admin/v_footer');

		}

        function pegawai_update(){
			$this->load->database();
           	$this->form_validation->set_rules('nama','Data harus terisi','required');
            $this->form_validation->set_rules('nip','Data harus terisi','required');
            $this->form_validation->set_rules('no_hp','Data harus terisi','required');
		    $this->form_validation->set_rules('alamat','Data harus terisi','required');

            $this->form_validation->set_rules('jabatan','Data harus terisi','required');
            $this->form_validation->set_rules('status','Data harus terisi','required');
        
			$id = $this->input->post('id');
			$where=array(
				'id' =>$id
			);

			if($this->form_validation->run() != true){
				redirect(base_url().'admin/pegawai_add');
			}else{
			
				$data_pd=array(
          			'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'no_hp' => $this->input->post('no_hp'),
                    'alamat' => $this->input->post('alamat'),
                    'jabatan' => $this->input->post('jabatan'),
                    'status' => $this->input->post('status'),

				);
				$this->m_dah->update_data($where,$data_pd,'pegawai');

				$config['upload_path'] = './upload/foto/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf';
				$lampiran = "lampiran";
				if($_FILES["lampiran"]["name"]){
					$rand1=rand(1000,9999);
					$config['file_name'] = $rand1.'_'.$_FILES['lampiran']['name'];				
					$this->load->library('upload', $config);
					$lampiran = $this->upload->do_upload('lampiran');
					if (!$lampiran){
						$error = array('error' => $this->upload->display_errors());
					}else{
						$data_s = $this->m_dah->edit_data($where,'pegawai')->row();
						@chmod("./upload/foto/" . $data_s->lampiran, 0777);
						@unlink('./upload/foto/' . $data_s->lampiran);
						$lampiran = $this->upload->data("file_name");
						$data = array('upload_data' => $this->upload->data());
						$this->m_dah->update_data(array('id' => $id),array('lampiran' => $lampiran),'pegawai');			
					}
				
				}
				redirect(base_url().'admin/pegawai/?alert=update');

			}
			
		}

         function pegawai_delete($id){
			$this->load->database();
			if($id == ""){
				redirect('base_url()');
			}else{
				$where = array(
					'id' => $id
					);

				$data = $this->m_dah->edit_data($where,'pegawai')->row();
				// hapus di direktori upload/syarat

				@chmod("./upload/foto/" . $data->lampiran, 0777);
				@unlink('./upload/foto/' . $data->lampiran);

				// hapus di table 
			
				$this->m_dah->delete_data($where,'pegawai');

				redirect('admin/pegawai/?alert=post-delete');
			}
		}

	

/*
|---------------------------------
|	Bagian Buku sekolah
|----------------------------------
*/		

function buku_sekolah(){
	$this->load->database();
	
	$data['data']=$this->m_dah->get_data_desc_buku('buku','1','id')->result();
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/sekolah',$data);
	$this->load->view('admin/v_footer');
}

function sekolah_add(){
	$this->load->database();
   
   $this->load->view('admin/v_header');
   $this->load->view('admin/buku/sekolah_add');
   $this->load->view('admin/v_footer');
}

function sekolah_act(){
	$this->load->database();

   $this->form_validation->set_rules('judul','Data harus terisi','required');
   $this->form_validation->set_rules('penulis','Data harus terisi','required');
   $this->form_validation->set_rules('penerbit','Data harus terisi','required');
   $this->form_validation->set_rules('tahun_terbit','Data harus terisi','required');
   $this->form_validation->set_rules('jumlah','Data harus terisi','required');
   $this->form_validation->set_rules('lokasi','Data harus terisi','required');


   if($this->form_validation->run() != true){
		redirect(base_url().'admin/sekolah_add');
   }else{
   
	   $data_pd=array(
			'judul' => $this->input->post('judul'),

		   'jumlah' => $this->input->post('jumlah'),
		   'penulis' => $this->input->post('penulis'),
		   'penerbit' => $this->input->post('penerbit'),
		   'tahun_terbit' => $this->input->post('tahun_terbit'),
		   'jumlah' => $this->input->post('jumlah'),
		   'lokasi' => $this->input->post('lokasi'),
		   'jenis' => 1,
		   'tanggal' => date('Y-m-d'),
			'status' => 1,


	   );
	   $this->m_dah->insert_data($data_pd,'buku');
	   $id_terakhir = $this->db->insert_id();

	   redirect(base_url().'admin/buku_sekolah/?alert=add');

   }

}

function sekolah_edit($id){
	$this->load->database();
	$where=array(
		'id' =>	$id
	);
	$data['data']=$this->m_dah->edit_data($where,'buku')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/sekolah_edit',$data);
	$this->load->view('admin/v_footer');

}

function sekolah_update(){
	$this->load->database();

	$this->form_validation->set_rules('judul','Data harus terisi','required');
	$this->form_validation->set_rules('penulis','Data harus terisi','required');
	$this->form_validation->set_rules('penerbit','Data harus terisi','required');
	$this->form_validation->set_rules('tahun_terbit','Data harus terisi','required');
	$this->form_validation->set_rules('jumlah','Data harus terisi','required');
	$this->form_validation->set_rules('lokasi','Data harus terisi','required');
 

	$id = $this->input->post('id');
	$where=array(
		'id' =>$id
	);

	if($this->form_validation->run() != true){
		redirect(base_url().'admin/sekolah_add');
   }else{
   
	   $data_pd=array(
			'judul' => $this->input->post('judul'),

		   'jumlah' => $this->input->post('jumlah'),
		   'penulis' => $this->input->post('penulis'),
		   'penerbit' => $this->input->post('penerbit'),
		   'tahun_terbit' => $this->input->post('tahun_terbit'),
		   'jumlah' => $this->input->post('jumlah'),
		   'lokasi' => $this->input->post('lokasi'),

	   );
	   $this->m_dah->update_data($where,$data_pd,'buku');
	   redirect(base_url().'admin/buku_sekolah/?alert=update');

  	 }

	
}

function sekolah_view($id){
	$this->load->database();
	$where=array(
		'id' =>	$id
	);
	$data['data']=$this->m_dah->edit_data($where,'buku')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/sekolah_view',$data);
	$this->load->view('admin/v_footer');

}

function sekolah_delete($id){
	$this->load->database();
	if($id == ""){
		redirect('base_url()');
	}else{
		$where = array(
			'id' => $id
			);

		$this->m_dah->delete_data($where,'buku');

		redirect('admin/buku_sekolah/?alert=post-delete');
	}
}



/*
|---------------------------------
|	Bagian Buku cerita
|----------------------------------
*/		

function buku_cerita(){
	$this->load->database();
	$data['data']=$this->m_dah->get_data_desc_buku('buku','2','id')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/cerita',$data);
	$this->load->view('admin/v_footer');
}

function cerita_add(){
	$this->load->database();
   
   $this->load->view('admin/v_header');
   $this->load->view('admin/buku/cerita_add');
   $this->load->view('admin/v_footer');
}

function cerita_act(){
	$this->load->database();

   $this->form_validation->set_rules('judul','Data harus terisi','required');
   $this->form_validation->set_rules('penulis','Data harus terisi','required');
   $this->form_validation->set_rules('penerbit','Data harus terisi','required');
   $this->form_validation->set_rules('tahun_terbit','Data harus terisi','required');
   $this->form_validation->set_rules('jumlah','Data harus terisi','required');
   $this->form_validation->set_rules('lokasi','Data harus terisi','required');


   if($this->form_validation->run() != true){
		redirect(base_url().'admin/cerita_add');
   }else{
   
	   $data_pd=array(
		   'judul' => $this->input->post('judul'),
		   'jumlah' => $this->input->post('jumlah'),
		   'penulis' => $this->input->post('penulis'),
		   'penerbit' => $this->input->post('penerbit'),
		   'tahun_terbit' => $this->input->post('tahun_terbit'),
		   'jumlah' => $this->input->post('jumlah'),
		   'lokasi' => $this->input->post('lokasi'),
		   'jenis' => 2,
		   'tanggal' => date('Y-m-d'),
			'status' => 1,


	   );
	   $this->m_dah->insert_data($data_pd,'buku');
	   $id_terakhir = $this->db->insert_id();

	   redirect(base_url().'admin/buku_cerita/?alert=add');

   }

}

function cerita_edit($id){
	$this->load->database();
	$where=array(
		'id' =>	$id
	);
	$data['data']=$this->m_dah->edit_data($where,'buku')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/cerita_edit',$data);
	$this->load->view('admin/v_footer');

}

function cerita_update(){
	$this->load->database();

	$this->form_validation->set_rules('judul','Data harus terisi','required');
	$this->form_validation->set_rules('penulis','Data harus terisi','required');
	$this->form_validation->set_rules('penerbit','Data harus terisi','required');
	$this->form_validation->set_rules('tahun_terbit','Data harus terisi','required');
	$this->form_validation->set_rules('jumlah','Data harus terisi','required');
	$this->form_validation->set_rules('lokasi','Data harus terisi','required');
 

	$id = $this->input->post('id');
	$where=array(
		'id' =>$id
	);

	if($this->form_validation->run() != true){
		redirect(base_url().'admin/cerita_add');
   }else{
   
	   $data_pd=array(
			'judul' => $this->input->post('judul'),
		   'jumlah' => $this->input->post('jumlah'),
		   'penulis' => $this->input->post('penulis'),
		   'penerbit' => $this->input->post('penerbit'),
		   'tahun_terbit' => $this->input->post('tahun_terbit'),
		   'jumlah' => $this->input->post('jumlah'),
		   'lokasi' => $this->input->post('lokasi'),

	   );
	   $this->m_dah->update_data($where,$data_pd,'buku');
	   redirect(base_url().'admin/buku_cerita/?alert=update');

  	 }

	
}

function cerita_view($id){
	$this->load->database();
	$where=array(
		'id' =>	$id
	);
	$data['data']=$this->m_dah->edit_data($where,'buku')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/cerita_view',$data);
	$this->load->view('admin/v_footer');

}

function cerita_delete($id){
	$this->load->database();
	if($id == ""){
		redirect('base_url()');
	}else{
		$where = array(
			'id' => $id
			);

		$this->m_dah->delete_data($where,'buku');

		redirect('admin/buku_cerita/?alert=post-delete');
	}
}


/*
|---------------------------------
|	Bagian Anggota
|----------------------------------
*/		

function anggota(){
	$this->load->database();
	
	$data['data']=$this->m_dah->get_data_desc('id','anggota')->result();
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/anggota',$data);
	$this->load->view('admin/v_footer');
}

function anggota_add(){
	$this->load->database();
   
   $this->load->view('admin/v_header');
   $this->load->view('admin/buku/anggota_add');
   $this->load->view('admin/v_footer');
}

function anggota_act(){
	$this->load->database();

   $this->form_validation->set_rules('nama','Data harus terisi','required');
   $this->form_validation->set_rules('nis','Data harus terisi','required');
   $this->form_validation->set_rules('jenis_kelamin','Data harus terisi','required');
   $this->form_validation->set_rules('tanggal_lahir','Data harus terisi','required');
   $this->form_validation->set_rules('tempat_lahir','Data harus terisi','required');
   $this->form_validation->set_rules('tingkatan','Data harus terisi','required');
   $this->form_validation->set_rules('tahun_masuk','Data harus terisi','required');


   if($this->form_validation->run() != true){
		redirect(base_url().'admin/anggota_add');
   }else{
   
	   $data_pd=array(
		   'nama' => $this->input->post('nama'),
		   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		   'nis' => $this->input->post('nis'),
		   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		   'tempat_lahir' => $this->input->post('tempat_lahir'),
		   'tingkatan' => $this->input->post('tingkatan'),
		   'tahun_masuk' => $this->input->post('tahun_masuk'),
		   'tanggal' => date('Y-m-d'),
			'status' => 1,
	   );
	   $this->m_dah->insert_data($data_pd,'anggota');
	   $id_terakhir = $this->db->insert_id();

	   redirect(base_url().'admin/anggota/?alert=add');

   }

}

function anggota_edit($id){
	$this->load->database();
	$where=array(
		'id' =>	$id
	);
	$data['data']=$this->m_dah->edit_data($where,'anggota')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/anggota_edit',$data);
	$this->load->view('admin/v_footer');

}

function anggota_update(){
	$this->load->database();

    $this->form_validation->set_rules('nama','Data harus terisi','required');
   $this->form_validation->set_rules('nis','Data harus terisi','required');
   $this->form_validation->set_rules('jenis_kelamin','Data harus terisi','required');
   $this->form_validation->set_rules('tanggal_lahir','Data harus terisi','required');
   $this->form_validation->set_rules('tempat_lahir','Data harus terisi','required');
   $this->form_validation->set_rules('tingkatan','Data harus terisi','required');
   $this->form_validation->set_rules('tahun_masuk','Data harus terisi','required');


	$id = $this->input->post('id');
	$where=array(
		'id' =>$id
	);

	if($this->form_validation->run() != true){
		redirect(base_url().'admin/anggota_add');
   }else{
   
	   $data_pd=array(
            'nama' => $this->input->post('nama'),
		   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		   'nis' => $this->input->post('nis'),
		   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		   'tempat_lahir' => $this->input->post('tempat_lahir'),
		   'tingkatan' => $this->input->post('tingkatan'),
		   'tahun_masuk' => $this->input->post('tahun_masuk'),
		   'tingkatan' => $this->input->post('tingkatan'),
	   );
	   $this->m_dah->update_data($where,$data_pd,'anggota');
	   redirect(base_url().'admin/anggota/?alert=update');

  	 }

	
}

function anggota_view($id){
	$this->load->database();
	$where=array(
		'id' =>	$id
	);
	$data['data']=$this->m_dah->edit_data($where,'anggota')->result();
	
	$this->load->view('admin/v_header');
	$this->load->view('admin/buku/anggota_view',$data);
	$this->load->view('admin/v_footer');

}

function anggota_delete($id){
	$this->load->database();
	if($id == ""){
		redirect('base_url()');
	}else{
		$where = array(
			'id' => $id
			);

		$this->m_dah->delete_data($where,'anggota');

		redirect('admin/annggota/?alert=post-delete');
	}
}





/*
|---------------------------------
|	Bagian cetak 
|----------------------------------
*/

		function pegawai_cetak(){
			$this->load->database();
			$data['data']=$this->m_dah->get_year('pegawai','tanggal')->result();
			$this->load->view('admin/cetak/cetak_pegawai',$data);

		}

		function mitra_cetak(){
			$this->load->database();
			$data['data']=$this->m_dah->get_year('mitra','tanggal')->result();
			$this->load->view('admin/cetak/cetak_mitra',$data);

		}

		



/*
|---------------------------------
|	Bagian tambah data jabatan
|----------------------------------
*/
function jabatan(){
	$this->load->database();
	
	$data['jabatan']=$this->m_dah->get_data_desc('id','jabatan')->result();
	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_data_jabatan',$data);
	$this->load->view('admin/v_footer');
}

function jabatan_add(){
	$this->load->database();
	$this->form_validation->set_rules('jabatan','jabatan','required');
	if($this->form_validation->run() != true){
		$data['jabatan'] = $this->m_dah->get_data('jabatan')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/data_opsi/v_data_jabatan',$data);
		$this->load->view('admin/v_footer');
	}else{
		$jabatan = $this->input->post('jabatan');
		$data=array(
			'jabatan' => $jabatan
		);
		$this->m_dah->insert_data($data,'jabatan');
		redirect(base_url().'admin/jabatan?alert=add');
	}

}

function jabatan_edit($id){
	$this->load->database();

	if($id == ""){
		// redirect('admin/jabatan');
	}else{			
		$where = array(
			'id' => $id
			);	
		$data['edit'] = $this->m_dah->edit_data($where,'jabatan')->result();
		$data['jabatan']=$this->m_dah->get_data('jabatan')->result();

		$this->load->view('admin/v_header');
		$this->load->view('admin/data_opsi/v_edit_jabatan',$data);
		$this->load->view('admin/v_footer');
	}
	
}
function jabatan_update(){
	$this->load->database();
	$id = $this->input->post('id');
	$this->form_validation->set_rules('jabatan','jabatan','required');
	if($this->form_validation->run() != true){
		$where = array(
			'id' => $id
			);	
		$data['edit'] = $this->m_dah->edit_data($where,'jabatan')->result();
		$data['jabatan'] = $this->m_dah->get_data('jabatan')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/data_opsi/v_edit_jabatan',$data);
		$this->load->view('admin/v_footer');
	}else{			
		$jabatan = $this->input->post('jabatan');
		$data = array(
			'jabatan' => $jabatan
			);
		
		$w = array(
			'id' => $id
			);
		$this->m_dah->update_data($w,$data,'jabatan');
		redirect(base_url().'admin/jabatan/?alert=update');
	}	
	
}

function jabatan_delete($id){
	$this->load->database();
	if($id == ""){
		redirect('admin/jabatan');
	}else{
		$wt = array(
			'id' => $id
			);
		$this->m_dah->delete_data($wt,'jabatan');
		
		redirect('admin/jabatan/?alert=delete');
	}
}

/*
|---------------------------------
|	Bagian tambah data struktur Jabatan gampong
|----------------------------------
*/
function struktur_jabatan(){
	$this->load->database();
	$where=array(
		'jabatan_status' => 1
	);
	// $data['user']=$this->m_dah->get_data('user')->result();
	$data['penduduk']=$this->m_dah->get_data('penduduk')->result();
	$data['jabatan']=$this->m_dah->get_data('jabatan')->result();

	$data['pejabat']=$this->m_dah->edit_data($where,'user')->result();
	$this->load->view('admin/v_header');
	$this->load->view('admin/v_struktur_jab_data',$data);
	$this->load->view('admin/v_footer');
}

function struktur_jab_add(){
	$this->load->database();
	$this->form_validation->set_rules('id_penduduk','Nomor Penduduk','required');
	$this->form_validation->set_rules('jabatan','Jabatan','required');
	
	if($this->form_validation->run() != true){
		$where=array(
			'jabatan_status' => 1
		);
		$data['penduduk']=$this->m_dah->get_data('penduduk')->result();
		$data['jabatan']=$this->m_dah->get_data('jabatan')->result();
		$data['pejabat']=$this->m_dah->edit_data($where,'user')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_struktur_jab_data',$data);
		$this->load->view('admin/v_footer');
	}else{
		$jabatan = $this->input->post('jabatan');
		$w=array(
			'penduduk_id' => $this->input->post('id_penduduk')
		);
		

		if($jabatan == 1){
			$data=array(
			'jabatan' => $jabatan,
			'jabatan_status' => 1,
			'user_lvl' => 'lurah'
			);
			$this->m_dah->update_data($w,$data,'user');

		}elseif($jabatan == 2){
			$data=array(
			'jabatan' => $jabatan,
			'jabatan_status' => 1,
			'user_lvl' => 'admin'
			);
			$this->m_dah->update_data($w,$data,'user');

		}else{
			$data=array(
			'jabatan' => $jabatan,
			'jabatan_status' => 1
			);
			$this->m_dah->update_data($w,$data,'user');
		}

		redirect(base_url().'admin/struktur_jabatan?alert=add');
	}

}

function struktur_jab_delete($id){
	$this->load->database();
	if($id == ""){
		redirect('admin/struktur_jabatan');
	}else{
		$w=array(
			'penduduk_id' =>$id
		);
		$data=array(
			'jabatan' => 0,
			'jabatan_status' => 0,
			'user_lvl' => "rakyat"
		);
		$this->m_dah->update_data($w,$data,'user');
		redirect('admin/struktur_jabatan/?alert=delete');
	}
}
/*
|---------------------------------
|	Bagian tambah data penduduk
|----------------------------------
*/
	function cek_nik_ajax(){
		$this->load->database();
		$val = $this->input->post('val');		
		echo $this->m_dah->edit_data(array('nik' => $val),'penduduk')->num_rows();
	}

	function penduduk(){
		$this->load->database();

		$data['penduduk']=$this->m_dah->get_data('penduduk')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_data_penduduk',$data);
		$this->load->view('admin/v_footer');

	}

	
	function penduduk_add(){
		$this->load->database();
		$data['agama']=$this->m_dah->get_data('agama')->result();
		$data['pendidikan']=$this->m_dah->get_data('pendidikan')->result();
		$data['pekerjaan']=$this->m_dah->get_data('pekerjaan')->result();
		
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_penduduk_add',$data);
		$this->load->view('admin/v_footer');

	}


	function penduduk_act(){
		$this->load->database();

		$this->form_validation->set_rules('nik','Nomor Induk Kependudukan','required|is_unique[penduduk.nik]|max_length[16]|min_length[16]');
		$this->form_validation->set_rules('no_kk','Nomor Kartu Keluarga','required|max_length[16]|min_length[16]');
		$this->form_validation->set_rules('nama','Nama','required');
		
		if($this->form_validation->run() != true){
				$data['agama']=$this->m_dah->get_data('agama')->result();
				$data['pendidikan']=$this->m_dah->get_data('pendidikan')->result();
				$data['pekerjaan']=$this->m_dah->get_data('pekerjaan')->result();
				$this->load->view('admin/v_header');
				$this->load->view('admin/v_penduduk_add',$data);
				$this->load->view('admin/v_footer');
			// redirect(base_url().'admin/penduduk_add');
		}else{
		
			$data_pd=array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'nomor_kk' => $this->input->post('no_kk'),
				'tempat_lahir' => $this->input->post('tmpt_lhr'),
				'tgl_lahir' => $this->input->post('tgl_lhr'),
				'jenis_kelamin' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'status_warga_negara' => $this->input->post('warga_negara'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'gol_darah' => $this->input->post('gol_darah'),
				'no_hp' => $this->input->post('no_hp'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_nikah' => $this->input->post('status_nikah'),
				'status_hub_keluarga' => $this->input->post('status_hub_keluarga'),
				'alamat' => $this->input->post('alamat')

			);
			$this->m_dah->insert_data($data_pd,'penduduk');

			$id_terakhir = $this->db->insert_id();
			$data_user=array(
				'penduduk_id' => $id_terakhir,
				'user_login' => $this->input->post('nik'),
				'user_pass' => md5($this->input->post('nik')),
				'user_name' => $this->input->post('nama'),
				'user_status' => 1,
				'user_lvl' => "rakyat"
			);

			$this->m_dah->insert_data($data_user,'user');
			redirect(base_url().'admin/penduduk/?alert=add');

		}
	}
	function penduduk_view($id){
		$this->load->database();
		if($id == ""){
			redirect(base_url().'admin/penduduk');
		}else{
			$where=array(
				'id'=> $id
			);
			$data['penduduk'] = $this->m_dah->edit_data($where,'penduduk')->result();
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_penduduk_view',$data);
			$this->load->view('admin/v_footer');
		}
		
	}

	function penduduk_edit($id){
		$this->load->database();

		if($id == ""){
			redirect(base_url().'admin/penduduk');
		}else{
			$where=array(
				'id'=> $id
			);
			$data['agama']=$this->m_dah->get_data('agama')->result();
			$data['pendidikan']=$this->m_dah->get_data('pendidikan')->result();
			$data['pekerjaan']=$this->m_dah->get_data('pekerjaan')->result();
			$data['penduduk'] = $this->m_dah->edit_data($where,'penduduk')->result();
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_penduduk_edit',$data);
			$this->load->view('admin/v_footer');
		}
	}
	function penduduk_update(){
		$this->load->database();		

		$id = $this->input->post('id');
		
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nik','Nomor Induk Kependudukan','required|edit_unique[penduduk.nik.'.$id.']|max_length[16]|min_length[16]');
		$this->form_validation->set_rules('no_kk','Nomor Kartu Keluarga','required|max_length[16]|min_length[16]');
		if($this->form_validation->run() != true){
			$where = array(
				'id' => $id
				);				
				$data['agama']=$this->m_dah->get_data('agama')->result();
				$data['pendidikan']=$this->m_dah->get_data('pendidikan')->result();
				$data['pekerjaan']=$this->m_dah->get_data('pekerjaan')->result();
				$data['penduduk'] = $this->m_dah->edit_data($where,'penduduk')->result();

				$this->load->view('admin/v_header');
				$this->load->view('admin/v_penduduk_edit',$data);
				$this->load->view('admin/v_footer');
			// redirect(base_url().'admin/penduduk_add');
		}else{
			$where = array(
				'id' => $id
				);	

			$data=array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'nomor_kk' => $this->input->post('no_kk'),
				'tempat_lahir' => $this->input->post('tmpt_lhr'),
				'tgl_lahir' => $this->input->post('tgl_lhr'),
				'jenis_kelamin' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'status_warga_negara' => $this->input->post('warga_negara'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'gol_darah' => $this->input->post('gol_darah'),
				'no_hp' => $this->input->post('no_hp'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_nikah' => $this->input->post('status_nikah'),
				'status_hub_keluarga' => $this->input->post('status_hub_keluarga'),
				'alamat' => $this->input->post('alamat')

			);

			$where_user = array(
				'penduduk_id' => $id
				);
			$data_user=array(
				'user_name'=> $this->input->post('nama')
			);
			$this->m_dah->update_data($where_user,$data_user,'user');

			$this->m_dah->update_data($where,$data,'penduduk');
			redirect(base_url().'admin/penduduk/?alert=update');

		}
	}
	function penduduk_delete($id){
		$this->load->database();
		if($id == ""){
			redirect(base_url().'admin/penduduk');
		}else{
			$wt = array(
				'id' => $id
			);
			$wp = array(
				'penduduk_id' => $id
				);
			$this->m_dah->delete_data($wt,'penduduk');
			$this->m_dah->delete_data($wp,'user');
			
			redirect(base_url().'admin/penduduk/?alert=delete');
		}	
	}


	// end

/*
|----------------------------------------
|	Bagian ubah data penduduk dari rakyat
|----------------------------------------
*/	
	function data_pribadi($id){
		$this->load->database();
		
		if($id == ""){
			redirect(base_url());
		}else{
			$where = array(
				'id' => $this->session->userdata('penduduk_id')
			);				
				$data['agama']=$this->m_dah->get_data('agama')->result();
				$data['pendidikan']=$this->m_dah->get_data('pendidikan')->result();
				$data['pekerjaan']=$this->m_dah->get_data('pekerjaan')->result();
				$data['penduduk']=$this->m_dah->edit_data($where,'penduduk')->result();
			
			$this->load->view('admin/v_header');
			$this->load->view('user/v_data_pribadi',$data);
			$this->load->view('admin/v_footer');

		}
	}

	function data_pribadi_update(){
		$this->load->database();		

		$id = $this->input->post('id');
		$this->form_validation->set_rules('nik','Nomor Induk Kependudukan','required|edit_unique[penduduk.nik.'.$id.']|max_length[16]|min_length[16]');
		$this->form_validation->set_rules('no_kk','Nomor Kartu Keluarga','required|max_length[16]|min_length[16]');

		$this->form_validation->set_rules('nama','Nama','required');
		
		if($this->form_validation->run() != true){
			$where = array(
				'id' => $id
				);				
				$data['agama']=$this->m_dah->get_data('agama')->result();
				$data['pendidikan']=$this->m_dah->get_data('pendidikan')->result();
				$data['pekerjaan']=$this->m_dah->get_data('pekerjaan')->result();
				$data['penduduk']=$this->m_dah->edit_data($where,'penduduk')->result();
				
				$this->load->view('admin/v_header');
				$this->load->view('user/v_data_pribadi',$data);
				$this->load->view('admin/v_footer');
			// redirect(base_url().'admin/penduduk_add');
		}else{
			$where = array(
				'id' => $id
				);
			$where_user = array(
				'penduduk_id' => $id
				);		

			$data=array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'nomor_kk' => $this->input->post('no_kk'),
				'tempat_lahir' => $this->input->post('tmpt_lhr'),
				'tgl_lahir' => $this->input->post('tgl_lhr'),
				'jenis_kelamin' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'status_warga_negara' => $this->input->post('warga_negara'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'gol_darah' => $this->input->post('gol_darah'),
				'no_hp' => $this->input->post('no_hp'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_nikah' => $this->input->post('status_nikah'),
				'status_hub_keluarga' => $this->input->post('status_hub_keluarga'),
				'alamat' => $this->input->post('alamat')

			);

			$data_u=array('user_name' => $this->input->post('nama'));

			$this->m_dah->update_data($where_user,$data_u,'user');

			$this->m_dah->update_data($where,$data,'penduduk');

			redirect(base_url().'admin/data_pribadi/'.$id.'/?alert=update');

		}
	}

/*
|---------------------------------
|	Bagian Umum
|----------------------------------
*/
function umum(){
	$this->load->database();
	// $this->db->group_by('nomor_kk');
	// $data['total']= $this->db->count_all('penduduk');
	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_umum',$data);
	$this->load->view('admin/v_footer');

}

function umum_edit(){
	$this->load->database();

	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_umum_edit');
	$this->load->view('admin/v_footer');

}

function umum_update(){
	$this->load->database();
	$umum=$this->input->post('umum');
	$this->m_dah->update_data(array('option_name' => 'umum'),array('option_value' => $umum),'dah_options');

	redirect(base_url().'admin/umum/?alert=update');

}
/*
|---------------------------------
|	Bagian Organisasi
|----------------------------------
*/

function struktur_organisasi(){
	$this->load->database();

	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_struktur_organisasi');
	$this->load->view('admin/v_footer');

}

function struktur_edit(){
	$this->load->database();

	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_struktur_edit');
	$this->load->view('admin/v_footer');

}

function struktur_update(){
	$this->load->database();
	$struktur=$this->input->post('struktur');
	$this->m_dah->update_data(array('option_name' => 'struktur'),array('option_value' => $struktur),'dah_options');

	redirect(base_url().'admin/struktur_organisasi/?alert=update');

}


/*
|---------------------------------
|	Bagian Pengembang
|----------------------------------
*/

function developer(){
	$this->load->database();

	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_pengembang');
	$this->load->view('admin/v_footer');

}

function developer_edit(){
	$this->load->database();

	$this->load->view('admin/v_header');
	$this->load->view('admin/data_opsi/v_pengembang_edit');
	$this->load->view('admin/v_footer');

}

function developer_update(){
	$this->load->database();
	$developer=$this->input->post('developer');
	

		$config['upload_path'] = './upload/foto/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$foto = "foto_dev";
		if($_FILES["foto_dev"]["name"]){
			$rand1=rand(1000,9999);
			$config['file_name'] = $rand1.'_'.$_FILES['foto_dev']['name'];				
			$this->load->library('upload', $config);
			$foto_dev = $this->upload->do_upload('foto_dev');
			if (!$foto_dev){
				$error = array('error' => $this->upload->display_errors());
			}else{
				$foto_dev = $this->upload->data("file_name");
				$data = array('upload_data' => $this->upload->data());
				$this->m_dah->update_data(array('option_name' => 'foto_dev'),array('option_value' => $foto_dev),'dah_options');			
			}
		
		}

	$this->m_dah->update_data(array('option_name' => 'pengembang'),array('option_value' => $developer),'dah_options');

	redirect(base_url().'admin/developer/?alert=update');

}

function hapus_foto_dev(){
	$this->load->database();
		$id = $this->input->post('id');
		$where = array(
			'option_id' => $id
			);
		$data = $this->m_dah->edit_data($where,'dah_options')->row();
		@chmod("./upload/foto/" . $data->option_value, 0777);
		@unlink('./upload/foto/' . $data->option_value);

		$update = array(
			'option_value' => ""
			);
		$this->m_dah->update_data($where,$update,'dah_options');
}




/*
|---------------------------------
|	Bagian Surat Admin
|----------------------------------
*/

/*
|---------------------------------
|	Bagian Surat rakyat
|----------------------------------
*/


/*--------------------------
| Bagian untuk Preview file bisa pdf dan gambar
----------------------------*/
 function viewfile(){
        $file='upload/syarat/pdfaja.pdf';

        header('Content-Type: application/pdf');
        readfile($file);
	}
	
function viewfile_pdf($id){
	$this->load->database();

    $file='upload/foto/'.$id.'.pdf';
 
    header('Content-Type: application/pdf');
    readfile($file);
}
	

    
}