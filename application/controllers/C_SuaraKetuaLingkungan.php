<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SuaraKetuaLingkungan extends CI_Controller {
	public function __construct(){
    	parent::__construct();
    	if($this->session->userdata('masuk') != TRUE){
	        $url=base_url();
	        redirect($url);
	    }
    	$this->load->helper('url');
		$this->load->library('form_validation');
    	$this->load->model('m_lingkungan');
    	$this->load->model('m_suara_ketua_lingkungan');
        $this->load->model('m_waktu_pemilihan');
   }

	public function index(){
		$data['title'] = 'Perolehan Suara Ketua Lingkungan';
		$data['lingkungan'] = $this->m_suara_ketua_lingkungan->lingkungan();

		//mengambil status pemilihan ketua lingkungan
      	$data['status'] = $this->m_waktu_pemilihan->getStatus('B');
      	$data['status'] = $data['status']['status'];


		if (($this->session->userdata('lingkungan')) && !($this->input->post('lingkungan'))){

			$data['kode_lingkungan'] = $this->m_suara_ketua_lingkungan->get_kode_lingkungan($this->session->userdata('lingkungan'));

			$kode_lingkungan = $data['kode_lingkungan']['kode_lingkungan'];

			$data['kandidat_ketua_lingkungan'] = $this->m_suara_ketua_lingkungan->get_usulan($kode_lingkungan);

			$data['total'] = $this->m_suara_ketua_lingkungan->count_usulan($kode_lingkungan);

			$data['total'] = $data['total']['jumlah'];

			$data['suara'] = $this->m_suara_ketua_lingkungan->suara($kode_lingkungan);

			$data['ket7'] = 'lingkungan : '.$this->session->userdata('lingkungan');
			$this->session->set_userdata('ket7', $data['ket7']);
		}

		elseif($this->input->post('lingkungan')){
			$lingkungan = $this->input->post('lingkungan');

			$this->session->set_userdata('lingkungan', $lingkungan);

			//ini untuk tombol print
			$this->session->set_userdata('kode_lingkungan', $lingkungan);

			$data['kode_lingkungan'] = $this->m_suara_ketua_lingkungan->get_kode_lingkungan($this->session->userdata('lingkungan'));

			$kode_lingkungan = $data['kode_lingkungan']['kode_lingkungan'];

			$data['kandidat_ketua_lingkungan'] = $this->m_suara_ketua_lingkungan->get_usulan($kode_lingkungan);

			$data['total'] = $this->m_suara_ketua_lingkungan->count_usulan($kode_lingkungan);

			$data['total'] = $data['total']['jumlah'];

			$data['suara'] = $this->m_suara_ketua_lingkungan->suara($kode_lingkungan);

			$data['ket7'] = 'lingkungan : '.$this->session->userdata('lingkungan');
			$this->session->set_userdata('ket7', $data['ket7']);
		}
		else{
			$data['kandidat_ketua_lingkungan'] = NULL;
			$data['suara'] = null;
			$data['total'] = null;
			$data['ket7'] = 'Silahkan pilih lingkungan untuk ditampilkan';
			$this->session->set_userdata('ket7', $data['ket7']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_suara_ketua_lingkungan', $data);
		$this->load->view('templates/footer', $data);
	}


	public function print($lingkungan){

		$data['lingkungan'] = $lingkungan;

		$data['kode_lingkungan'] = $this->m_suara_ketua_lingkungan->get_kode_lingkungan($lingkungan);

		$kode_lingkungan = $data['kode_lingkungan']['kode_lingkungan'];

		$data['kandidat_ketua_lingkungan'] = $this->m_suara_ketua_lingkungan->get_usulan($kode_lingkungan);

		$data['total'] = $this->m_suara_ketua_lingkungan->count_usulan($kode_lingkungan);

		$data['total'] = $data['total']['jumlah'];

		$data['ket7'] = 'lingkungan '.$lingkungan;

		$this->load->view('v_rekap_suara_lingkungan', $data);
	}
}
