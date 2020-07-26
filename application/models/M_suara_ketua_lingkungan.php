<?php

class M_suara_ketua_lingkungan extends CI_Model
{
	function lingkungan()
	{
		return $this->db->query("SELECT * FROM lingkungan ORDER BY kode_lingkungan ASC") -> result();
	}

	function suara($lingkungan)
	{
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE lingkungan = '$lingkungan' AND kandidat = 'B' ORDER BY suara DESC ")->result();
	}

	public function get_kode_lingkungan($nama_lingkungan){
		return $this->db->query("SELECT * FROM lingkungan WHERE nama_lingkungan = '$nama_lingkungan'") -> row_array();
	}

  public function get_nama_lingkungan($kode_lingkungan){
    return $this->db->query("SELECT * FROM lingkungan WHERE kode_lingkungan = '$kode_lingkungan'") -> row_array();
  }

  public function get_row_kandidat($id_1){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE id LIKE '$id_1%'")->row_array();
  }


  public function get_usulan($lingkungan){
    return $this->db->query("SELECT * FROM kandidat_terpilih 
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
      WHERE lingkungan = '$lingkungan' AND kandidat = 'B' ORDER BY suara DESC")->result_array();
  }

  public function count_usulan($lingkungan){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE lingkungan = '$lingkungan' AND kandidat = 'B'")->row_array();
  }

}