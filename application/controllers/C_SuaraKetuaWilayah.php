<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SuaraKetuaWilayah extends CI_Controller {
	public function __construct(){
    	parent::__construct();
    	if($this->session->userdata('masuk') != TRUE){
	        $url=base_url();
	        redirect($url);
	    }
    	$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('m_suara_ketua_wilayah');
        $this->load->model('m_waktu_pemilihan');
   }

	public function index(){
		$data['title'] = 'Perolehan Suara Ketua Wilayah';
		$data['wilayah'] = $this->m_suara_ketua_wilayah->wilayah();

		//mengambil status pemilihan ketua lingkungan dan koordinator wilayah
      	$data['status'] = $this->m_waktu_pemilihan->getStatus('B');
      	$data['status'] = $data['status']['status'];

      	$data['status1'] = $this->m_waktu_pemilihan->getStatus('D');
      	$data['status1'] = $data['status1']['status'];



		if (($this->session->userdata('wilayah')) && !($this->input->post('wilayah'))){

			$data['kandidat_ketua_wilayah'] = $this->m_suara_ketua_wilayah->get_usulan($this->session->userdata('wilayah'));

			$data['nama_wilayah'] = $this->m_suara_ketua_wilayah->get_nama_wilayah($this->session->userdata('wilayah'));

			$data['total'] = $this->m_suara_ketua_wilayah->count_usulan($this->session->userdata('wilayah'));

			$data['total'] = $data['total']['jumlah'];

			$data['suara'] = $this->m_suara_ketua_wilayah->suara($this->session->userdata('wilayah'));

			$kandidat = $data['nama_wilayah']['nama_wilayah'];

			$data['ket6'] = 'Wilayah : '.$kandidat;
			$this->session->set_userdata('ket6', $data['ket6']);
		}

		elseif($this->input->post('wilayah')){
			$wilayah = $this->input->post('wilayah');

			$this->session->set_userdata('wilayah', $wilayah);

			//ini untuk tombol print
			$this->session->set_userdata('kode_wilayah', $wilayah);

			$data['kandidat_ketua_wilayah'] = $this->m_suara_ketua_wilayah->get_usulan($wilayah);

			$data['nama_wilayah'] = $this->m_suara_ketua_wilayah->get_nama_wilayah($this->session->userdata('wilayah'));

			$data['total'] = $this->m_suara_ketua_wilayah->count_usulan($wilayah);

			$data['total'] = $data['total']['jumlah'];

			$data['suara'] = $this->m_suara_ketua_wilayah->suara($this->session->userdata('wilayah'));

			$kandidat = $data['nama_wilayah']['nama_wilayah'];

			$data['ket6'] = 'Wilayah : '.$kandidat;
			$this->session->set_userdata('ket6', $data['ket6']);
		}
		else{
			$data['kandidat_ketua_wilayah'] = NULL;
			$data['suara'] = null;
			$data['total'] = null;
			$data['ket6'] = 'Silahkan pilih wilayah untuk ditampilkan';
			$this->session->set_userdata('ket6', $data['ket6']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_suara_ketua_wilayah', $data);
		$this->load->view('templates/footer', $data);
	}

	public function print($wilayah){

		$data['kandidat_ketua_wilayah'] = $this->m_suara_ketua_wilayah->get_usulan($wilayah);

		$data['nama_wilayah'] = $this->m_suara_ketua_wilayah->get_nama_wilayah($wilayah);

		$data['total'] = $this->m_suara_ketua_wilayah->count_usulan($wilayah);

		$data['total'] = $data['total']['jumlah'];

		$data['nama_wilayah'] = $data['nama_wilayah']['nama_wilayah'];

		$data['ket6'] = $data['nama_wilayah'];

		$this->load->view('v_rekap_suara_wilayah', $data);
	}

	public function print1(){
		$data['koor_wilayah'] = $this->m_suara_ketua_wilayah->get_koor();

		$data['total'] = $this->m_suara_ketua_wilayah->count_koor();

		$data['total'] = $data['total']['jumlah'];

		$data['ket6'] = 'Koordinator Wilayah'; 

		$this->load->view('v_rekap_suara_koor_wilayah', $data);
	}
}
