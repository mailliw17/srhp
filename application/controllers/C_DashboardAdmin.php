<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_DashboardAdmin extends CI_Controller {
	 public function __construct()
   {
      parent::__construct();
      if($this->session->userdata('masuk') != TRUE){
        $url=base_url();
        redirect($url);
      }
      $this->load->model('m_suara');
      $this->load->model('m_pemilih');
      $this->load->model('m_waktu_pemilihan');
      $this->load->model('m_kandidat_terpilih');
      $this->load->model('m_usulan_ketua_wilayah');
      $this->load->helper('url');
   }

	public function index()
	{
      $data['title'] = 'Dashboard Admin';
		  $data['jenis_kandidat'] = $this->m_suara->jenis_kandidat();
    	$data['lingkungan'] = $this->m_suara->lingkungan();
    	$data['wilayah'] = $this->m_suara->wilayah();
    	$data['dph'] = $this->m_suara->dph();

      $data['status_pemilihan_lingkungan'] = $this->m_waktu_pemilihan->getStatus('B');
      $data['status_pemilihan_lingkungan_1'] = $data['status_pemilihan_lingkungan']['status'];
      $data['status_pemilihan_wilayah'] = $this->m_waktu_pemilihan->getStatus('A');
      $data['status_pemilihan_wilayah_1'] = $data['status_pemilihan_wilayah']['status'];
      $data['status_pemilihan_dph'] = $this->m_waktu_pemilihan->getStatus('C');
      $data['status_pemilihan_dph_1'] = $data['status_pemilihan_dph']['status'];


      $data['status_pemilihan_koor_wilayah'] = $this->m_waktu_pemilihan->getStatus('D');
      $data['status_pemilihan_koor_wilayah_1'] = $data['status_pemilihan_koor_wilayah']['status'];

      // untuk perhitungan pemilih 

      $data['jumlah_pemilih'] = $this->m_pemilih->count_all_pemilih();
      $data['jumlah_pemilih_pria'] = $this->m_pemilih->count_all_pemilih_pria();
      $data['jumlah_pemilih_wanita'] = $this->m_pemilih->count_all_pemilih_wanita();


      //menghitung jumlah pemilih tipe 1 dan 2 untuk digunakan sebagai total suara
      $data['pemilih_1'] = $this->m_pemilih->count_pemilih1();
      $data['pemilih_2'] = $this->m_pemilih->count_pemilih2();
      $pemilih_1 = $data['pemilih_1']['jumlah'];// jumlah == pemilih_1 * (1+1+15) , ini bisa memilih dph
      $pemilih_2 = $data['pemilih_2']['jumlah'];//jumlah == pemilih_2 * (1+1) 
      $total_suara_pemilih = (integer)$pemilih_1*17 + (integer)$pemilih_2 * 2 + 8;
      //8 adalah jumlah pemilih koordinator wilayah(pemilih : ketua dari 8 wilayah)


      //menghitung suara tersisa untuk dipakai sebagai sperhitungan suara terpakai
      $data['suara_tersisa'] = $this->m_pemilih->count_sisa_suara();
      $dph_tersisa = (integer)$data['suara_tersisa']['hs_dph'];
      $lingkungan_tersisa = (integer)$data['suara_tersisa']['hs_lingkungan'];
      $wilayah_tersisa = (integer)$data['suara_tersisa']['hs_wilayah'];
      $koor_tersisa = (integer)$data['suara_tersisa']['hs_koor_wilayah'];
      $suara_tersisa = $dph_tersisa + $lingkungan_tersisa + $wilayah_tersisa + $koor_tersisa;

      //menghitug total suara terpakai dalam persen 
      $suara_terpakai = ($total_suara_pemilih - $suara_tersisa)/$total_suara_pemilih;
      $data['suara_terpakai'] = number_format($suara_terpakai,5);


		$this->load->view('templates/header', $data);
		$this->load->view('v_dashboard_admin', $data);
		$this->load->view('templates/footer');
	}

  public function setLingkungan1(){
    $this->m_waktu_pemilihan->setPemilihan('B', 'berjalan');
    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setLingkungan2(){
    $this->m_waktu_pemilihan->setPemilihan('B', 'selesai');

    foreach ($this->m_kandidat_terpilih->getMSuaraKetuaLingkungan() as $row) {
      $lingkungan = $row['lingkungan'];
      $wilayah = $row['wilayah'];
      $suara = $row['suara'];
      foreach ($this->m_kandidat_terpilih->getKetuaLingkungan($suara, $wilayah, $lingkungan) as $rows) {
          $nama = $rows['nama'];
          $lingkungan = $rows['lingkungan'];
          $wilayah = $rows['wilayah'];
          $id = $rows['id'];
          $this->m_pemilih->setStatusPemilih($nama, $lingkungan, $wilayah, $id);
      }
    }

    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setWilayah1(){
    $this->m_waktu_pemilihan->setPemilihan('A', 'berjalan');
    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setWilayah2(){
    $this->m_waktu_pemilihan->setPemilihan('A', 'selesai');
    foreach ($this->m_kandidat_terpilih->getMSuaraKetuaWilayah() as $row) {
      $wilayah = $row['wilayah'];
      $suara = $row['suara'];
      foreach ($this->m_kandidat_terpilih->getKetuaWilayah($suara, $wilayah) as $rows) {
          $nama = $rows['nama'];
          $lingkungan = $rows['lingkungan'];
          $wilayah = $rows['wilayah'];
          $id = $rows['id'];
          $this->m_pemilih->setStatusPemilih1($nama, $lingkungan, $wilayah, $id, 1); // untuk menambah Hak suara koor wilayah
      } 
    }

    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setKoorWilayah1(){
    $this->m_waktu_pemilihan->setPemilihan('D', 'berjalan');

    foreach ($this->m_kandidat_terpilih->getMSuaraKetuaWilayah() as $row) {
      $wilayah = $row['wilayah'];
      $suara = $row['suara'];
      foreach ($this->m_kandidat_terpilih->getKetuaWilayah($suara, $wilayah) as $rows) {
          $id = $rows['id'];
          $subsid = substr($id, 1);
          $id_final = 'D'.$subsid;
          $data = array(
            'id' => $id_final,
            'nama' => $rows['nama'],
            'lingkungan' => $rows['lingkungan'],
            'wilayah' => $rows['wilayah'],
            'kandidat' => 'D',
            'foto' => $rows['foto'],
            'suara' => 0,
          );
          $this->m_usulan_ketua_wilayah->insert($data);
      } 
    }
    // foreach ($this->m_kandidat_terpilih->getKetuaWilayah1() as $row) { // mengambil data ketua wilayah dgn suara terbanyak
    //   $id = $row['id'];
    //   $subsid = substr($id, 1);
    //   $id_final = 'D'.$subsid;
    //   $data = array(
    //     'id' => $id_final,
    //     'nama' => $row['nama'],
    //     'lingkungan' => $row['lingkungan'],
    //     'wilayah' => $row['wilayah'],
    //     'kandidat' => 'D',
    //     'foto' => $row['nama'],
    //     'suara' => 0,
    //   );
    //   $this->m_usulan_ketua_wilayah->insert($data);
    // }
    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setKoorWilayah2(){
    $this->m_waktu_pemilihan->setPemilihan('D', 'selesai');
    foreach ($this->m_kandidat_terpilih->getMSuaraKoorWilayah() as $row) {
      $suara = $row['suara'];
      foreach ($this->m_kandidat_terpilih->getKoorWilayah($suara) as $rows) {
          $nama = $rows['nama'];
          $lingkungan = $rows['lingkungan'];
          $wilayah = $rows['wilayah'];
          $id = $rows['id'];
          $this->m_pemilih->setStatusPemilih($nama, $lingkungan, $wilayah, $id);
      }
    }

    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setDPH1(){
    $this->m_waktu_pemilihan->setPemilihan('C', 'berjalan');
    $this->session->set_flashdata('set', 'berhasil');
    redirect('C_DashboardAdmin');
  }

  public function setDPH2(){
    $this->m_waktu_pemilihan->setPemilihan('C', 'selesai');
    $this->session->set_flashdata('set', 'berhasil');
    foreach ($this->m_kandidat_terpilih->getMSuaraDPH() as $row) {
      $kandidat = $row['kandidat'];
      $suara = $row['suara'];
      foreach ($this->m_kandidat_terpilih->getDPH($kandidat, $suara) as $rows) {
          $nama = $rows['nama'];
          $lingkungan = $rows['lingkungan'];
          $wilayah = $rows['wilayah'];
          $id = $rows['id'];
          $this->m_pemilih->setStatusPemilih($nama, $lingkungan, $wilayah, $id);
      }
    }
    redirect('C_DashboardAdmin');
  }

  //untuk mengambil keterangan kandidat dph
  public function get_kandidat_dph(){
    $kode = $this->input->post('dph');
    $data['jenis_dph'] = $this->m_suara->get_dph($kode);
    $jenis_dph = $data['jenis_dph']['kandidat_dph'] ." (DPH)";
    echo json_encode($jenis_dph);

  }

  //untuk mengambil suara dph
  public function get_suara_dph(){
    $dph = $this->input->post('dph');
    $data = $this->m_suara->get_suara_dph($dph);
    echo json_encode($data);
  }

  //untuk mengambil keterangan kandidat ketua wilayah
  public function get_kandidat_wilayah(){
    $kode = $this->input->post('ketua_wilayah');
    $data['wilayah'] = $this->m_suara->get_wilayah($kode);
    $wilayah = "Ketua ". $data['wilayah']['nama_wilayah'];
    echo json_encode($wilayah);

  }

  //untuk mengambil suara ketua wilayah
  public function get_suara_wilayah(){
    $ketua_wilayah = $this->input->post('ketua_wilayah');
    $data = $this->m_suara->get_suara_wilayah($ketua_wilayah);
    echo json_encode($data);
  }


  //untuk mengambil keterangan kandidat ketua lingkungan
  public function get_kandidat_lingkungan(){
    $lingkungan = $this->input->post('ketua_lingkungan');
    $lingkungan = "Ketua Lingkungan ". $lingkungan;
    echo json_encode($lingkungan);

  }

  //untuk mengambil suara ketua lingkungan
  public function get_suara_lingkungan(){
    $ketua_lingkungan = $this->input->post('ketua_lingkungan');
    $data['lingkungan'] = $this->m_suara->get_lingkungan($ketua_lingkungan);
    $lingkungan = $data['lingkungan']['kode_lingkungan'];
    $data = $this->m_suara->get_suara_lingkungan($lingkungan);
    echo json_encode($data);
  }



  public function get_suara_terpakai(){
    $lingkungan = $this->input->post('ketua_lingkungan2');

    //menghitung jumlah pemilih tipe 1 dan 2 untuk digunakan sebagai total suara
    $data['pemilih_1'] = $this->m_pemilih->count_pemilih1_1($lingkungan);
    $data['pemilih_2'] = $this->m_pemilih->count_pemilih2_1($lingkungan);
    $pemilih_1 = $data['pemilih_1']['jumlah'];// jumlah == pemilih_1 * (1+1+15) , ini bisa memilih dph
    $pemilih_2 = $data['pemilih_2']['jumlah'];//jumlah == pemilih_2 * (1+1) 
    $total_suara_pemilih = (integer)$pemilih_1*17 + (integer)$pemilih_2 * 2;

    $data['suara_tersisa']= $this->m_pemilih->count_sisa_suara_1($lingkungan);
    $dph_tersisa = (integer)$data['suara_tersisa']['hs_dph'];
    $lingkungan_tersisa = (integer)$data['suara_tersisa']['hs_lingkungan'];
   $wilayah_tersisa = (integer)$data['suara_tersisa']['hs_wilayah'];
    $koor_tersisa = (integer)$data['suara_tersisa']['hs_koor_wilayah'];
    $suara_tersisa = $dph_tersisa + $lingkungan_tersisa + $wilayah_tersisa;

      
    //menghitug total suara terpakai dalam persen 
    $suara_terpakai = (($total_suara_pemilih - $suara_tersisa)/$total_suara_pemilih)*100;
    $suara_terpakai = number_format($suara_terpakai,2);
    $suara_tersisa = ($suara_tersisa/$total_suara_pemilih)*100;
    $suara_tersisa = number_format($suara_tersisa,2);

    //memasukan data ke array
    $output = [$suara_terpakai, $suara_tersisa];

    echo json_encode($output);
  }


}
