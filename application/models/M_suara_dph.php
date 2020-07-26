<?php

class M_suara_dph extends CI_Model
{
	function dph()
	{
		return $this->db->get('kandidat_dph') -> result_array();
	}

	function get_nama_kandidat($id)
	{
		return $this->db->query("SELECT * FROM kandidat_dph WHERE kode_dph = '$id'")->row_array();
	}
	function suara($jenis_kandidat)
	{
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE kandidat = '$jenis_kandidat' ORDER BY suara DESC ")->result();
	}

  public function get_row_kandidat($id_1){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE id LIKE '$id_1%'")->row_array();
  }


  public function get_usulan($jenis_kandidat){
    return $this->db->query("SELECT * FROM kandidat_terpilih 
      JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
      WHERE kandidat = '$jenis_kandidat' ORDER BY suara DESC")->result_array();
  }

  public function count_usulan($jenis_kandidat){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE kandidat ='$jenis_kandidat'")->row_array();
  }

}