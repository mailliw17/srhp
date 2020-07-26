<?php
class M_rekap_suara extends CI_Model{
	

	public function get_kandidat_dph(){
		return $this->db->query("SELECT *, MAX(suara) FROM kandidat_terpilih
		JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      	JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
      	JOIN kandidat_dph ON kandidat_terpilih.kandidat = kandidat_dph.kode_dph
		WHERE kandidat <> 'A' OR kandidat <> 'B' GROUP BY kandidat ")->result_array();
	}

	public function get_kandidat_wilayah(){
		return $this->db->query("SELECT *, MAX(suara) FROM kandidat_terpilih
		JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      	JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
		WHERE kandidat = 'A' GROUP BY wilayah ORDER BY wilayah ASC")->result_array();
	}

	public function get_kandidat_koor_wilayah(){
		return $this->db->query("SELECT *, MAX(suara) FROM kandidat_terpilih
		JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      	JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
		WHERE kandidat = 'D' GROUP BY wilayah ORDER BY suara DESC LIMIT 1")->result_array();
	}

	public function get_kandidat_lingkungan(){
		return $this->db->query("SELECT *, MAX(suara) FROM kandidat_terpilih
		JOIN lingkungan ON kandidat_terpilih.lingkungan = lingkungan.kode_lingkungan
      	JOIN wilayah  ON kandidat_terpilih.wilayah = wilayah.kode_wilayah
		WHERE kandidat = 'B' GROUP BY lingkungan ORDER BY lingkungan ASC")->result_array();
	}
}