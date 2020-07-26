<?php
class C_RekapSuara extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
    	$this->load->model('m_rekap_suara');
    	$this->load->model('m_waktu_pemilihan');
	}

	function index(){
		$data['title'] = 'Rekap Suara';

		$data['dph'] = $this->m_rekap_suara->get_kandidat_dph();
		$data['ketua_lingkungan'] = $this->m_rekap_suara->get_kandidat_lingkungan();
		$data['ketua_wilayah'] = $this->m_rekap_suara->get_kandidat_wilayah();
		$data['koor_wilayah'] = $this->m_rekap_suara->get_kandidat_koor_wilayah();
		
		$data['status'] = $this->m_waktu_pemilihan->getStatus1();

	

		$this->load->view('templates/header', $data);
		$this->load->view('v_rekap_suara', $data);
		$this->load->view('templates/footer', $data);
	}

	public function print(){

		$data['dph'] = $this->m_rekap_suara->get_kandidat_dph();
		$data['ketua_lingkungan'] = $this->m_rekap_suara->get_kandidat_lingkungan();
		$data['ketua_wilayah'] = $this->m_rekap_suara->get_kandidat_wilayah();
		$data['koor_wilayah'] = $this->m_rekap_suara->get_kandidat_koor_wilayah();
		

		$this->load->view('v_print_rekap_suara', $data);

	}

}
