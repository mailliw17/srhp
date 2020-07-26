<?php
class C_PilihKetuaWilayah extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
    	$this->load->model('m_kandidat_ketua_wilayah');
    	$this->load->model('m_wilayah');
    	$this->load->model('m_pemilih');
      $this->load->model('m_waktu_pemilihan');
	}

	function index(){
		$data['title'] = 'Pemilihan Ketua Wilayah';
		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$data['tipe'] = 'Ketua Wilayah' ;

		
      	$data['status_pemilihan_wilayah'] = $this->m_waktu_pemilihan->getStatus('A');
      	$data['status_pemilihan_wilayah_1'] = $data['status_pemilihan_wilayah']['status'];

		$data['nama_wilayah'] = $this->m_wilayah->get_nama_wilayah($kode_wilayah);
		$data['nama_wilayah'] = $data['nama_wilayah']['nama_wilayah'];

		$data['pemilih'] = $this->m_pemilih->get_data_pemilih($nama, $kode_lingkungan, $kode_wilayah);
		$data['hs_wilayah'] = $data['pemilih']['hs_wilayah'];

		if($data['hs_wilayah'] != 0){

			$data['kandidat'] = $this->m_kandidat_ketua_wilayah->get_kandidat4($kode_wilayah);
		}else{

			$data['kandidat'] = NULL;
			$selected_kandidat = $data['pemilih']['A']; //mengambil data id kandidat ketua wilayah yang dipilih user tsb
			$data['ketua_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat5($selected_kandidat);
		}

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_ketua_wilayah', $data);
		$this->load->view('templates/footer_pemilih', $data);
	}

	public function pilih($id_selected_kandidat){

		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$nik = $this->session->userdata('nik');

		$this->m_pemilih->set_A($nik, $nama, $kode_lingkungan, $kode_wilayah, $id_selected_kandidat);
		$this->m_kandidat_ketua_wilayah->set_suara($id_selected_kandidat);

		$this->session->set_flashdata('berhasil', 'berhasil');
	    redirect('C_PilihKetuaWilayah');

	}

}
