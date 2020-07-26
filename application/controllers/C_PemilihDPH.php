<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PemilihDPH extends CI_Controller {
	 public function __construct()
   {
      parent::__construct();
      if($this->session->userdata('masuk') != TRUE){
        $url=base_url();
        redirect($url);
      }
      $this->load->model('m_pemilih');
      $this->load->model('m_suara');
      $this->load->helper('url');
   }

	public function index()
	{

      $data['title'] = 'Pemilih DPH';
      $data['ket1'] = 'Silahkan Masukan NIK atau Nama Pemilih';


      $data['jumlah_pemilih_dph'] = $this->m_pemilih->hitungAllPemilihDph();
      $data['jumlah_pemilih_dph'] = $data['jumlah_pemilih_dph']['jumlah'];

      if($this->input->post('keyword') == ''){
        $data['ket2'] = 'Silahkan Masukan NIK atau Nama Terlebih Dahulu!';
        $data['pemilih'] = '';
      }else{
        $data['ket2'] = '';
        $keyword = $this->input->post('keyword');
        $data['ket1'] = 'Keyword : '.$keyword;
        $data['pemilih'] = $this->m_pemilih->cariPemilihDph($keyword);
        $data['hasil_pencarian'] = $this->m_pemilih->hitungCariPemilihDph($keyword);
      }

      $this->load->view('templates/header', $data);
      $this->load->view('v_pemilih_dph', $data);
      $this->load->view('templates/footer', $data);
	}
}