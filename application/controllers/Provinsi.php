<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_pengguna'))
		{
			redirect(site_url());
		}
		$this->load->helper('url');
		$this->load->model('mod_provinsi');
	}

	public function index()
	{
		$data = $this->mod_provinsi->index();
		
		$data = array('data' => $data);

		$this->load->view('head/provinsi');

		$this->load->view('menu_atas');

		$this->load->view('sidebar');

		$this->load->view('konten/provinsi',$data);

		$this->load->view('menu_bawah');
		
		$this->load->view('foot/provinsi');
	}

	public function tambah()
	{
		$nama = $_POST['nama'];

		$data = array(
			'NAMA_PROVINSI' => $nama,
			);

		$data = $this->mod_provinsi->tambah($data);
		echo json_encode(array('status' => true));

		if ($data > 0)
		{
			$this->session->set_flashdata('pesan','Data berhasil disimpan...!!!');
		}
		else
		{
			$this->session->set_flashdata('pesan','Data gagal disimpan...!!!');
		}
	}

	public function edit($id)
	{
		$data = $this->mod_provinsi->tampil_tertentu($id);

		echo json_encode($data);
	}

	public function simpan_edit()
	{
		$id = $_POST['id_provinsi'];
		$nama = $_POST['nama'];

		$data = array('NAMA_PROVINSI' => $nama);
		$kondisi = array('ID_PROVINSI' => $id);

		$data = $this->mod_provinsi->perbarui($data,$kondisi);
		echo json_encode(array('status' => true));
		/*
		if ($data > 0)
		{
			$this->session->set_flashdata('pesan','Perbarui data sukses...!!!');
			redirect(base_url('provinsi'));
		}
		else
		{
			echo "<h1>Perbarui data gagal !!!</h1>";
		}
		*/
	}

	public function hapus($id)
	{
		/*
		$id = array('ID_PENGGUNA' => $id);

		$data = $this->mod_pengguna->hapus($id);

		if ($data > 0)
		{
			$this->session->set_flashdata('pesan','Data berhasil dihapus...!!!');
			redirect(base_url('pengguna'));
		}
		else
		{
			echo "<h1>Hapus data gagal !!!</h1>";
		}
		*/

		$this->mod_provinsi->hapus($id);
		echo json_encode(array("status" => TRUE));
	}
}
