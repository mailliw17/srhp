<?php
class C_PilihKetuaLingkungan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
    	$this->load->model('m_kandidat_ketua_lingkungan');
    	$this->load->model('m_lingkungan');
    	$this->load->model('m_pemilih');
      $this->load->model('m_waktu_pemilihan');
	}

	function index(){
		$data['title'] = 'Pemilihan Ketua Lingkungan';
		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$data['tipe'] = 'Ketua Lingkungan' ;
 
		// $hari_selesai = 5;
		// $bulan_selesai = 7;
		// $tahun_selesai = 2020; /

		// $hari_skrg = (int)$this->session->userdata('Daynow');
		// $bulan_skrg = (int)$this->session->userdata('Monthnow');
		// $tahun_skrg = (int)$this->session->userdata('Yearnow');

		// if ($hari_skrg < $hari_selesai && $bulan_skrg >= $bulan_selesai && $tahun_skrg >= $tahun_selesai){
		// 	$data['status'] = 'selesai';
		// }else{
		// 	$data['status'] = 'berjalan';
		// }

		$data['status_pemilihan_lingkungan'] = $this->m_waktu_pemilihan->getStatus('B');
     	$data['status_pemilihan_lingkungan_1'] = $data['status_pemilihan_lingkungan']['status'];

		$data['nama_lingkungan'] = $this->m_lingkungan->get_nama_lingkungan($kode_lingkungan);
		$data['nama_lingkungan'] = $data['nama_lingkungan']['nama_lingkungan'];

		$data['pemilih'] = $this->m_pemilih->get_data_pemilih($nama, $kode_lingkungan, $kode_wilayah);
		$data['hs_lingkungan'] = $data['pemilih']['hs_lingkungan'];

		if($data['hs_lingkungan'] != 0){

			$data['kandidat'] = $this->m_kandidat_ketua_lingkungan->get_kandidat4($kode_lingkungan);
		}else{

			$data['kandidat'] = NULL;
			$selected_kandidat = $data['pemilih']['B']; //mengambil data id kandidat ketua wilayah yang dipilih user tsb
			$data['ketua_lingkungan'] = $this->m_kandidat_ketua_lingkungan->get_kandidat5($selected_kandidat);
		}

		$this->load->view('templates/header_pemilih', $data);
		$this->load->view('pemilih/v_ketua_lingkungan', $data);
		$this->load->view('templates/footer_pemilih', $data);
	}

	public function pilih($id_selected_kandidat){

		$nama = $this->session->userdata('nama');
		$kode_lingkungan = $this->session->userdata('lingkungan');
		$kode_wilayah = $this->session->userdata('wilayah');
		$nik = $this->session->userdata('nik');

		$this->m_pemilih->set_B($nik, $nama, $kode_lingkungan, $kode_wilayah, $id_selected_kandidat);
		$this->m_kandidat_ketua_lingkungan->set_suara($id_selected_kandidat);

		$this->session->set_flashdata('berhasil', 'berhasil');
	    redirect('C_PilihKetuaLingkungan');

	}

}
