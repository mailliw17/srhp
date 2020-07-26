<?php
class C_LandingPage extends CI_Controller{
	function __construct(){
		parent::__construct();
    	$this->load->model('m_pemilih');
	}

	function index(){
		$this->load->view('v_landing_page');

		// $data['pemilih'] = $this->m_pemilih->getAllPemilih();

		// foreach ($data['pemilih'] as $row){
		// 	$no_np = $row['no_NP'];
		// 	$nik = $row['nik'];
		// 	$wilayah = $row['wilayah'];
		// 	$lingkungan = $row['lingkungan'];
		// 	$nama = $row['nama'];

		// 	$cek = substr($nik,0,1);
		// 	if ($cek != '0' && $cek != '1' && $cek != '2' && $cek != '3' && $cek != '4' && $cek != '5' && $cek != '6' && $cek != '7' && $cek != '8' && $cek != '9' ){
		// 		$nik = substr($nik,1);
		// 		$this->m_pemilih->setNik($no_np, $wilayah, $lingkungan, $nama, $nik);
		// 	}

		// 	$data['pemilih1'] = $this->m_pemilih->getLin($no_np, $nik);
		// 	$lingkungan = $data['pemilih1']['lingkungan'];

		// 	$data['kode_lw'] = $this->m_pemilih->getKodeLW($lingkungan);
		// 	$kode_lingkungan = $data['kode_lw']['kode_lingkungan'];
		// 	$kode_wilayah = $data['kode_lw']['kode_wilayah'];

		// 	$this->m_pemilih->isiData($no_np, $nik, $kode_lingkungan, $kode_wilayah);
		// }

	}

}
