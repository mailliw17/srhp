<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SeleksiDph extends CI_Controller {
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
   }

	public function index(){
		$data['title'] = 'Seleksi DPH';
		$data['jenis_kandidat'] = $this->m_suara->dph();
		if (($this->session->userdata('jenis_kandidat')) && !($this->input->post('jenis_kandidat'))){
			$data['usulan_dph'] = $this->m_usulan_dph->get_usulan($this->session->userdata('jenis_kandidat'));
			$data['nama_kandidat'] = $this->m_suara->get_nama_kandidat($this->session->userdata('jenis_kandidat'));
			$data['total'] = $this->m_usulan_dph->count_usulan($this->session->userdata('jenis_kandidat'));
			$data['total'] = $data['total']['jumlah'];
			$kandidat = $data['nama_kandidat']['kandidat_dph'];
			$data['ket'] = 'Jenis Kandidat :'.$kandidat;
		}

		elseif($this->input->post('jenis_kandidat')){
			$jenis_kandidat = $this->input->post('jenis_kandidat');
			$this->session->set_userdata('jenis_kandidat', $jenis_kandidat);
			$data['usulan_dph'] = $this->m_usulan_dph->get_usulan($jenis_kandidat);
			$data['nama_kandidat'] = $this->m_suara->get_nama_kandidat($this->session->userdata('jenis_kandidat'));
			$data['total'] = $this->m_usulan_dph->count_usulan($jenis_kandidat);
			$data['total'] = $data['total']['jumlah'];
			$kandidat = $data['nama_kandidat']['kandidat_dph'];
			$data['ket'] = 'Jenis Kandidat :'.$kandidat;
		}
		else{
			$data['usulan_dph'] = NULL;
			$data['total'] = 0;
			$data['ket'] = 'Silahkan pilih jenis kandidat untuk ditampilkan';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('v_seleksi_dph', $data);
		$this->load->view('templates/footer', $data);
	}

	public function terima($id){
		$data['kandidat'] = $this->m_usulan_dph->get_kandidat2($id);

		//menambahkan data kandidat diterima ke kandidat terpilih 
		$nama = $data['kandidat']['nama'];
		$lingkungan = $data['kandidat']['lingkungan'];
		$wilayah = $data['kandidat']['wilayah'];
		$kandidat = $data['kandidat']['kandidat'];
		$foto = $data['kandidat']['foto'];
		$data = array(
			 	'id' => $id,
	     		'nama' => $nama,
	     		'lingkungan' => $lingkungan,
	     		'wilayah' => $wilayah,
	     		'kandidat' => $kandidat,
	     		'foto' => $foto,
	     		'suara' => 0,
	   	);

	   	$this->m_usulan_dph->insert_terpilih($data);
		$this->m_usulan_dph->terima_usulan($id);
		$this->session->set_flashdata('terima', 'Diterima');
		redirect('C_SeleksiDph');
	}

	public function tolak($id){
		$this->m_usulan_dph->tolak_usulan($id);
		$this->session->set_flashdata('tolak', 'Kandidat Telah Ditolak');
		redirect('C_SeleksiDph');
	}


	public function edit($id){

		$data['title'] = 'Edit Kandidat';
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['dph'] = $this->m_suara->dph();
    	$data['kandidat'] = $this->m_usulan_dph->get_kandidat1($id);
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
	                redirect('C_SeleksiDph/edit/'.$id);
	            } else {
	                unlink($lokasi."/$nama_foto");
	                $foto = $this->upload->data("file_name");
	            }
	        }else{//foto tiak ada
	        	$foto = $this->input->post('foto_lama', true);
	        }

	        //update data
        	$this->m_usulan_dph->update($id, $jabatan, $foto);
        	$this->session->set_flashdata('berhasil', 'berhasil');
        	redirect('C_SeleksiDph');
		}
		
	}
	public function get_lingkungan(){
        $wilayah = $this->input->post('id');
        $data= $this->m_lingkungan->get_lingkungan1($wilayah);
        echo json_encode($data);
    }
}
