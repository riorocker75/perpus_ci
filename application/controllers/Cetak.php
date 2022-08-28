<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {

    function __construct(){
        parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        
		$this->load->helper(array('url','dah_helper'));
		$this->load->model('m_dah');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
	}


         function cetak_surat_lain($id){
        $this->load->database();

        if($id === ""){
            redirect(base_url().'admin');
        }else{          
            $where = array(
                'surat_mohon_id' => $id
             ); 
            $data['surat'] = $this->m_dah->edit_data($where,'surat_mohon')->result();
            $this->load->view('admin/asurat_template/header_surat');
            $this->load->view('admin/asurat_template/sr_surat_lain',$data);
            $this->load->view('admin/asurat_template/footer_surat');
        }
    }



  function preview_cetak($id){
        $this->load->database();

        if($id === ""){
            redirect(base_url().'admin');
        }else{          
            $where = array(
                'id' => $id
             ); 
            $data['surat'] = $this->m_dah->edit_data($where,'jenis_surat')->result();
            $this->load->view('admin/asurat_template/preview_template',$data);
        }
    }







}   