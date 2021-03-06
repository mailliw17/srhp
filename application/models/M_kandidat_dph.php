<?php

class M_kandidat_dph extends CI_Model
{

  //kandidat untuk pencarian
  public function get_kandidat($jenis_kandidat = null, $keyword = null){

    if(!($jenis_kandidat)){
      return $this->db->query("SELECT * FROM kandidat_terpilih 
        JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
        JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
        WHERE (nama LIKE '%$keyword%' OR lingkungan LIKE '%$keyword%' OR wilayah LIKE '%$keyword%') AND kandidat LIKE 'C%' ORDER BY id ASC ")->result_array();
    }elseif(!($keyword)){
      return $this->db->query("SELECT * FROM kandidat_terpilih 
        JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
        JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
        WHERE kandidat = '$jenis_kandidat' ORDER BY id ASC ")->result_array();
    }elseif(($keyword != null) && ($jenis_kandidat != null)){
      return $this->db->query("SELECT * FROM kandidat_terpilih 
        JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
        JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
        WHERE (nama LIKE '%$keyword%' OR lingkungan LIKE '%$keyword%' OR wilayah LIKE '%$keyword%') AND kandidat = '$jenis_kandidat'ORDER BY id ASC ")->result_array();
    }else{
      return $this->db->query("SELECT * FROM kandidat_terpilih JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah WHERE kandidat LIKE 'C%' ORDER BY id ASC ")->result_array();
    }

  }

  public function count_kandidat($jenis_kandidat = null, $keyword = null){
    if(!($jenis_kandidat)){
      return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE (nama LIKE '%$keyword%' OR lingkungan LIKE '%$keyword%' OR wilayah LIKE '%$keyword%') AND kandidat LIKE 'C%' ORDER BY id ASC ")->row_array();
    }elseif(!($keyword)){
      return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE kandidat = '$jenis_kandidat' ORDER BY id ASC ")->row_array();
    }elseif(($keyword) && ($jenis_kandidat)){
      return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE (nama LIKE '%$keyword%' OR lingkungan LIKE '%$keyword%' OR wilayah LIKE '%$keyword%') AND kandidat = '$jenis_kandidat'ORDER BY id ASC ")->row_array();
    }else{
      return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE kandidat LIKE 'C%' ORDER BY id ASC ")->row_array();
    }
  }


  //kandidat 1 untuk edit
  public function get_kandidat1($id){
    return $this->db->query("SELECT * FROM kandidat_terpilih 
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
      JOIN kandidat_dph  ON kandidat_terpilih.kandidat = kandidat_dph.kode_dph
      WHERE id ='$id'")->result_array();
  }


  public function cek_nama($nama, $kandidat){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE nama = '$nama' AND kandidat = '$kandidat'")->row_array();
  }


  //kandidat2 untuk cek nama
  public function get_kandidat2($kandidat){
    return $this->db->query("SELECT * FROM kandidat_dph WHERE kode_dph = '$kandidat' ")->row_array();
  }

  //kandidat3 untuk hapus
  public function get_kandidat3($id){
    return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id = '$id' ")->row_array();
  }

  public function hapus($id){
    $this->db->query("DELETE FROM kandidat_terpilih WHERE id = '$id' ");
  }

  public function update($id, $kandidat, $foto){
    $this->db->query("UPDATE kandidat_terpilih SET kandidat = '$kandidat', foto = '$foto' WHERE id = '$id' ");
  }


  //untuk pemilih
  public function get_kandidat4($kandidat){
    return $this->db->query("SELECT * FROM kandidat_terpilih
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah 
      JOIN pemilih ON kandidat_terpilih.nama = pemilih.nama AND kandidat_terpilih.lingkungan = pemilih.kode_lingkungan AND kandidat_terpilih.wilayah = pemilih.kode_wilayah
      WHERE kandidat = '$kandidat' AND status = 'warga' ORDER BY kandidat_terpilih.id ASC ")->result_array();
  }

  //menampilkan kandidat berdasarkan id

  public function get_kandidat5($id){
    return $this->db->query("SELECT * FROM kandidat_terpilih
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah 
      WHERE id = '$id' ")->result_array();
  }

  //mupdate suara kandidat 
  public function set_suara($id_selected_kandidat){
    $this->db->query("UPDATE kandidat_terpilih SET suara = suara + 1 WHERE id = '$id_selected_kandidat' ");
  }

}
