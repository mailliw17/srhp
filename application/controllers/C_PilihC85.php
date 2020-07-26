<?php
class C_PilihC85 extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
    	$this->load->model('m_kandidat_dph');
    	$this->load->model('m_pemilih');
      $this->load->model('m_waktu_pemilihan');
	}

	function index(){
		$data['title'] = 'Pemilihan DPH';
		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$data['tipe'] = 'Bendahara 4' ;

		
      	$data['status_pemilihan_dph'] = $this->m_waktu_pemilihan->getStatus('C');
     	$data['status_pemilihan_dph_1'] = $data['status_pemilihan_dph']['status'];

		$data['pemilih'] = $this->m_pemilih->get_data_pemilih($nama, $kode_lingkungan, $kode_wilayah);
		$data['cek_hs_dph'] = $data['pemilih']['C85'];

		if($data['cek_hs_dph'] == NULL){
			$hs_dph = 1;
			$data['hs_dph'] = $hs_dph;
			$data['kandidat'] = $this->m_kandidat_dph->get_kandidat4('C85');
		}else{
			$hs_dph = 0;
			$data['hs_dph'] = $hs_dph;
			$data['kandidat'] = NULL;
			$selected_kandidat = $data['pemilih']['C85']; //mengambil data id kandidat ketua wilayah yang dipilih user tsb
			$data['C8'] = $this->m_kandidat_dph->get_kandidat5($selected_kandidat);
		}

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_C85', $data);
		$this->load->view('templates/footer_pemilih', $data);
	}

	public function pilih($id_selected_kandidat){

		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$nik = $this->session->userdata('nik');

		$this->m_pemilih->set_C85($nik, $nama, $kode_lingkungan, $kode_wilayah, $id_selected_kandidat);
		$this->m_kandidat_dph->set_suara($id_selected_kandidat);

		$this->session->set_flashdata('berhasil', 'berhasil');
	    redirect('C_PilihC85');

	}

}
