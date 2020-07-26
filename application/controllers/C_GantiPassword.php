<?php
class C_GantiPassword extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
        	$url=base_url();
        	redirect($url);
      	}
    	$this->load->model('m_admin');
    	$this->load->model('m_pemilih');
    	$this->load->helper('url');
		$this->load->library('form_validation');
	}

	function index(){
		$data['title'] = 'Ganti Password '.$this->session->userdata('akses');
		$nama = $this->session->userdata('nama');
		$id = $this->session->userdata('id');
		$wilayah = $this->session->userdata('wilayah');
		$lingkungan = $this->session->userdata('lingkungan');


		$cek_pemilih = $this->m_pemilih->get_data_pemilih1($nama, $lingkungan, $wilayah);
		$cek_admin = $this->m_admin->get_data_admin($id);

		if ($cek_admin->num_rows()!= 0){
			$role = 'admin';
			$data['user'] = $cek_admin->row_array();
		} else{
			$data['user'] = $cek_pemilih->row_array();
			$role = 'pemilih';
		}
		$config = array(
		   array(
		     'field' => 'pass_lama',
		     'label' => 'Password Lama',
		     'rules' => 'required',
		     'errors' => array(
                        'required' => 'Password Lama Tidak Boleh Kosong',               
					),
		   ),

		   array(
		     'field' => 'pass_baru',
		     'label' => 'Pass Baru',
			 'rules' => 'required|min_length[6]',
			 'errors' => array(
				'required' => 'Password Baru Harus Diisi!',
				'min_length'=> 'Password Minimal 6 Karakter',
				),
		   ),

		   array(
		     'field' => 'conf_password',
		     'label' => 'Conf Password',
			 'rules' => 'required|matches[pass_baru]',
			 'errors' => array(
				'required' => 'Konfirmasi Password !',
				'matches'=> 'Password yang Dimasukan berbeda',
				),
		   ),

		  );
    	$this->form_validation->set_rules($config);


    	if( $this->form_validation->run() == FALSE){
    		if($role == 'admin'){
				$this->load->view('templates/header', $data);
				$this->load->view('v_ganti_password');
				$this->load->view('templates/footer');
			}else{
				$this->load->view('templates/header_pemilih', $data);
				$this->load->view('v_ganti_password');
				$this->load->view('templates/footer_pemilih');
			}
		} else{//jalankan fungsi
			if($role == 'admin'){
				$pass_lama = md5($this->input->post('pass_lama'));
				$pass_baru = md5($this->input->post('pass_baru'));
			}else{
				$pass_lama = $this->input->post('pass_lama');
				$pass_baru = $this->input->post('pass_baru');
			}
			
			if($pass_lama != $data['user']['password']){
				$this->session->set_flashdata('flash', 'Password Lama Salah!');
				redirect('C_GantiPassword');
			}else{
				if($pass_lama == $pass_baru){
					$this->session->set_flashdata('flash', 'Password Baru Tidak Boleh Sama Dengan Password Lama!');
					redirect('C_GantiPassword');
				}else{
					//pass sudah ok
					$password = $pass_baru;
					if ($role == 'admin'){
						$this->m_admin->set_password($id, $password);
						$this->session->set_flashdata('flash', 'Diganti');
						redirect('C_DashboardAdmin');
					}else{
						$this->m_pemilih->set_password($nama, $lingkungan, $wilayah, $password);
						$this->session->set_flashdata('flash', 'Diganti');
						redirect('C_DashboardPemilih');
					}
				}
			}
		}
	}


}
