<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_UsulanDph extends CI_Controller {
	public function __construct(){
    	parent::__construct();
    	if($this->session->userdata('masuk') != TRUE){
	        $url=base_url();
	        redirect($url);
	    }
    	$this->load->helper('url');
    	$this->load->model('m_suara');
		$this->load->library('form_validation');
    	$this->load->model('m_lingkungan');
    	$this->load->model('m_usulan_dph');
    	$this->load->model('m_pemilih');
   }

	public function index(){

		$data['title'] = 'Usulan DPH';
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['dph'] = $this->m_suara->dph();
    	$config = array(
		   array(
		     'field' => 'nik',
		     'label' => 'NIK',
		     'rules' => 'required',
		     'errors' => array(
                        'required' => 'NIK Tidak Boleh Kosong',                
					),
		   ),

		   array(
		     'field' => 'jabatan',
		     'label' => 'Jabatan',
			 'rules' => 'required',
			 'errors' => array(
				'required' => 'Jabatan Tidak Boleh Kosong !',
				),
		   ),

		  );
    	$this->form_validation->set_rules($config);


		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('v_usulan_dph', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi
			$nama = $this->input->post('nama', true);
			$wilayah = $this->input->post('kode_wilayah', true);
			$lingkungan = $this->input->post('kode_lingkungan', true);
			$jabatan = $this->input->post('jabatan', true);

			//untuk menentukan lokasi file foto
			$lokasi = './foto/dph';

        	$foto = $_FILES['foto'];
        	$nama_foto = str_replace(' ', '_', $nama);
        	$nama_foto = $jabatan.'_usulan_'.$nama_foto;
        	if (!empty($_FILES['foto']['name'])) {
	            $config['upload_path'] = $lokasi;
	            $config['allowed_types'] = 'jpeg|jpg|png';
	            $config['file_name'] = $nama_foto;
	            $config['overwrite']     = true;
	            $config['max_size']      = 1024;

	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('foto')) {
	                $this->session->set_flashdata('gagal_upload_foto', 'Tidak Sesuai Format');
	                redirect('C_UsulanDph');
	            } else {
	                //unlink($lokasi."/$row->foto");
	                $foto = $this->upload->data("file_name");
	            }
	        }else{
	        	$this->session->set_flashdata('no_foto', 'Harap Masukan Foto!');
	            redirect('C_UsulanDph');
	        }

	        // untuk pembentukan id setiap kandidat
	        $id_1 = $jabatan.$lingkungan; // setelah ini mencari id terakir/nomer urut paling tinggi dari kandidat dengan id $jabatan+$lingkungan
	        $data['rows'] = $this->m_usulan_dph->get_row_kandidat($id_1);
	        $total_rows = $data['rows']['jumlah'];
	        if ($total_rows == 0){
	        	$id_final = $id_1.'1';
	        }
	        if($total_rows > 0) {
	        	$data['last_id'] = $this->m_usulan_dph->get_last_id($id_1);
	        	$id_2 = $data['last_id']['id']; // ini menghasilkan id dengan nomor urut terbesar pada database
	        // mendapatkan nilai integer dari id terakhir
	       	 	$id_3 = substr($id_2,6);
	        	$id_4 = (int)$id_3;
				$id_5 = $id_4 + 1;
				$id_6 = (string)$id_5;
				$id_final = $id_1.$id_6;
			}


			//pengecekan nama -> satu jenis kandidat tidak boleh ada nama yang sama
			$data['nama_sama'] = $this->m_usulan_dph->cek_nama($nama, $jabatan);
			$data['kandidat'] = $this->m_usulan_dph->get_kandidat($jabatan);
			if ($data['nama_sama']['jumlah'] > 0){
				$this->session->set_flashdata('nama_sama', 'Sudah Ada di Kandidat '.$data['kandidat']['kandidat_dph']);
	            redirect('C_UsulanDph');
			}
	        //pengisian data
			$data = array(
			 	'id' => $id_final,
	     		'nama' => $nama,
	     		'lingkungan' => $lingkungan,
	     		'wilayah' => $wilayah,
	     		'kandidat' => $jabatan,
	     		'foto' => $foto,
	     		'suara' => 0,
	     		'status' => 'usulan',
	   		);
        	$this->m_usulan_dph->insert($data);
        	$this->session->set_flashdata('kandidat_dph', 'berhasil');
        	redirect('C_DashboardAdmin');
		}
		
	}

	public function get_lingkungan(){
        $wilayah = $this->input->post('id');
        $data= $this->m_lingkungan->get_lingkungan1($wilayah);
        echo json_encode($data);
    }

    public function get_data_usulan(){
    	$nik = $this->input->post('nik');
    	$data= $this->m_pemilih->getData($nik);
    	echo json_encode($data);
    }

    public function form_isian2(){//apabila nik belum/tidak terdaftar

		$data['title'] = 'Usulan DPH';
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['dph'] = $this->m_suara->dph();
    	$config = array(
		   array(
		     'field' => 'nama',
		     'label' => 'Nama',
		     'rules' => 'required|min_length[3]|max_length[50]',
		     'errors' => array(
                        'required' => 'Nama Tidak Boleh Kosong',
						'min_length'=> 'Nama Minimal 3 Huruf',
						'max_length'=> 'Nama Maksimal 50 Huruf',                
					),
		   ),
		   array(
		     'field' => 'nik',
		     'label' => 'NIK',
		     'rules' => 'required',
		     'errors' => array(
                        'required' => 'NIK Tidak Boleh Kosong',                
					),
		   ),

		   array(
		     'field' => 'wilayah',
		     'label' => 'Wilayah',
			 'rules' => 'required',
			 'errors' => array(
				'required' => 'Wilayah Tidak Boleh Kosong',
				),
		   ),

		   array(
		     'field' => 'lingkungan',
		     'label' => 'Lingkungan',
			 'rules' => 'required',
			 'errors' => array(
				'required' => 'Lingkungan Tidak Boleh Kosong',
				),
		   ),

		   array(
		     'field' => 'jabatan',
		     'label' => 'Jabatan',
			 'rules' => 'required',
			 'errors' => array(
				'required' => 'Jabatan Tidak Boleh Kosong !',
				),
		   ),

		  );
    	$this->form_validation->set_rules($config);


		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('v_usulan_dph_2', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi
			$nama = $this->input->post('nama', true);
			$wilayah = $this->input->post('wilayah', true);
			$lingkungan = $this->input->post('lingkungan', true);
			$jabatan = $this->input->post('jabatan', true);

			//untuk menentukan lokasi file foto
			//untuk menentukan lokasi file foto
			if ($jabatan == 'C1'){
				$lokasi = './foto/dph/wakil_ketua';
			}
			elseif ($jabatan = 'C2') {
				$lokasi = './foto/dph/ketua_bidang_liturgi';
			}
			elseif ($jabatan = 'C3') {
				$lokasi = './foto/dph/ketua_bidang_pelayanan_masyarakat';
			}
			elseif ($jabatan = 'C4') {
				$lokasi = './foto/dph/ketua_bidang_paguyuban_dan_persaudaraan';
			}
			elseif ($jabatan = 'C5') {
				$lokasi = './foto/dph/ketua_bidang_penelitian_dan_pengembangan';
			}
			elseif ($jabatan = 'C6') {
				$lokasi = './foto/dph/ketua_bidang_rumah_tangga';
			}
			elseif ($jabatan = 'C71') {
				$lokasi = './foto/dph/ketua_bidang_sekretaris';
			}
			elseif ($jabatan = 'C72') {
				$lokasi = './foto/dph/ketua_bidang_sekretaris';
			}
			elseif ($jabatan = 'C73') {
				$lokasi = './foto/dph/ketua_bidang_sekretaris';
			}
			elseif ($jabatan = 'C81') {
				$lokasi = './foto/dph/ketua_bidang_bendahara';
			}
			elseif ($jabatan = 'C82') {
				$lokasi = './foto/dph/ketua_bidang_bendahara';
			}
			elseif ($jabatan = 'C83') {
				$lokasi = './foto/dph/ketua_bidang_bendahara';
			}
			elseif ($jabatan = 'C84') {
				$lokasi = './foto/dph/ketua_bidang_bendahara';
			}
			elseif ($jabatan = 'C85') {
				$lokasi = './foto/dph/ketua_bidang_bendahara';
			}
			elseif ($jabatan = 'C9') {
				$lokasi = './foto/dph/ketua_bidang_pewartaan';
			}

        	$foto = $_FILES['foto'];
        	$nama_foto = str_replace(' ', '_', $nama);
        	$nama_foto = $jabatan.'_usulan_'.$nama_foto;
        	if (!empty($_FILES['foto']['name'])) {
	            $config['upload_path'] = $lokasi;
	            $config['allowed_types'] = 'jpeg|jpg|png';
	            $config['file_name'] = $nama_foto;
	            $config['overwrite']     = true;
	            $config['max_size']      = 1024;

	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('foto')) {
	                $this->session->set_flashdata('gagal_upload_foto', 'Tidak Sesuai Format');
	                redirect('C_UsulanDph/form_isian2');
	            } else {
	                //unlink($lokasi."/$row->foto");
	                $foto = $this->upload->data("file_name");
	            }
	        }else{
	        	$this->session->set_flashdata('no_foto', 'Harap Masukan Foto!');
	            redirect('C_UsulanDph/form_isian2');
	        }

	        // untuk pembentukan id setiap kandidat
	        $id_1 = $jabatan.$lingkungan; // setelah ini mencari id terakir/nomer urut paling tinggi dari kandidat dengan id $jabatan+$lingkungan
	        $data['rows'] = $this->m_usulan_dph->get_row_kandidat($id_1);
	        $total_rows = $data['rows']['jumlah'];
	        if ($total_rows == 0){
	        	$id_final = $id_1.'1';
	        }
	        if($total_rows > 0) {
	        	$data['last_id'] = $this->m_usulan_dph->get_last_id($id_1);
	        	$id_2 = $data['last_id']['id']; // ini menghasilkan id dengan nomor urut terbesar pada database
	        // mendapatkan nilai integer dari id terakhir
	       	 	$id_3 = substr($id_2,6);
	        	$id_4 = (int)$id_3;
				$id_5 = $id_4 + 1;
				$id_6 = (string)$id_5;
				$id_final = $id_1.$id_6;
			}


			//pengecekan nama -> satu jenis kandidat tidak boleh ada nama yang sama
			$data['nama_sama'] = $this->m_usulan_dph->cek_nama($nama, $jabatan);
			$data['kandidat'] = $this->m_usulan_dph->get_kandidat($jabatan);
			if ($data['nama_sama']['jumlah'] > 0){
				$this->session->set_flashdata('nama_sama', 'Sudah Ada di Kandidat '.$data['kandidat']['kandidat_dph']);
	            redirect('C_UsulanDph/form_isian2');
			}
	        //pengisian data
			$data = array(
			 	'id' => $id_final,
	     		'nama' => $nama,
	     		'lingkungan' => $lingkungan,
	     		'wilayah' => $wilayah,
	     		'kandidat' => $jabatan,
	     		'foto' => $foto,
	     		'suara' => 0,
	     		'status' => 'usulan',
	   		);
        	$this->m_usulan_dph->insert($data);
        	$this->session->set_flashdata('kandidat_dph', 'berhasil');
        	redirect('C_DashboardAdmin');
		}
		
	}
}
