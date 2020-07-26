<?php

class M_pemilih extends CI_Model
{

	function get_data_pemilih1($nama, $lingkungan, $wilayah){
		$query=$this->db->query("SELECT * FROM pemilih WHERE nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' LIMIT 1");
		return $query;
	}

	function count_all_pemilih(){
		return $this->db->query("SELECT * FROM pemilih ") -> num_rows();
	}

	function count_all_pemilih_pria(){
		return $this->db->query("SELECT * FROM pemilih WHERE jenis_kelamin = '1' ") -> num_rows();
	}

	function count_all_pemilih_wanita(){
		return $this->db->query("SELECT * FROM pemilih WHERE jenis_kelamin = '2' ") -> num_rows();
	}

	function count_pemilih1(){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM pemilih WHERE tipe = '1' ") -> row_array();
	}

	function count_pemilih2(){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM pemilih WHERE tipe = '2' ") -> row_array();
	}

	function count_sisa_suara(){
		return $this->db->query("SELECT SUM(hs_dph) as hs_dph, SUM(hs_lingkungan) as hs_lingkungan, SUM(hs_wilayah) as hs_wilayah, SUM(hs_koor_wilayah) as hs_koor_wilayah FROM pemilih") -> row_array();
	}

	function get_data_pemilih($nama, $lingkungan, $wilayah){
		return $this->db->query("SELECT * FROM pemilih WHERE nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ") -> row_array();
	}

	function set_B($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET B = '$id_selected_kandidat', hs_lingkungan = hs_lingkungan - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_A($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET A = '$id_selected_kandidat', hs_wilayah = hs_wilayah - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_D($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET D = '$id_selected_kandidat', hs_koor_wilayah = hs_koor_wilayah - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C1($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C1 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C2($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C2 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C3($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C3 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C4($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C4 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C5($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C5 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C6($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C6 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C71($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C71 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C72($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C72 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C73($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C73 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C81($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C81 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C82($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C82 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C83($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C83 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C84($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C84 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C85($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C85 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_C9($nik, $nama, $lingkungan, $wilayah, $id_selected_kandidat){

		$this->db->query("UPDATE pemilih SET C9 = '$id_selected_kandidat', hs_dph = hs_dph - 1 WHERE nik = '$nik' AND nama = '$nama' AND kode_lingkungan = '$lingkungan' AND kode_wilayah = '$wilayah' ");
	}

	function set_password($nama, $lingkungan, $wilayah, $password){
		$this->db->query("UPDATE pemilih SET password = '$password' WHERE nama='$nama' AND kode_lingkungan ='$lingkungan' AND kode_wilayah ='$wilayah' ");
	}


	function getAllPemilih(){
		return $this->db->query("SELECT * FROM pemilih") ->result_array();
	}

	function getLin($no_dp, $nik){
		return $this->db->query("SELECT * FROM pemilih WHERE no_NP ='$no_dp' AND nik = '$nik' LIMIT 1")->row_array();
	}

	function setNik($no_np, $wilayah, $lingkungan, $nama, $nik){
		$this->db->query("UPDATE pemilih SET nik ='$nik' WHERE no_NP ='$no_np' AND wilayah = '$wilayah' AND lingkungan = '$lingkungan' AND nama = '$nama' ");
	}
	function getKodeLW($lingkungan){
		return $this->db->query("SELECT * FROM lingkungan WHERE nama_lingkungan = '$lingkungan'")->row_array();
	} 

	function isiData($no_np, $nik, $kode_lingkungan, $kode_wilayah){
		$this->db->query("UPDATE pemilih SET kode_lingkungan = '$kode_lingkungan', kode_wilayah = '$kode_wilayah' WHERE no_NP ='$no_np' AND nik = '$nik'");
	}

	//untuk ajax nik
	function getData($nik){
		return $this->db->query("SELECT * FROM pemilih WHERE nik ='$nik' LIMIT 1")->result();
	}


	function cariPemilih($keyword){
		return $this->db->query("SELECT * FROM pemilih WHERE nama LIKE '%$keyword%' OR nik = '$keyword' ")->result_array();
	}

	function hitungCariPemilih($keyword){
		return $this->db->query("SELECT * FROM pemilih WHERE nama LIKE '%$keyword%' OR nik = '$keyword' ")->num_rows();
	}

	//untuk pemilih dph
	function cariPemilihDph($keyword){
		return $this->db->query("SELECT * FROM pemilih WHERE (nama LIKE '%$keyword%' OR nik = '$keyword')AND tipe = '1' ")->result_array();
	}

	function hitungCariPemilihDph($keyword){
		return $this->db->query("SELECT * FROM pemilih WHERE (nama LIKE '%$keyword%' OR nik = '$keyword')AND tipe = '1' ")->num_rows();
	}

	function hitungAllPemilihDph(){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM pemilih WHERE tipe = '1' ")->row_array();
	}

	//untuk edit
	function getPemilih($id){
		return $this->db->query("SELECT * FROM pemilih WHERE no = '$id'")->result_array();
	}

	//untuk ubah hak pilih
	function getPemilih1($id){
		return $this->db->query("SELECT * FROM pemilih WHERE no = '$id'")->row_array();
	}

	function ubahHakPilih($id){
		$this->db->query("UPDATE pemilih set tipe = '1', hs_dph = 15 WHERE no ='$id' ");
	}

	//untuk update
	function updateData($id, $nik, $nama, $wilayah, $kode_wilayah, $lingkungan, $kode_lingkungan, $tipe=null){
		if ($tipe){
			$this->db->query("UPDATE pemilih SET nik ='$nik',nama ='$nama',wilayah ='$wilayah',kode_wilayah ='$kode_wilayah', lingkungan ='$lingkungan', kode_lingkungan ='$kode_lingkungan', tipe ='$tipe', hs_dph = 0 WHERE no ='$id'");
		}else {
			$this->db->query("UPDATE pemilih SET nik ='$nik',nama ='$nama',wilayah ='$wilayah',kode_wilayah ='$kode_wilayah', lingkungan ='$lingkungan', kode_lingkungan ='$kode_lingkungan' WHERE no ='$id' ");
		}
	}

	//hapus pemilih
	function hapus($id){
		$this->db->query("DELETE FROM pemilih WHERE no = '$id'");
	}


	// untuk ketua lingkungan, dan dph
	function setStatusPemilih($nama, $lingkungan, $wilayah, $status){
		$this->db->query("UPDATE pemilih SET status = '$status' WHERE nama ='$nama' AND kode_lingkungan ='$lingkungan' AND kode_wilayah ='$wilayah'");
	}

	//untuk ketua wilayah
	function setStatusPemilih1($nama, $lingkungan, $wilayah, $status, $hs){
		$this->db->query("UPDATE pemilih SET status = '$status', hs_koor_wilayah = $hs WHERE nama ='$nama' AND kode_lingkungan ='$lingkungan' AND kode_wilayah ='$wilayah'");
	}

	public function insert($data){
		$this->db->insert('pemilih', $data);
	}

	//coba ajax jumlah suara terpakai
	function count_sisa_suara_1($lingkungan){
		return $this->db->query("SELECT SUM(hs_dph) as hs_dph, SUM(hs_lingkungan) as hs_lingkungan, SUM(hs_wilayah) as hs_wilayah, SUM(hs_koor_wilayah) as hs_koor_wilayah FROM pemilih WHERE lingkungan = '$lingkungan'") -> row_array();
	}

	function count_pemilih1_1($lingkungan){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM pemilih WHERE tipe = '1' AND lingkungan = '$lingkungan' ") -> row_array();
	}

	function count_pemilih2_1($lingkungan){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM pemilih WHERE tipe = '2' AND lingkungan = '$lingkungan' ") -> row_array();
	}
}
