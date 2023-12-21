<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Modb');
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}	
	}
	public function index()
	{
		$this->template->load('template', 'dashboard');
	}	
	public function requestform()
	{
		$data['nomor'] = $this->Modb->getnomor();
		$data['drequest'] = $this->Modb->datapersonal();
		$this->template->load('template', 'frequest', $data);
	}
	public function submitrequest()
	{
		$tgl = date('Y-m-d H:i:s');
		$nomor = $this->input->post('nomor');;
		$nik = $this->session->userdata('nik');
		$nama = $this->session->userdata('name');
		$email = $this->input->post('email');
		$dept = $this->session->userdata('dept');
		$jabatan = $this->session->userdata('jabatan');
		$level = $this->session->userdata('level');
		$lokasi = $this->session->userdata('lokasi');
		$system = $this->input->post('system');
		$reason = $this->input->post('reason');
		$data = array(
			'tanggal' => $tgl,
			'nomor' => $nomor,
			'nik' => $nik,
			'nama' => $nama,
			'email' => $email,
			'dept' => $dept,
			'jabatan' => $jabatan,
			'level' => $level,
			'lokasi' => $lokasi,
			'system' => $system,
			'reason' => $reason,
			'status' => 'Open'
		);
		/*var_dump($data);*/
		$this->Modb->simpan($data);
		$this->session->set_flashdata('saved', 'Terima Kasih sudah mengisi form permintaan akses sistem');
		
		$this->load->library('email');
		$config = [
			'charset' => 'utf-8',
			'protocol' => "smtp",
			'mailtype'=> "html",
			'smtp_host' => "192.168.15.100",//pengaturan smtp
			'smtp_port' => "25",
			'smtp_timeout' => "5",
			'smtp_user' => "SAR@tvip.co.id",
			'crlf' => "\r\n",
			'newline' => "\r\n",
			'wordwrap' => TRUE
			];
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//konfigurasi pengiriman
		$this->email->from($config['smtp_user'], 'System Access Request');
		//$this->email->to("it@tvip.co.id");
		$this->email->to("ict.spv.infra@tvip.co.id");
		$this->email->subject("Pengajuan Akses System ". $system );
		$this->email->message("<br/><br/>Permintaan Akses baru: <br/><br/> No. Pengajuan : " . $nomor . "<br/> NIK : " . $nik . "<br/> Nama : " . $nama . "<br/> Depo Asal : " . $lokasi .	"<br/> Dept : " . $dept . "<br/> Jabatan : " . $jabatan . "<br/><br/> Request Access : " . $system . "<br/> Kebutuhan : " . $reason ."<br/><br/> Link : https://itd.tvip.co.id/sar/approval <br/><br/>Terima Kasih.");
		$this->email->send(); //send mail
		redirect(base_url('requestform'));
	}
	public function approval()
	{
		
			$data['dapproval'] = $this->Modb->dataall();
			$this->template->load('template', 'dataapproval', $data);
		
		
	}
	public function rekap()
	{
		$data['pengajuan'] = $this->Modb->dataall();
		$this->template->load('template', 'rekap', $data);
	}
	function getdata()
	{
		$data = $this->Modb->dataall();
		echo json_encode($data);
	}
	function getupdate()
{
        $id=$this->input->get('id');
        $data=$this->Modb->get_by_id('t_request',$id);
        echo json_encode($data);
    }
    function updaterequest()
    {
		$id = $this->input->post('id');
		$nomor = $this->input->post('nomor');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$lokasi = $this->input->post('lokasi');
		$dept = $this->input->post('dept');
		$jabatan = $this->input->post('jabatan');
		$email = $this->input->post('email');
		$system = $this->input->post('system');
		$status = $this->input->post('status');
		$approval = $this->input->post('approval');
		$data = array(
	        'nomor' => $this->input->post('nomor'),
	        'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'lokasi' => $this->input->post('lokasi'),
			'dept' => $this->input->post('dept'),
			'jabatan' => $this->input->post('jabatan'),
	        'status' 	=> $this->input->post('status'),
	        'approval'	=> $this->input->post('approval'),
	        'tglapprove' => date('Y-m-d H:i:s')
		);

        $this->Modb->update($id, $data);
        $this->load->library('email');
		$config = [
			'charset' => 'utf-8',
			'protocol' => "smtp",
			'mailtype'=> "html",
			'smtp_host' => "192.168.15.100",//pengaturan smtp
			'smtp_port' => "25",
			'smtp_timeout' => "5",
			'smtp_user' => "SAR@tvip.co.id",
			'crlf' => "\r\n",
			'newline' => "\r\n",
			'wordwrap' => TRUE
			];
		$this->email->initialize($config);
		$this->email->from($config['smtp_user'], 'System Access Request');
		$this->email->to($email);
		$this->email->cc("ict.spv.infra@tvip.co.id");
		$this->email->subject("Status Pengajuan Akses System ". $system );
		$this->email->message("Dear " . $nama . ", <br/><br/>Berikut update status pengajuan anda:<br/><br/> Nomor : " . $nomor . "<br/> NIK : " . $nik . "<br/> Nama : " . $nama . "<br/> Depo Asal : " . $lokasi .	"<br/> Dept : " . $dept . "<br/> Jabatan : " . $jabatan . "<br/> Permintaan Akses : " . $system . "<br/> Status : <b>" . $status ."</b><br/> Feedback : " . $approval . "<br /><br/>Terima Kasih.<br/>ICT Dept.");
		$this->email->send(); //send mail
	}
	
}