<?php

class M_suara extends CI_Model
{

	function jenis_kandidat()
	{
		return $this->db->query("SELECT * FROM jenis_kandidat WHERE id <> 'D'") -> result_array();
	}

	function lingkungan()
	{
		return $this->db->query("SELECT * FROM lingkungan ORDER BY kode_lingkungan ASC") -> result();
	}

	function wilayah()
	{
		return $this->db->get('wilayah') -> result_array();
	}

	function dph()
	{
		return $this->db->get('kandidat_dph') -> result_array();
	}

	function get_nama_kandidat($id)
	{
		return $this->db->query("SELECT * FROM kandidat_dph WHERE kode_dph = '$id'")->row_array();
	}

	function get_nama_wilayah($id)
	{
		return $this->db->query("SELECT * FROM wilayah WHERE kode_wilayah = '$id'")->row_array();
	}

	function get_nama_lingkungan($nama_lingkungan)
	{
		return $this->db->query("SELECT * FROM lingkungan WHERE nama_lingkungan = '$nama_lingkungan'")->row_array();
	}

	function suara($dph = null, $ketua_lingkungan = null, $ketua_wilayah = null)
	{
		if($dph)
		{
			return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$dph%' ORDER BY suara DESC ")->result();
		}
		elseif($ketua_lingkungan)
		{
			$data = "B".$ketua_lingkungan;
			return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$data%' ORDER BY suara DESC ")->result();
		}
		elseif($ketua_wilayah)
		{
			$data = "A".$ketua_wilayah;
			return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$data%' ORDER BY suara DESC ")->result();
		}
	}

	function get_suara_dph($dph){
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$dph%' ORDER BY suara DESC ")->result();
	}

	function get_suara_wilayah($kode_wilayah){
		$data = "A".$kode_wilayah;
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$data%' ORDER BY suara DESC ")->result();
	}

	function get_suara_lingkungan($kode_lingkungan){
		$data = "B".$kode_lingkungan;
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE id LIKE '$data%' ORDER BY suara DESC ")->result();
	}

	//untuk suara koordinator wilayah
	function suara1()
	{
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE kandidat = 'D' ORDER BY suara DESC")->result();
	}

	function get_dph($dph)
	{
		return $this->db->query("SELECT * FROM kandidat_dph WHERE kode_dph = '$dph'") -> row_array();
	}

	function get_wilayah($ketua_wilayah)
	{
		return $this->db->query("SELECT * FROM wilayah WHERE kode_wilayah = '$ketua_wilayah'") -> row_array();
	}

	function get_lingkungan($lingkungan)
	{
		return $this->db->query("SELECT * FROM lingkungan WHERE nama_lingkungan = '$lingkungan'") -> row_array();
	}
}