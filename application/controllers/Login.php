<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Modb');
		
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function dologin()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}else{
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$data = array(
				'nik_baru' => $u,
				'password' => md5($p)
			);
			$log = $this->Modb->login($data);
			
			if ($log->num_rows() == 1) {
				
				$row = $log->row_array();
				$datasession = array(
					'name' => $row['nama_karyawan_struktur'],
					'nik'  => $row['nik_baru'],
					'lokasi' => $row['lokasi_struktur'],
					'dept' => $row['dept_struktur'],
					'jabatan' => $row['jabatan_karyawan'],
					'level' => $row['level_struktur'],
					'status' => "login"
				);
				//var_dump($datasession);
				$this->session->set_userdata($datasession);
				$this->session->set_flashdata("welcome", "Welcome  ". $datasession['name']);
				//if ($this->session->userdata('nik') === '0100014000'){
					redirect(base_url('approval'));
				//}else{
				//	redirect(base_url('requestform'));
				//}
				
			} else {
				$this->session->set_flashdata("failed","&nbsp;Login Failed!");
				redirect('login');
			}
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}