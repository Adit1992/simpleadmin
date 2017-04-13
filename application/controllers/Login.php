<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('head/login');

		$this->load->view('konten/login');

		$this->load->view('foot/login');
	}

	function proses_login()
	{
		$email = $this->input->post('email');
		$sandi = $this->input->post('sandi');
		$where = array(
			'EMAIL_PENGGUNA' => $email,
			'SANDI_PENGGUNA' => $sandi
			);
		$cek = $this->mod_login->index($where);
		$hasil = $cek->num_rows();
		if($hasil > 0){
			$row = $cek->row_array();
			$nama =  $row['NAMA_PENGGUNA'];
			$id =  $row['ID_PENGGUNA'];
			$data_session = array(
				'id_pengguna' => $id,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);

			$this->session->set_flashdata("pesan","Selamat datang $nama !");
 
			redirect(base_url("beranda"));
		}else{
			echo "Username dan password salah !";
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
