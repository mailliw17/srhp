<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_KandidatDph extends CI_Controller {
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
    	$this->load->model('m_kandidat_dph');
   }

	public function index(){
		$data['title'] = 'Kandidat DPH';
		$data['jenis_kandidat'] = $this->m_suara->dph();

		if (((($this->session->userdata('keyword')) && !($this->session->userdata('jenis_kandidat'))) ||
			(($this->session->userdata('keyword')) && !($this->session->userdata('jenis_kandidat'))) ||
			(($this->session->userdata('keyword')) && ($this->session->userdata('jenis_kandidat'))))  && 
			(!($this->input->post('jenis_kandidat')) && !($this->input->post('keyword')))){

			$data['kandidat_dph'] = $this->m_kandidat_dph->get_kandidat($this->session->userdata('jenis_kandidat'), $this->session->userdata('keyword'));

			$data['total'] = $this->m_kandidat_dph->count_kandidat($this->session->userdata('jenis_kandidat'), $this->session->userdata('keyword'));

			$data['total'] = $data['total']['jumlah'];

			$data['nama_kandidat'] = $this->m_suara->get_nama_kandidat($this->session->userdata('jenis_kandidat'));

			$kandidat = $data['nama_kandidat']['kandidat_dph'];

			if (!($this->session->userdata('keyword'))){
				$this->session->set_userdata('ket2', 'Jenis Kandidat : '.$kandidat);
			} elseif (!($this->session->userdata('jenis_kandidat'))){
				$this->session->set_userdata('ket2', 'Keyword : '.$this->session->userdata('keyword'));
			}else{
				$this->session->set_userdata('ket2', 'Jenis Kandidat : '.$kandidat.', keyword : '.$this->session->userdata('keyword'));
			}

			$data['ket2'] = $this->session->userdata('ket2');
		}

		elseif($this->input->post('jenis_kandidat') && !($this->input->post('keyword'))){

			$jenis_kandidat = $this->input->post('jenis_kandidat');

			$this->session->set_userdata('jenis_kandidat', $jenis_kandidat);

			$this->session->set_userdata('keyword', null);

			$data['kandidat_dph'] = $this->m_kandidat_dph->get_kandidat($jenis_kandidat);

			$data['nama_kandidat'] = $this->m_suara->get_nama_kandidat($this->session->userdata('jenis_kandidat'));

			$data['total'] = $this->m_kandidat_dph->count_kandidat($jenis_kandidat, null);

			$data['total'] = $data['total']['jumlah'];

			$kandidat = $data['nama_kandidat']['kandidat_dph'];

			$this->session->set_userdata('ket2', 'Jenis Kandidat :'.$kandidat);
			$data['ket2'] = $this->session->userdata('ket2');
		}

		elseif(!($this->input->post('jenis_kandidat')) && $this->input->post('keyword')){

			$keyword = $this->input->post('keyword');

			$this->session->set_userdata('jenis_kandidat', null);

			$this->session->set_userdata('keyword', $keyword);

			$data['kandidat_dph'] = $this->m_kandidat_dph->get_kandidat(null, $keyword);

			$data['total'] = $this->m_kandidat_dph->count_kandidat(null, $keyword);

			$data['total'] = $data['total']['jumlah'];

			$this->session->set_userdata('ket2', 'Keyword :'.$keyword);

			$data['ket2'] = $this->session->userdata('ket2');
		}

		elseif( $this->input->post('jenis_kandidat') && $this->input->post('keyword')){

			$keyword = $this->input->post('keyword');

			$jenis_kandidat = $this->input->post('jenis_kandidat');

			$this->session->set_userdata('jenis_kandidat', $jenis_kandidat);

			$this->session->set_userdata('keyword', $keyword);

			$data['kandidat_dph'] = $this->m_kandidat_dph->get_kandidat($jenis_kandidat, $keyword);

			$data['nama_kandidat'] = $this->m_suara->get_nama_kandidat($this->session->userdata('jenis_kandidat'));

			$data['total'] = $this->m_kandidat_dph->count_kandidat($jenis_kandidat, $keyword);

			$data['total'] = $data['total']['jumlah'];

			$kandidat = $data['nama_kandidat']['kandidat_dph'];

			$this->session->set_userdata('ket2', 'Jenis Kandidat : '.$kandidat.', keyword : '.$this->session->userdata('keyword'));

			$data['ket2'] = $this->session->userdata('ket2');
		}

		else{// tidak memasukan keyword sama sekali
			$data['kandidat_dph'] = $this->m_kandidat_dph->get_kandidat(null, null);
			$data['total'] = $this->m_kandidat_dph->count_kandidat(null, null);
			$data['total'] = $data['total']['jumlah'];
			$data['ket2'] = 'Keseluruhan';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_kandidat_dph', $data);
		$this->load->view('templates/footer', $data);
	}
	public function edit($id){

		$data['title'] = 'Edit Kandidat';
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['dph'] = $this->m_suara->dph();
    	$data['kandidat'] = $this->m_kandidat_dph->get_kandidat1($id);
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
			$this->load->view('v_edit_dph', $data);
			$this->load->view('templates/footer');
		} else{//jalankan fungsi

			if($this->input->post('jabatan')){
				$jabatan = $this->input->post('jabatan', true);
			}elseif(!($this->input->post('jabatan'))){
				$jabatan = $this->input->post('jabatan_lama', true);
			}

			$nama = $this->input->post('nama_lama', true);

			$lokasi = './foto/dph';
	        	$foto = $_FILES['foto'];
	        	$nama_foto = str_replace(' ', '_', $nama);
        		$nama_foto = $jabatan.'_kandidat_'.$nama_foto;
	        	if (!empty($_FILES['foto']['name'])) {
		            $config['upload_path'] = $lokasi;
		            $config['allowed_types'] = 'jpeg|jpg|png';
		            $config['file_name'] = $nama_foto;
		            $config['overwrite']     = true;
		            $config['max_size']      = 1024;

		            $this->load->library('upload', $config);
		            if (!$this->upload->do_upload('foto')) {
		                $this->session->set_flashdata('gagal_upload_foto', 'Tidak Sesuai Format');
		                redirect('C_KandidatDph/edit/'.$id);
		            } else {
		                unlink($lokasi."/$nama_foto");
		                $foto = $this->upload->data("file_name");
		            }
		        }else{
		        	$foto = $this->input->post('foto_lama');
		        }
	        //update data
        	$this->m_kandidat_dph->update($id, $jabatan, $foto);
        	$this->session->set_flashdata('edit', 'berhasil');
        	redirect('C_KandidatDph');
        	}
		}

	public function hapus($id){

		$data['kandidat'] = $this->m_kandidat_dph->get_kandidat3($id);
		$nama_foto = $data['kandidat']['foto'];

		$jenis_kandidat = $data['kandidat']['kandidat'];
		//untuk menentukan lokasi file foto
		$lokasi = './foto/dph';

		$this->m_kandidat_dph->hapus($id);
		$this->session->set_flashdata('hapus', 'dihapus');
		unlink($lokasi."/$nama_foto");
        redirect('C_KandidatDph');


	}
	public function get_lingkungan(){
        $wilayah = $this->input->post('id');
        $data= $this->m_lingkungan->get_lingkungan1($wilayah);
        echo json_encode($data);
    }
}
