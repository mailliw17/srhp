<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PengaturanPemilih extends CI_Controller {
	 public function __construct()
   {
      parent::__construct();
      if($this->session->userdata('masuk') != TRUE){
        $url=base_url();
        redirect($url);
      }
      $this->load->model('m_pemilih');
      $this->load->model('m_suara');
      $this->load->model('m_lingkungan');
      $this->load->model('m_wilayah');
    $this->load->library('form_validation');
      $this->load->helper('url');
   }

	public function index()
	{

      $data['title'] = 'Cari User';
      $data['ket1'] = 'Silahkan Masukan NIK atau Nama Pemilih';

      if($this->input->post('keyword') == ''){
        $data['ket2'] = 'Silahkan Masukan NIK atau Nama Terlebih Dahulu!';
        $data['pemilih'] = '';
      }else{
        $data['ket2'] = '';
        $keyword = $this->input->post('keyword');
        $data['ket1'] = 'Keyword : '.$keyword;
        $data['pemilih'] = $this->m_pemilih->cariPemilih($keyword);
        $data['hasil_pencarian'] = $this->m_pemilih->hitungCariPemilih($keyword);
      }

      $this->load->view('templates/header', $data);
      $this->load->view('v_cari_pemilih', $data);
      $this->load->view('templates/footer', $data);
	}

  public function tambah(){

      $data['title'] = 'Tambah Pemilih';
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
         'field' => 'nik',
         'label' => 'NIK',
         'rules' => 'required|numeric|is_unique[pemilih.nik]',
         'errors' => array(
                        'required' => 'NIK Tidak Boleh Kosong', 
                        'numeric'=> 'NIK Harus Berupa Angka',
                        'is_unique'=> 'NIK Telah Digunakan',               
          ),
       ),

       array(
         'field' => 'no_kk',
         'label' => 'no_kk',
       'rules' => 'required',
       'errors' => array(
        'required' => 'Nomor KK Tidak Boleh Kosong',
        ),
       ),

       // array(
       //   'field' => 'tempat_lahir',
       //   'label' => 'tempat_lahir',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Tempat Lahir Tidak Boleh Kosong',
       //  ),
       // ),

       // array(
       //   'field' => 'tanggal_lahir',
       //   'label' => 'tanggal_lahir',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Tanggal Lahir Tidak Boleh Kosong',
       //  ),
       // ),

       // array(
       //   'field' => 'alamat',
       //   'label' => 'alamat',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Alamat Tidak Boleh Kosong',
       //  ),
       // ),

       // array(
       //   'field' => 'kabkota',
       //   'label' => 'kabkota',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Kabupaten / Kota Tidak Boleh Kosong',
       //  ),
       // ),

       // array(
       //   'field' => 'kecamatan',
       //   'label' => 'kecamatan',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Kecamatan Tidak Boleh Kosong',
       //  ),
       // ),

       // array(
       //   'field' => 'kelurahan',
       //   'label' => 'kelurahan',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Kelurahan Tidak Boleh Kosong',
       //  ),
       // ),

       array(
         'field' => 'nama_baptis',
         'label' => 'nama_baptis',
       'rules' => 'required',
       'errors' => array(
        'required' => 'Nama Baptis Tidak Boleh Kosong',
        ),
       ),

       array(
         'field' => 'jenis_kelamin',
         'label' => 'jenis_kelamin',
       'rules' => 'required',
       'errors' => array(
        'required' => 'Jenis Kelamin Tidak Boleh Kosong',
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

       // array(
       //   'field' => 'telepon',
       //   'label' => 'telepon',
       // 'rules' => 'required',
       // 'errors' => array(
       //  'required' => 'Telepon Tidak Boleh Kosong',
       //  ),
       // ),

      );
      $this->form_validation->set_rules($config);


    if( $this->form_validation->run() == FALSE){
      $this->load->view('templates/header', $data);
      $this->load->view('v_tambah_pemilih', $data);
      $this->load->view('templates/footer');
    } else{//jalankan fungsi

      $nama = $this->input->post('nama', true);
      $nama_baptis = $this->input->post('nama_baptis', true);
      $nik = $this->input->post('nik', true);
      $no_kk = $this->input->post('no_kk', true);
      $tempat_lahir = $this->input->post('tempat_lahir', true);
      $tanggal_lahir = $this->input->post('tanggal_lahir', true);
      $alamat = $this->input->post('alamat', true);
      $kabkota = $this->input->post('kabkota', true);
      $kecamatan = $this->input->post('kecamatan', true);
      $kelurahan = $this->input->post('kelurahan', true);
      $jenis_kelamin = $this->input->post('jenis_kelamin', true);
      $kode_wilayah = $this->input->post('wilayah', true);
      $kode_lingkungan = $this->input->post('lingkungan', true);
      $telepon = $this->input->post('telepon', true);
      $email = $this->input->post('email', true);

      $data['wilayah'] = $this->m_wilayah->get_nama_wilayah($kode_wilayah);
      $wilayah = $data['wilayah']['nama_wilayah'];

      $data['lingkungan'] = $this->m_lingkungan->get_nama_lingkungan($kode_lingkungan);
      $lingkungan = $data['lingkungan']['nama_lingkungan'];

      //insert data
      $data = array(
          'no_NP' => 'new',
          'nama' => $nama,
          'nama_baptis' => $nama_baptis,
          'status' => 'warga',
          'agama' => 'Katolik',
          'tempat_lahir' => $tempat_lahir,
          'tanggal_lahir' => $tanggal_lahir,
          'jenis_kelamin' => $jenis_kelamin,
          'wilayah' => $wilayah,
          'kode_wilayah' => $kode_wilayah,
          'lingkungan' => $lingkungan,
          'kode_lingkungan' => $kode_lingkungan,
          'nik' => $nik,
          'no_kk' => $no_kk,
          'alamat' => $alamat,
          'kab_kota' => $kabkota,
          'kecamatan' => $kecamatan,
          'kelurahan' => $kelurahan,
          'no_hp' => $telepon,
          'email' => $email,
        );


      $this->m_pemilih->insert($data);
      $this->session->set_flashdata('tambah', 'berhasil');
      redirect('C_PengaturanPemilih');
    }
    
  }



  public function edit($id){

      $data['title'] = 'Edit Pemilih';
      $data['wilayah'] = $this->m_suara->wilayah();
      $data['pemilih'] = $this->m_pemilih->getPemilih($id);
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
      $this->load->view('v_edit_pemilih', $data);
      $this->load->view('templates/footer');
    } else{//jalankan fungsi

      if($this->input->post('nama')){
        $nama = $this->input->post('nama', true);
      }elseif(!($this->input->post('nama'))){
        $nama = $this->input->post('nama_lama', true);
      }

      if($this->input->post('nik')){
        $nik = $this->input->post('nik', true);
      }elseif(!($this->input->post('nik'))){
        $nik = $this->input->post('nik_lama', true);
      }


      if($this->input->post('wilayah')){
        $kode_wilayah = $this->input->post('wilayah', true);
      }elseif(!($this->input->post('wilayah'))){
        $kode_wilayah = $this->input->post('wilayah_lama', true);
      }

      $data['wilayah'] = $this->m_wilayah->get_nama_wilayah($kode_wilayah);
      $wilayah = $data['wilayah']['nama_wilayah'];


      if($this->input->post('lingkungan')){
        $kode_lingkungan = $this->input->post('lingkungan', true);
      }elseif(!($this->input->post('lingkungan'))){
        $kode_lingkungan = $this->input->post('lingkungan_lama', true);
      }

      $data['lingkungan'] = $this->m_lingkungan->get_nama_lingkungan($kode_lingkungan);
      $lingkungan = $data['lingkungan']['nama_lingkungan'];

      if($this->input->post('hak_suara_dph')){
        $tipe = $this->input->post('hak_suara_dph', true);
      }elseif(!($this->input->post('hak_suara_dph'))){
        $tipe = null;
      }


      //update data
      $this->m_pemilih->updateData($id, $nik, $nama, $wilayah, $kode_wilayah, $lingkungan, $kode_lingkungan, $tipe);
      $this->session->set_flashdata('edit', 'berhasil');
      redirect('C_PengaturanPemilih');
    }
    
  }

  public function ubahHakPilih($id){

      $this->m_pemilih->ubahHakPilih($id);

      $data['pemilih'] = $this->m_pemilih->getPemilih1($id);
      $this->session->set_flashdata('edit1', $data['pemilih']['nama']);
      redirect('C_PengaturanPemilih');
  }

  public function get_lingkungan(){
        $wilayah = $this->input->post('id');
        $data= $this->m_lingkungan->get_lingkungan1($wilayah);
        echo json_encode($data);
  }

  public function hapus($id){

    $this->m_pemilih->hapus($id);
    $this->session->set_flashdata('hapus', 'berhasil');
    redirect('C_PengaturanPemilih');
  }

}