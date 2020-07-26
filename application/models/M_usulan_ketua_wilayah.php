<?php

class M_usulan_ketua_wilayah extends CI_Model
{
  	public function insert($data){
		$this->db->insert('kandidat_terpilih', $data);
	}

  public function get_last_id($id_1){
    return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$id_1%' ORDER BY id DESC LIMIT 1")->row_array();
  }

  public function get_row_kandidat($id_1){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE id LIKE '$id_1%'")->row_array();
  }

  public function cek_nama($nama, $lingkungan, $kandidat){
    return $this->db->query("SELECT COUNT(*) AS jumlah FROM kandidat_terpilih WHERE nama = '$nama' AND lingkungan = '$lingkungan' AND kandidat = '$kandidat' ")->row_array();
  }

  public function get_wilayah($wilayah){
    return $this->db->query("SELECT * FROM wilayah WHERE kode_wilayah = '$wilayah' ")->row_array();
  }
}
