<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_pengguna'))
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = $this->mod_pengguna->index();
		
		$data = array('data' => $data);

		$this->load->view('head/pengguna');

		$this->load->view('menu_atas');

		$this->load->view('sidebar');

		$this->load->view('konten/pengguna',$data);

		$this->load->view('menu_bawah');
		
		$this->load->view('foot/pengguna');
	}

	public function tambah()
	{
		$nama = $_POST['nama'];
		$user = $_POST['user'];
		$lahir = $_POST['lahir'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$telepon = $_POST['telepon'];
		$email = $_POST['email'];
		$sandi = $_POST['sandi'];
		$foto = $_FILES['foto']['name'];
		$file_ext	= strtolower(end(explode('.', $foto)));

		# ================= Gambar ================= #
		$stamp = date("his") ; $ip = $_SERVER['REMOTE_ADDR'] ;
		$nama_file = "$ip-$stamp" ; $nama_file = str_replace(":","",$nama_file) ;
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 1000; # maksimum besar file 1M
		$config['max_width']            = 1024; # lebar maksimum 1000 px
		$config['max_height']           = 768; # tinggi maksimum 7000 px
		$config['file_name']			= $nama_file; # rename gambar
 
		$this->load->library('upload', $config);
 
		if (!$this->upload->do_upload('foto'))
		{
			echo "<h1>Tambah gambar gagal !!!</h1>";
		}
		else
		{
			$this->db->set('ID_PENGGUNA','UUID()',FALSE);

			$data = array(
				'NAMA_PENGGUNA' => $nama,
				'USER_PENGGUNA' => $user,
				'LAHIR_PENGGUNA' => $lahir,
				'ALAMAT_PENGGUNA' => $alamat,
				'KOTA_PENGGUNA' => $kota,
				'TELEPON_PENGGUNA' => $telepon,
				'EMAIL_PENGGUNA' => $email,
				'SANDI_PENGGUNA' => $sandi,
				'FOTO_PENGGUNA' => $nama_file.".".$file_ext
				);

			$data = $this->mod_pengguna->tambah($data);

			if ($data > 0)
			{
				$this->session->set_flashdata('pesan','Tambah data sukses...!!!');
				redirect(base_url('pengguna'));
			}
			else
			{
				echo "<h1>Tambah data gagal !!!</h1>";
			}
		}
		# ================= Gambar ================= #
	}

	public function edit()
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$telepon = $_POST['telepon'];
		$email = $_POST['email'];

		if (empty($_POST['sandi']))
		{
			$data = array(
				'NAMA_PENGGUNA' => $nama,
				'TELEPON_PENGGUNA' => $telepon,
				'EMAIL_PENGGUNA' => $email
				);
		}
		else
		{
			$sandi = $_POST['sandi'];
			$data = array(
				'NAMA_PENGGUNA' => $nama,
				'TELEPON_PENGGUNA' => $telepon,
				'EMAIL_PENGGUNA' => $email,
				'SANDI_PENGGUNA' => $sandi
				);
		}

		$kondisi = array('ID_PENGGUNA' => $id);

		$data = $this->mod_pengguna->perbarui($data,$kondisi);

		if ($data > 0)
		{
			$this->session->set_flashdata('pesan','Perbarui data sukses...!!!');
			redirect(base_url('pengguna'));
		}
		else
		{
			echo "<h1>Perbarui data gagal !!!</h1>";
		}
	}

	public function hapus($id)
	{
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
	}
}
