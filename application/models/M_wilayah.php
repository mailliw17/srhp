<?php

class M_wilayah extends CI_Model
{

	function get_nama_wilayah($kode_wilayah){
		return $this->db->query("SELECT * FROM wilayah WHERE kode_wilayah = '$kode_wilayah'") -> row_array();
	}
}