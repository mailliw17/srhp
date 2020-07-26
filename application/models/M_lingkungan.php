<?php

class M_lingkungan extends CI_Model
{
	function get_allLingkungan()
	{
		return $this->db->get('lingkungan') -> result_array();
	}

	function get_lingkungan1($wilayah){

		return $this->db->query("SELECT * FROM lingkungan WHERE kode_wilayah = '$wilayah'") -> result();
	}

	function get_nama_lingkungan($kode_lingkungan){
		return $this->db->query("SELECT * FROM lingkungan WHERE kode_lingkungan = '$kode_lingkungan'") -> row_array();
	}
}
