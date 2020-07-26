<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_KandidatKetuaWilayah extends CI_Controller {
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
    	$this->load->model('m_kandidat_ketua_wilayah');
   }

	public function index(){
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['title'] = 'Kandidat Ketua Wilayah';

		if (((($this->session->userdata('keyword')) && !($this->session->userdata('nama_wilayah'))) ||
			(($this->session->userdata('keyword')) && !($this->session->userdata('nama_wilayah'))) ||
			(($this->session->userdata('keyword')) && ($this->session->userdata('nama_wilayah'))))  && 
			(!($this->input->post('nama_wilayah')) && !($this->input->post('keyword')))){

			$data['kandidat_ketua_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat($this->session->userdata('nama_wilayah'), $this->session->userdata('keyword'));

			$data['total'] = $this->m_kandidat_ketua_wilayah->count_kandidat($this->session->userdata('nama_wilayah'), $this->session->userdata('keyword'));

			$data['nama_wilayah'] = $this->m_suara->get_nama_wilayah($this->session->userdata('nama_wilayah'));

			$data['total'] = $data['total']['jumlah'];

			$wilayah = $data['nama_wilayah']['nama_wilayah'];

			if (!($this->session->userdata('keyword'))){
				$this->session->set_userdata('ket4', 'Wilayah : '.$wilayah);
			} elseif (!($this->session->userdata('nama_wilayah'))){
				$this->session->set_userdata('ket4', 'Keyword : '.$this->session->userdata('keyword'));
			}else{
				$this->session->set_userdata('ket4', 'Wilayah : '.$wilayah.', keyword : '.$this->session->userdata('keyword'));
			}

			$data['ket4'] = $this->session->userdata('ket4');
		}

		elseif($this->input->post('nama_wilayah') && !($this->input->post('keyword'))){

			$nama_wilayah = $this->input->post('nama_wilayah');

			$this->session->set_userdata('nama_wilayah', $nama_wilayah);

			$this->session->set_userdata('keyword', null);

			$data['kandidat_ketua_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat($nama_wilayah, null);

			$data['nama_wilayah'] = $this->m_suara->get_nama_wilayah($this->session->userdata('nama_wilayah'));

			$data['total'] = $this->m_kandidat_ketua_wilayah->count_kandidat($nama_wilayah, null);

			$data['total'] = $data['total']['jumlah'];

			$wilayah = $data['nama_wilayah']['nama_wilayah'];

			$this->session->set_userdata('ket4', 'Wilayah :'.$wilayah);
			$data['ket4'] = $this->session->userdata('ket4');
		}

		elseif(!($this->input->post('nama_wilayah')) && $this->input->post('keyword')){

			$keyword = $this->input->post('keyword');

			$this->session->set_userdata('nama_wilayah', null);

			$this->session->set_userdata('keyword', $keyword);

			$data['kandidat_ketua_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat(null, $keyword);

			$data['total'] = $this->m_kandidat_ketua_wilayah->count_kandidat(null, $keyword);

			$data['total'] = $data['total']['jumlah'];

			$this->session->set_userdata('ket4', 'Keyword :'.$keyword);

			$data['ket4'] = $this->session->userdata('ket4');
		}

		elseif( $this->input->post('nama_wilayah') && $this->input->post('keyword')){

			$keyword = $this->input->post('keyword');

			$nama_wilayah = $this->input->post('nama_wilayah');

			$this->session->set_userdata('nama_wilayah', $nama_wilayah);

			$this->session->set_userdata('keyword', $keyword);

			$data['kandidat_ketua_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat($nama_wilayah, $keyword);

			$data['nama_wilayah'] = $this->m_suara->get_nama_wilayah($this->session->userdata('nama_wilayah'));

			$data['total'] = $this->m_kandidat_ketua_wilayah->count_kandidat($nama_wilayah, $keyword);

			$data['total'] = $data['total']['jumlah'];

			$wilayah = $data['nama_wilayah']['nama_wilayah'];

			$this->session->set_userdata('ket4', 'Wilayah : '.$wilayah.', keyword : '.$this->session->userdata('keyword'));

			$data['ket4'] = $this->session->userdata('ket4');
		}

		else{// tidak memasukan keyword sama sekali
			$data['kandidat_ketua_wilayah'] = $this->m_kandidat_ketua_wilayah->get_kandidat(null, null);
			$data['total'] = $this->m_kandidat_ketua_wilayah->count_kandidat(null, null);
			$data['total'] = $data['total']['jumlah'];
			$data['ket4'] = 'Keseluruhan';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_kandidat_ketua_wilayah', $data);
		$this->load->view('templates/footer', $data);
	}
	public function edit($id){

		$data['title'] = 'Edit Kandidat';
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['kandidat'] = $this->m_kandidat_ketua_wilayah->get_kandidat1($id);
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
			$this->load->view('v_edit_ketua_wilayah', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi

			$jabatan = 'A';
			$nama = $this->input->post('nama_lama', true);

			//untuk menentukan lokasi file foto
			$lokasi = './foto/ketua_wilayah';

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
	                redirect('C_KandidatKetuaWilayah/edit/'.$id);
	            } else {
	                unlink($lokasi."/$nama_foto");
	                $foto = $this->upload->data("file_name");
	            }
	        }else{//foto tiak ada
	        	$foto = $this->input->post('foto_lama', true);
	        }
	        //update data
        	$this->m_kandidat_ketua_wilayah->update($id,$foto);
        	$this->session->set_flashdata('edit', 'berhasil');
        	redirect('C_KandidatKetuaWilayah');
		}
		
	}

	public function hapus($id){

		$data['kandidat'] = $this->m_kandidat_ketua_wilayah->get_kandidat3($id);
		$nama_foto = $data['kandidat']['foto'];

		$lokasi = './foto/ketua_wilayah';

		$this->m_kandidat_ketua_wilayah->hapus($id);
		$this->session->set_flashdata('hapus', 'dihapus');
		unlink($lokasi."/$nama_foto");
        	redirect('C_KandidatKetuaWilayah');


	}
	public function get_lingkungan(){
        $wilayah = $this->input->post('id');
        $data= $this->m_lingkungan->get_lingkungan1($wilayah);
        echo json_encode($data);
    }
}
