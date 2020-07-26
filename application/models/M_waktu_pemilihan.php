<?php
class M_waktu_pemilihan extends CI_Model{
	//cek nip dan password dosen
	function getStatus($tipe){
		return $this->db->query("SELECT * FROM waktu_pemilihan WHERE jenis = '$tipe' ")->row_array();
	}

	function getStatus1(){
		return $this->db->query("SELECT * FROM waktu_pemilihan WHERE status = 'berjalan' OR status = 'belum' ")->num_rows();
	}


	function setPemilihan($tipe, $status){
		$this->db->query("UPDATE waktu_pemilihan SET status ='$status' WHERE jenis ='$tipe' ");
	}
}