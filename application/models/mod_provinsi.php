<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_Provinsi extends CI_Model {
	public function index($kondisi="")
	{
		$data = $this->db->query("SELECT * FROM provinsi ".$kondisi);
		return $data->result_array();
	}

	public function tampil_tertentu($kondisi)
	{
		# $data = $this->db->query("SELECT * FROM provinsi WHERE ID_PROVINSI = '$kondisi'");
		
		$this->db->from('provinsi');
		$this->db->where('ID_PROVINSI',$kondisi);
		$data = $this->db->get();
 		
		return $data->row();
	}

	public function tambah($data)
	{
		$this->db->insert("provinsi",$data);
		return $this->db->insert_id();
	}

	public function perbarui($data,$kondisi)
	{
		$this->db->update("provinsi", $data, $kondisi);
		return $this->db->affected_rows();
		/*
		$data = $this->db->update("provinsi",$data,$kondisi);
		return $data;
		*/
	}

	public function hapus($data)
	{
		$this->db->where("ID_PROVINSI", $data);
		$this->db->delete("provinsi");

		# $data = $this->db->delete("provinsi",$data);
		# return $data;
	}
}
