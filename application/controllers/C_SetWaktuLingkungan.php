<?php
class C_SetWaktuLingkungan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
		$this->load->library('form_validation');
    	$this->load->helper('url');
	}

	function index(){
		$data['title'] = 'Atur Waktu Pemilihan';

		$config = array(
		   array(
		     'field' => 'waktu',
		     'label' => 'Waktu',
		     'rules' => 'required',
		     'errors' => array(
                        'required' => 'Hari Tidak Boleh Kosong',             
			 ),
		   ),

		);
    	$this->form_validation->set_rules($config);


		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('v_set_waktu_lingkungan', $data);
			$this->load->view('templates/footer', $data);
		}else{

		}
		
	}

}