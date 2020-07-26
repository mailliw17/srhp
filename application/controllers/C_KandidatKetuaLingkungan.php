<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_KandidatKetualingkungan extends CI_Controller {
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
    	$this->load->model('m_kandidat_ketua_lingkungan');
   }

	public function index(){
		$data['title'] = 'Kandidat Ketua Lingkungan';
    	$data['lingkungan'] = $this->m_suara->lingkungan();

		if (((($this->session->userdata('keyword')) && !($this->session->userdata('nama_lingkungan'))) ||
			(($this->session->userdata('keyword')) && !($this->session->userdata('nama_lingkungan'))) ||
			(($this->session->userdata('keyword')) && ($this->session->userdata('nama_lingkungan'))))  && 
			(!($this->input->post('nama_lingkungan')) && !($this->input->post('keyword')))){

			$data['kandidat_ketua_lingkungan'] = $this->m_kandidat_ketua_lingkungan->get_kandidat($this->session->userdata('nama_lingkungan'), $this->session->userdata('keyword'));

			$data['total'] = $this->m_kandidat_ketua_lingkungan->count_kandidat($this->session->userdata('nama_lingkungan'), $this->session->userdata('keyword'));

			$data['nama_lingkungan'] = $this->m_suara->get_nama_lingkungan($this->session->userdata('nama_lingkungan'));

			$data['total'] = $data['total']['jumlah'];

			$lingkungan = $data['nama_lingkungan']['nama_lingkungan'];

			if (!($this->session->userdata('keyword'))){
				$this->session->set_userdata('ket3', 'lingkungan : '.$lingkungan);
			} elseif (!($this->session->userdata('nama_lingkungan'))){
				$this->session->set_userdata('ket3', 'Keyword : '.$this->session->userdata('keyword'));
			}else{
				$this->session->set_userdata('ket3', 'lingkungan : '.$lingkungan.', keyword : '.$this->session->userdata('keyword'));
			}

			$data['ket3'] = $this->session->userdata('ket3');
		}

		elseif($this->input->post('nama_lingkungan') && !($this->input->post('keyword'))){

			$nama_lingkungan = $this->input->post('nama_lingkungan');

			$this->session->set_userdata('nama_lingkungan', $nama_lingkungan);

			$this->session->set_userdata('keyword', null);

			$data['kandidat_ketua_lingkungan'] = $this->m_kandidat_ketua_lingkungan->get_kandidat($nama_lingkungan, null);

			$data['nama_lingkungan'] = $this->m_suara->get_nama_lingkungan($this->session->userdata('nama_lingkungan'));

			$data['total'] = $this->m_kandidat_ketua_lingkungan->count_kandidat($nama_lingkungan, null);

			$data['total'] = $data['total']['jumlah'];

			$lingkungan = $data['nama_lingkungan']['nama_lingkungan'];

			$this->session->set_userdata('ket3', 'lingkungan :'.$lingkungan);
			$data['ket3'] = $this->session->userdata('ket3');
		}

		elseif(!($this->input->post('nama_lingkungan')) && $this->input->post('keyword')){

			$keyword = $this->input->post('keyword');

			$this->session->set_userdata('nama_lingkungan', null);

			$this->session->set_userdata('keyword', $keyword);

			$data['kandidat_ketua_lingkungan'] = $this->m_kandidat_ketua_lingkungan->get_kandidat(null, $keyword);

			$data['total'] = $this->m_kandidat_ketua_lingkungan->count_kandidat(null, $keyword);

			$data['total'] = $data['total']['jumlah'];

			$this->session->set_userdata('ket3', 'Keyword :'.$keyword);

			$data['ket3'] = $this->session->userdata('ket3');
		}

		elseif( $this->input->post('nama_lingkungan') && $this->input->post('keyword')){

			$keyword = $this->input->post('keyword');

			$nama_lingkungan = $this->input->post('nama_lingkungan');

			$this->session->set_userdata('nama_lingkungan', $nama_lingkungan);

			$this->session->set_userdata('keyword', $keyword);

			$data['kandidat_ketua_lingkungan'] = $this->m_kandidat_ketua_lingkungan->get_kandidat($nama_lingkungan, $keyword);

			$data['nama_lingkungan'] = $this->m_suara->get_nama_lingkungan($this->session->userdata('nama_lingkungan'));

			$data['total'] = $this->m_kandidat_ketua_lingkungan->count_kandidat($nama_lingkungan, $keyword);

			$data['total'] = $data['total']['jumlah'];

			$lingkungan = $data['nama_lingkungan']['nama_lingkungan'];

			$this->session->set_userdata('ket3', 'lingkungan : '.$lingkungan.', keyword : '.$this->session->userdata('keyword'));

			$data['ket3'] = $this->session->userdata('ket3');
		}

		else{// tidak memasukan keyword sama sekali
			$data['kandidat_ketua_lingkungan'] = $this->m_kandidat_ketua_lingkungan->get_kandidat(null, null);
			$data['total'] = $this->m_kandidat_ketua_lingkungan->count_kandidat(null, null);
			$data['total'] = $data['total']['jumlah'];
			$data['ket3'] = 'Keseluruhan';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_kandidat_ketua_lingkungan', $data);
		$this->load->view('templates/footer', $data);
	}
	public function edit($id){

		$data['title'] = 'Edit Kandidat';
    	$data['lingkungan'] = $this->m_suara->lingkungan();
    	$data['kandidat'] = $this->m_kandidat_ketua_lingkungan->get_kandidat1($id);
    	$config = array(
	       array(
	         'field' => 'dummy',
	         'label' => 'Dummy',
	         'rules' => 'required',
	         'errors' => array(
	            'required'=> 'working',               
	          ),
	       ));
    	$this->form_validation->set_rules($config);


		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('v_edit_ketua_lingkungan', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi

			$jabatan = 'B';

			//untuk menentukan lokasi file foto
			$lokasi = './foto/ketua_lingkungan';
			$nama = $this->input->post('nama_lama', true);
        	$foto = $_FILES['foto'];
        	$nama_foto = str_replace(' ', '_', $nama);
        	if (!empty($_FILES['foto']['name'])) {
	            $config['upload_path'] = $lokasi;
	            $config['allowed_types'] = 'jpeg|jpg|png';
	            $config['file_name'] = $nama_foto;
	            $config['overwrite']     = true;
	            $config['max_size']      = 1024;

	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('foto')) {
	                $this->session->set_flashdata('gagal_upload_foto', 'Tidak Sesuai Format');
	                redirect('C_KandidatKetualingkungan/edit/'.$id);
	            } else {
	                unlink($lokasi."/$nama_foto");
	                $foto = $this->upload->data("file_name");
	            }
	        }else{//foto tiak ada
	        	$foto = $this->input->post('foto_lama', true);
	        }
	        //update data
        	$this->m_kandidat_ketua_lingkungan->update($id, $foto);
        	$this->session->set_flashdata('edit', 'berhasil');
        	redirect('C_KandidatKetuaLingkungan');
		}
		
	}

	public function hapus($id){

		$data['kandidat'] = $this->m_kandidat_ketua_lingkungan->get_kandidat3($id);
		$nama_foto = $data['kandidat']['foto'];

		$lokasi = './foto/ketua_lingkungan';

		$this->m_kandidat_ketua_lingkungan->hapus($id);
		$this->session->set_flashdata('hapus', 'dihapus');
		unlink($lokasi."/$nama_foto");
        	redirect('C_KandidatKetualingkungan');


	}
	public function get_wilayah(){
        $wilayah = $this->input->post('id');
        $data= $this->m_wilayah->get_wilayah1($wilayah);
        echo json_encode($data);
    }
}
