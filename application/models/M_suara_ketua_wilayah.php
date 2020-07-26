<?php

class M_suara_ketua_wilayah extends CI_Model
{
	function wilayah()
	{
		return $this->db->get('wilayah') -> result_array();
	}

	function get_nama_wilayah($id)
	{
		return $this->db->query("SELECT * FROM wilayah WHERE kode_wilayah = '$id'")->row_array();
	}
	function suara($wilayah)
	{
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE wilayah = '$wilayah' AND kandidat = 'A' ORDER BY suara DESC ")->result();
	}

  public function get_row_kandidat($id_1){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE id LIKE '$id_1%'")->row_array();
  }


  public function get_usulan($wilayah){
    return $this->db->query("SELECT * FROM kandidat_terpilih 
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
      WHERE wilayah = '$wilayah' AND kandidat = 'A' ORDER BY suara DESC")->result_array();
  }

  //untuk koordinator wilayah
  public function get_koor(){
    return $this->db->query("SELECT * FROM kandidat_terpilih 
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
      WHERE kandidat = 'D' ORDER BY suara DESC")->result_array();
  }

  public function count_usulan($wilayah){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE wilayah = '$wilayah' AND kandidat = 'A'")->row_array();
  }


  //untuk koordinator wilayah
  public function count_koor(){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE kandidat = 'D'")->row_array();
  }

}