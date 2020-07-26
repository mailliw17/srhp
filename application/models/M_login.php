<?php
class M_login extends CI_Model
{
	//cek nip dan password dosen
	function auth_admin($username, $password)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE id='$username' AND password=MD5('$password') LIMIT 1");
		return $query;
	}

	function auth_pemilih($username, $password)
	{
		$query = $this->db->query("SELECT * FROM pemilih WHERE nik='$username' AND password='$password' LIMIT 1");
		return $query;
	}
}
