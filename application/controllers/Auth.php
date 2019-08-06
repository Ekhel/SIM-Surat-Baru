<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct()
	{
			parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
			$this->load->model('M_auth');
	}
  public function index()
  {
    $this->load->view('auth/login');
  }
  function login_proses()
  {
		$nama = $this->input->post('nama');
		$sandi = md5($this->input->post('sandi'));
		if (isset($nama, $sandi)) {
			//cek user dan sandi di database
			if($this->M_auth->cek($nama, $sandi) == TRUE){
				$admin = $this->M_auth->getAdmin($nama, $sandi);
				$data['nama'] = $nama;
				$data['sandi'] = $sandi;
				$data['id_admin'] = $admin->id_admin;
				$data['level'] = $admin->level;
				$data['nama_lengkap'] = $admin->nama_lengkap;
				$data['login'] = TRUE;
				$this->session->set_userdata($data);
        if ($this->session->userdata('level')=='1'){
				redirect('Dashboard');
			  }
  			elseif ($this->session->userdata('level')=='2'){
          //helper_log("login", "Login ke applikasi");
  		  redirect('Home');
  			}
        elseif ($this->session->userdata('level')=='3'){
          //helper_log("login", "Login ke applikasi");
  			redirect('Profil');
  			}
        elseif ($this->session->userdata('level')=='4'){
          //helper_log("login", "Login ke applikasi");
  			redirect('admin');
  			}
        elseif ($this->session->userdata('level')=='5'){
          //helper_log("login", "Login ke applikasi");
  			redirect('Home');
  			}
			}
			else {
				$this->session->set_flashdata('message', 'Nama dan sandi anda salah');
				redirect('login');
			}
		}
		else {
			redirect('login');
		}
	}
  function logout()
  {
		$this->session->sess_destroy();
    //helper_log("logout", "Logout dari Applikasi");
		redirect('Auth', 'refresh');
	}
}
