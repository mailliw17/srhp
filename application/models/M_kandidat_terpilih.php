<?php
class M_kandidat_terpilih extends CI_Model{
	//cek nip dan password dosen
	function get_data_admin($id){
		$query=$this->db->query("SELECT * FROM admin WHERE id='$id' LIMIT 1");
		return $query;
	}

	//untuk mengambil ketua lingkungan
	function getMSuaraKetuaLingkungan(){
		return $this->db->query("SELECT MAX(suara) as suara, lingkungan, wilayah FROM kandidat_terpilih WHERE kandidat = 'B' GROUP BY lingkungan")->result_array();
	}

	function getKetuaLingkungan($suara, $wilayah, $lingkungan){
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE kandidat = 'B' AND suara = $suara AND wilayah ='$wilayah' AND lingkungan ='$lingkungan'")->result_array();
	}

	//untuk mengambil ketua wilayah
	function getMSuaraKetuaWilayah(){
		return $this->db->query("SELECT MAX(suara) as suara, wilayah FROM kandidat_terpilih WHERE kandidat = 'A' GROUP BY wilayah")->result_array();
	}

	function getKetuaWilayah($suara, $wilayah){
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE kandidat = 'A' AND suara = $suara AND wilayah ='$wilayah'")->result_array();
	}



	//Untuk mengambil koordinator wilayah
	function getMSuaraKoorWilayah(){
		return $this->db->query("SELECT MAX(suara) as suara, wilayah FROM kandidat_terpilih WHERE kandidat = 'D'")->result_array();
	}

	function getKoorWilayah($suara){
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE kandidat = 'D' AND suara = $suara ")->result_array();
	}


	//Untuk mengambil DPH

	function getMSuaraDPH(){
		return $this->db->query("SELECT MAX(suara) as suara, kandidat FROM kandidat_terpilih WHERE kandidat LIKE '%C%' GROUP BY kandidat")->result_array();
	}

	function getDPH($kandidat, $suara){
		return $this->db->query("SELECT * FROM kandidat_terpilih WHERE kandidat = '$kandidat' AND suara = $suara")->result_array();
	}

}
