<?php
class C_DashboardPemilih extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
      	$this->load->model('m_waktu_pemilihan');
      	$this->load->model('m_suara_ketua_lingkungan');
      	$this->load->model('m_suara_ketua_wilayah');
      	$this->load->model('m_suara_dph');
	}

	function index(){
		$data['title'] = 'Tata Cara Pemilihan';
		$data['status_pemilihan_lingkungan'] = $this->m_waktu_pemilihan->getStatus('B');
        $data['status_pemilihan_lingkungan_1'] = $data['status_pemilihan_lingkungan']['status'];
        $data['status_pemilihan_wilayah'] = $this->m_waktu_pemilihan->getStatus('A');
        $data['status_pemilihan_wilayah_1'] = $data['status_pemilihan_wilayah']['status'];
        $data['status_pemilihan_dph'] = $this->m_waktu_pemilihan->getStatus('C');
        $data['status_pemilihan_dph_1'] = $data['status_pemilihan_dph']['status'];
        $data['status_pemilihan_koor_wilayah'] = $this->m_waktu_pemilihan->getStatus('D');
        $data['status_pemilihan_koor_wilayah_1'] = $data['status_pemilihan_koor_wilayah']['status'];


		$this->session->set_userdata('status_lingkungan', $data['status_pemilihan_lingkungan_1']);
		$this->session->set_userdata('status_wilayah', $data['status_pemilihan_wilayah_1']);
		$this->session->set_userdata('status_dph', $data['status_pemilihan_dph_1']);
		$this->session->set_userdata('status_koor', $data['status_pemilihan_koor_wilayah_1']);

        
		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_cara_pemilihan');
		$this->load->view('templates/footer_pemilih');
	}

	function lingkungan($kode_lingkungan){
		$data['title'] = 'Perolehan Suara Ketua Lingkungan';

		$data['nama_lingkungan'] = $this->m_suara_ketua_lingkungan->get_nama_lingkungan($kode_lingkungan);

		$data['nama_lingkungan'] = $data['nama_lingkungan']['nama_lingkungan'];

		$data['kandidat_ketua_lingkungan'] = $this->m_suara_ketua_lingkungan->get_usulan($kode_lingkungan);

		$data['total'] = $this->m_suara_ketua_lingkungan->count_usulan($kode_lingkungan);

		$data['total'] = $data['total']['jumlah'];

		$data['suara'] = $this->m_suara_ketua_lingkungan->suara($kode_lingkungan);

		$data['ket7'] = 'lingkungan : '.$data['nama_lingkungan'];
		$this->session->set_userdata('ket7', $data['ket7']);

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_suara_ketua_lingkungan', $data);
		$this->load->view('templates/footer_pemilih', $data);
	}

	function wilayah($kode_wilayah){
		$data['title'] = 'Perolehan Suara Ketua Wilayah';

		$data['kandidat_ketua_wilayah'] = $this->m_suara_ketua_wilayah->get_usulan($kode_wilayah);

		$data['nama_wilayah'] = $this->m_suara_ketua_wilayah->get_nama_wilayah($kode_wilayah);

		$data['total'] = $this->m_suara_ketua_wilayah->count_usulan($kode_wilayah);

		$data['total'] = $data['total']['jumlah'];

		$data['suara'] = $this->m_suara_ketua_wilayah->suara($kode_wilayah);

		$kandidat = $data['nama_wilayah']['nama_wilayah'];

		$data['ket6'] = $kandidat;
		$this->session->set_userdata('ket6', $data['ket6']);

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_suara_ketua_wilayah', $data);
		$this->load->view('templates/footer_pemilih', $data);
	}

	function DPH($kode_kandidat){
		$data['title'] = 'Perolehan Suara DPH';

		$data['kandidat_dph'] = $this->m_suara_dph->get_usulan($kode_kandidat);

		$data['nama_kandidat'] = $this->m_suara_dph->get_nama_kandidat($kode_kandidat);

		$data['total'] = $this->m_suara_dph->count_usulan($kode_kandidat);

		$data['total'] = $data['total']['jumlah'];

		$data['suara'] = $this->m_suara_dph->suara($kode_kandidat);

		$kandidat = $data['nama_kandidat']['kandidat_dph'];

		$data['kandidat_1'] = $kandidat;

		$data['ket5'] = 'DPH : '.$kandidat;
		$this->session->set_userdata('ket5', $data['ket5']);

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_suara_dph', $data);
		$this->load->view('templates/footer_pemilih', $data);

	}

}
