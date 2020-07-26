<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SuaraDph extends CI_Controller {
	public function __construct(){
    	parent::__construct();
    	if($this->session->userdata('masuk') != TRUE){
	        $url=base_url();
	        redirect($url);
	    }
    	$this->load->helper('url');
		$this->load->library('form_validation');
    	$this->load->model('m_lingkungan');
    	$this->load->model('m_suara_dph');
        $this->load->model('m_waktu_pemilihan');
   }

	public function index(){
		$data['title'] = 'Perolehan Suara DPH';
		$data['jenis_kandidat'] = $this->m_suara_dph->dph();

		//mengambil status pemilihan dph
      	$data['status'] = $this->m_waktu_pemilihan->getStatus('C');
      	$data['status'] = $data['status']['status'];


      	//untuk pemilihan jenis kandidat
		if (($this->session->userdata('jenis_kandidat')) && !($this->input->post('jenis_kandidat'))){

			$data['kandidat_dph'] = $this->m_suara_dph->get_usulan($this->session->userdata('jenis_kandidat'));

			$data['nama_kandidat'] = $this->m_suara_dph->get_nama_kandidat($this->session->userdata('jenis_kandidat'));

			$data['total'] = $this->m_suara_dph->count_usulan($this->session->userdata('jenis_kandidat'));

			$data['total'] = $data['total']['jumlah'];

			$data['suara'] = $this->m_suara_dph->suara($this->session->userdata('jenis_kandidat'));

			$this->session->set_userdata('dph', $this->session->userdata('jenis_kandidat'));

			$kandidat = $data['nama_kandidat']['kandidat_dph'];

			$data['ket5'] = 'Jenis Kandidat : '.$kandidat;
			$this->session->set_userdata('ket5', $data['ket5']);
		}

		elseif($this->input->post('jenis_kandidat')){
			$jenis_kandidat = $this->input->post('jenis_kandidat');

			$this->session->set_userdata('dph', $jenis_kandidat); 

			$this->session->set_userdata('jenis_kandidat', $jenis_kandidat);

			$data['kandidat_dph'] = $this->m_suara_dph->get_usulan($jenis_kandidat);

			$data['nama_kandidat'] = $this->m_suara_dph->get_nama_kandidat($this->session->userdata('jenis_kandidat'));

			$data['total'] = $this->m_suara_dph->count_usulan($jenis_kandidat);

			$data['total'] = $data['total']['jumlah'];

			$data['suara'] = $this->m_suara_dph->suara($this->session->userdata('jenis_kandidat'));

			$kandidat = $data['nama_kandidat']['kandidat_dph'];

			$data['ket5'] = 'Jenis Kandidat : '.$kandidat;
			$this->session->set_userdata('ket5', $data['ket5']);
		}
		else{
			$data['kandidat_dph'] = NULL;
			$data['suara'] = null;
			$data['total'] = null;
			$data['ket5'] = 'Silahkan pilih jenis kandidat untuk ditampilkan';
			$this->session->set_userdata('ket5', $data['ket5']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_suara_dph', $data);
		$this->load->view('templates/footer', $data);
	}

	public function print($kode){


		$data['kandidat_dph'] = $this->m_suara_dph->get_usulan($kode);

		$data['nama_kandidat'] = $this->m_suara_dph->get_nama_kandidat($kode);

		$data['total'] = $this->m_suara_dph->count_usulan($kode);

		$data['total'] = $data['total']['jumlah'];

		$data['kandidat'] = $data['nama_kandidat']['kandidat_dph'];

		$data['ket5'] = $data['kandidat'] .' DPH';

		$this->load->view('v_rekap_suara_dph', $data);
	}
}
