<?php
class C_PilihKoorWilayah extends CI_Controller{
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
		$data['title'] = 'Pemilihan koordinator Wilayah';
		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$data['tipe'] = 'koordinator Wilayah' ;

		
      	$data['status_pemilihan_koor_wilayah'] = $this->m_waktu_pemilihan->getStatus('D');
      	$data['status_pemilihan_koor_wilayah_1'] = $data['status_pemilihan_koor_wilayah']['status'];


		$data['pemilih'] = $this->m_pemilih->get_data_pemilih($nama, $kode_lingkungan, $kode_wilayah);
		$data['hs_koor_wilayah'] = $data['pemilih']['hs_koor_wilayah'];

		if($data['hs_koor_wilayah'] != 0){

			$data['kandidat'] = $this->m_kandidat_ketua_wilayah->get_kandidat6();
		}else{

			$data['kandidat'] = NULL;
			$selected_kandidat = $data['pemilih']['D']; //mengambil data id kandidat ketua wilayah yang dipilih user tsb
			$data['koor_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat5($selected_kandidat);
		}

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_koor_wilayah', $data);
		$this->load->view('templates/footer_pemilih', $data);
	}

	public function pilih($id_selected_kandidat){

		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$nik = $this->session->userdata('nik');

		$this->m_pemilih->set_D($nik, $nama, $kode_lingkungan, $kode_wilayah, $id_selected_kandidat);
		$this->m_kandidat_ketua_wilayah->set_suara($id_selected_kandidat);

		$this->session->set_flashdata('berhasil', 'berhasil');
	    redirect('C_PilihKoorWilayah');

	}

}
