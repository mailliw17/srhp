<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_UsulanKetuaWilayah extends CI_Controller {
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
    	$this->load->model('m_usulan_ketua_wilayah');
    	$this->load->model('m_pemilih');
   }

	public function index(){

		$data['title'] = 'Usulan Ketua Wilayah';
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$config = array(
		   array(
		     'field' => 'nik',
		     'label' => 'NIK',
		     'rules' => 'required',
		     'errors' => array(
                        'required' => 'NIK Tidak Boleh Kosong',              
			 ),
		   ),

		  );
    	$this->form_validation->set_rules($config);


		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('v_usulan_ketua_wilayah', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi
			$nama = $this->input->post('nama', true);
			$wilayah = $this->input->post('kode_wilayah', true);
			$lingkungan = $this->input->post('kode_lingkungan', true);

			//untuk menentukan lokasi file foto
			$lokasi = './foto/ketua_wilayah';

			//memberikan nama file berdasarkan wilayah
			$nama_foto = str_replace(' ', '_', $nama);
			$nama_foto = $wilayah.'_'.$nama_foto;

        	$foto = $_FILES['foto'];
        	if (!empty($_FILES['foto']['name'])) {
	            $config['upload_path'] = $lokasi;
	            $config['allowed_types'] = 'jpeg|jpg|png';
	            $config['file_name'] = $nama_foto;
	            $config['overwrite']     = true;
	            $config['max_size']      = 1024;

	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('foto')) {
	                $this->session->set_flashdata('gagal_upload_foto', 'Tidak Sesuai Format');
	                redirect('C_UsulanKetuaWilayah');
	            } else {
	                $foto = $this->upload->data("file_name");
	            }
	        }else{
	        	$this->session->set_flashdata('no_foto', 'Harap Masukan Foto!');
	            redirect('C_UsulanKetuaWilayah');
	        }

	        // untuk pembentukan id setiap kandidat
	        $id_1 = 'A'.$lingkungan; // setelah ini mencari id terakir/nomer urut paling tinggi dari kandidat dengan id $jabatan+$lingkungan
	        $data['rows'] = $this->m_usulan_ketua_wilayah->get_row_kandidat($id_1);
	        $total_rows = $data['rows']['jumlah'];
	        if ($total_rows == 0){
	        	$id_final = $id_1.'1';
	        }
	        if($total_rows > 0) {
	        	$data['last_id'] = $this->m_usulan_ketua_wilayah->get_last_id($id_1);
	        	$id_2 = $data['last_id']['id']; // ini menghasilkan id dengan nomor urut terbesar pada database
	        // mendapatkan nilai integer dari id terakhir
	       	 	$id_3 = substr($id_2,5);
	        	$id_4 = (int)$id_3;
				$id_5 = $id_4 + 1;
				$id_6 = (string)$id_5;
				$id_final = $id_1.$id_6;
			}


			//pengecekan nama -> dalam 1 wilayah tidak boleh ada kandidat ketua wilayah yang sama
			$data['nama_sama'] = $this->m_usulan_ketua_wilayah->cek_nama($nama, $lingkungan, 'A');
			$data['wilayah'] = $this->m_usulan_ketua_wilayah->get_wilayah($wilayah);
			if ($data['nama_sama']['jumlah'] > 0){
				$this->session->set_flashdata('nama_sama', 'Sudah Ada Sebagai Kandidat Ketua Wilayah '.$data['wilayah']['nama_wilayah']);
	            redirect('C_UsulanKetuaWilayah');
			}
	        //pengisian data
			$data = array(
			 	'id' => $id_final,
	     		'nama' => $nama,
	     		'lingkungan' => $lingkungan,
	     		'wilayah' => $wilayah,
	     		'kandidat' => 'A',
	     		'foto' => $foto,
	     		'suara' => 0,
	   		);
        	$this->m_usulan_ketua_wilayah->insert($data);
        	$this->session->set_flashdata('kandidat_wilayah', 'berhasil');
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

    public function form_isian2(){

		$data['title'] = 'Usulan Ketua Wilayah';
    	$data['wilayah'] = $this->m_suara->wilayah();
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

		  );
    	$this->form_validation->set_rules($config);


		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('v_usulan_ketua_wilayah_2', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi
			$nama = $this->input->post('nama', true);
			$wilayah = $this->input->post('wilayah', true);
			$lingkungan = $this->input->post('lingkungan', true);

			//untuk menentukan lokasi file foto
			$lokasi = './foto/ketua_wilayah';

			//memberikan nama file berdasarkan wilayah
			$nama_foto = str_replace(' ', '_', $nama);
			$nama_foto = $wilayah.'_'.$nama_foto;

        	$foto = $_FILES['foto'];
        	if (!empty($_FILES['foto']['name'])) {
	            $config['upload_path'] = $lokasi;
	            $config['allowed_types'] = 'jpeg|jpg|png';
	            $config['file_name'] = $nama_foto;
	            $config['overwrite']     = true;
	            $config['max_size']      = 1024;

	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('foto')) {
	                $this->session->set_flashdata('gagal_upload_foto', 'Tidak Sesuai Format');
	                redirect('C_UsulanKetuaWilayah/form_isian2');
	            } else {
	                $foto = $this->upload->data("file_name");
	            }
	        }else{
	        	$this->session->set_flashdata('no_foto', 'Harap Masukan Foto!');
	            redirect('C_UsulanKetuaWilayah/form_isian2');
	        }

	        // untuk pembentukan id setiap kandidat
	        $id_1 = 'A'.$lingkungan; // setelah ini mencari id terakir/nomer urut paling tinggi dari kandidat dengan id $jabatan+$lingkungan
	        $data['rows'] = $this->m_usulan_ketua_wilayah->get_row_kandidat($id_1);
	        $total_rows = $data['rows']['jumlah'];
	        if ($total_rows == 0){
	        	$id_final = $id_1.'1';
	        }
	        if($total_rows > 0) {
	        	$data['last_id'] = $this->m_usulan_ketua_wilayah->get_last_id($id_1);
	        	$id_2 = $data['last_id']['id']; // ini menghasilkan id dengan nomor urut terbesar pada database
	        // mendapatkan nilai integer dari id terakhir
	       	 	$id_3 = substr($id_2,5);
	        	$id_4 = (int)$id_3;
				$id_5 = $id_4 + 1;
				$id_6 = (string)$id_5;
				$id_final = $id_1.$id_6;
			}


			//pengecekan nama -> dalam 1 wilayah tidak boleh ada kandidat ketua wilayah yang sama
			$data['nama_sama'] = $this->m_usulan_ketua_wilayah->cek_nama($nama, $lingkungan, 'A');
			$data['wilayah'] = $this->m_usulan_ketua_wilayah->get_wilayah($wilayah);
			if ($data['nama_sama']['jumlah'] > 0){
				$this->session->set_flashdata('nama_sama', 'Sudah Ada Sebagai Kandidat Ketua Wilayah '.$data['wilayah']['nama_wilayah']);
	            redirect('C_UsulanKetuaWilayah/form_isian2');
			}
	        //pengisian data
			$data = array(
			 	'id' => $id_final,
	     		'nama' => $nama,
	     		'lingkungan' => $lingkungan,
	     		'wilayah' => $wilayah,
	     		'kandidat' => 'A',
	     		'foto' => $foto,
	     		'suara' => 0,
	   		);
        	$this->m_usulan_ketua_wilayah->insert($data);
        	$this->session->set_flashdata('kandidat_wilayah', 'berhasil');
        	redirect('C_DashboardAdmin');
		}
		
	}
}
