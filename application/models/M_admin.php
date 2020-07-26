<?php
class M_admin extends CI_Model{
	//cek nip dan password dosen
	function get_data_admin($id){
		$query=$this->db->query("SELECT * FROM admin WHERE id='$id' LIMIT 1");
		return $query;
	}

	function set_password($id, $password){
		$this->db->query("UPDATE admin SET password = '$password' WHERE id ='$id' ");
	}

}
