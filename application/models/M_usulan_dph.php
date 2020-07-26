<?php

class M_usulan_dph extends CI_Model
{
  	public function insert($data){
		$this->db->insert('usulan_kandidat', $data);
	}

  public function get_last_id($id_1){
    return $this->db->query("SELECT * FROM usulan_kandidat WHERE id LIKE '$id_1%' ORDER BY id DESC LIMIT 1")->row_array();
  }

  public function get_row_kandidat($id_1){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM usulan_kandidat WHERE id LIKE '$id_1%'")->row_array();
  }

  public function cek_nama($nama, $kandidat){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM usulan_kandidat WHERE nama = '$nama' AND kandidat = '$kandidat'")->row_array();
  }

  public function get_kandidat($kandidat){
    return $this->db->query("SELECT * FROM kandidat_dph WHERE kode_dph = '$kandidat' ")->row_array();
  }

  public function get_usulan($jenis_kandidat){
    return $this->db->query("SELECT * FROM usulan_kandidat 
      JOIN lingkungan ON usulan_kandidat.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON usulan_kandidat.wilayah = wilayah.kode_wilayah
      WHERE kandidat = '$jenis_kandidat' AND status ='usulan' ORDER BY id ASC")->result_array();
  }

  public function terima_usulan($id){
    $this->db->query("UPDATE usulan_kandidat SET status = 'diterima' WHERE id ='$id'");
  }

   public function tolak_usulan($id){
    $this->db->query("UPDATE usulan_kandidat SET status = 'ditolak' WHERE id ='$id'");
  }

  public function count_usulan($jenis_kandidat){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM usulan_kandidat WHERE kandidat ='$jenis_kandidat' AND status = 'usulan' ")->row_array();
  }

  public function get_kandidat1($id){
    return $this->db->query("SELECT * FROM usulan_kandidat 
      JOIN lingkungan ON usulan_kandidat.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON usulan_kandidat.wilayah = wilayah.kode_wilayah
      JOIN kandidat_dph  ON usulan_kandidat.kandidat = kandidat_dph.kode_dph
      WHERE id ='$id'")->result_array();
  }

  public function get_kandidat2($id){
    return $this->db->query("SELECT * FROM usulan_kandidat WHERE id ='$id'")->row_array();
  }

  public function update($id, $kandidat, $foto){
    $this->db->query("UPDATE usulan_kandidat SET kandidat = '$kandidat', foto = '$foto' WHERE id = '$id' ");
  }

  public function insert_terpilih($data){
    $this->db->insert('kandidat_terpilih', $data);
  }
}
