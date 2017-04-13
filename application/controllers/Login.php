<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$cek = $this->mod_login->index($where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $email,
				'status' => "login"
				);
 
			$this->session->set_flashdata($data_session);
 
			redirect(base_url("beranda"));
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
