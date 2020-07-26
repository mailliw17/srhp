<?php
class C_Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
    	$this->load->helper('url');
        $this->load->model('m_waktu_pemilihan');
	}

	function index(){
		$this->load->view('v_login');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_admin=$this->m_login->auth_admin($username,$password);
        $cek_pemilih=$this->m_login->auth_pemilih($username,$password);
      //   if ( function_exists( 'date_default_timezone_set' ) ){
      //     	date_default_timezone_set('Asia/Jakarta');
      //   	$Daynow = date("j" );
      //   	$Monthnow = date("n" );
      //   	$Yearnow = date("Y" );
     	// }

        if($cek_admin->num_rows()!= 0){
			$data=$cek_admin->row_array();
    		$nama =$data['nama'];
    		$id=$data['id'];
			$this->session->set_userdata('masuk', TRUE);
			$this->session->set_userdata('akses', 'admin');
			$this->session->set_userdata('nama', $nama);
			$this->session->set_userdata('id', $id);

			redirect('C_DashboardAdmin');
    	}elseif ($cek_pemilih->num_rows() != 0) {
    		$data=$cek_pemilih->row_array();
    		$nik=$data['nik'];
    		$status = $data['status'];
    		if ($status != 'warga'){
    			$status = substr($data['status'], 0,1);
    		}


    		$nama =$data['nama'];
    		$id=$data['id'];
    		$lingkungan =$data['kode_lingkungan'];
    		$wilayah =$data['kode_wilayah'];
    		$hs_dph =$data['hs_dph'];
    		$hs_lingkungan =$data['hs_lingkungan'];
    		$hs_wilayah =$data['hs_wilayah'];
    		$tipe =$data['tipe'];
			$this->session->set_userdata('masuk', TRUE);
			$this->session->set_userdata('akses', 'pemilih');
			$this->session->set_userdata('nama', $nama);
			$this->session->set_userdata('nik', $nik);
			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('lingkungan', $lingkungan);
			$this->session->set_userdata('wilayah', $wilayah);
			$this->session->set_userdata('hs_dph', $hs_dph);
			$this->session->set_userdata('hs_wilayah', $hs_wilayah);
			$this->session->set_userdata('hs_lingkungan', $hs_lingkungan);
			$this->session->set_userdata('tipe', $tipe);
			$this->session->set_userdata('status', $status);
			redirect('C_DashboardPemilih');
    	}else{  // jika username dan password tidak ditemukan atau salah
			$this->session->set_flashdata('msg','Username Atau Password Salah');
			redirect('C_Login');
		}

	}

}
