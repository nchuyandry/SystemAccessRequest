<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modb extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
	}
	public function login($data)
	{
		//$query = $this->db2->query("SELECT tbl_karyawan_struktur.*, tbl_jabatan_karyawan.jabatan_karyawan FROM  tbl_karyawan_struktur  RIGHT JOIN  tbl_jabatan_karyawan ON no_jabatan_karyawan  =  tbl_karyawan_struktur.jabatan_struktur  WHERE  tbl_karyawan_struktur.nik_baru = '".$data."'");
		$this->db2->select('*, tbl_jabatan_karyawan.jabatan_karyawan');
		$this->db2->from('tbl_karyawan_struktur');
		$this->db2->join('tbl_jabatan_karyawan', 'tbl_jabatan_karyawan.no_jabatan_karyawan  =  tbl_karyawan_struktur.jabatan_struktur' );
		$this->db2->where($data);
		$query = $this->db2->get();
		return $query;
	}
	function getnomor(){
        $query = $this->db->query("SELECT MAX(RIGHT(nomor,3)) AS nomax FROM t_request WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if($query->num_rows()>0){
            foreach($query->result() as $k){
                $tmp = ((int)$k->nomax)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return "SAR-".date('dmy')."-".$kd;
    }
	public function simpan($data)
	{
		$this->db->insert('t_request', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('t_request', $data);
	}
	public function datapersonal()
	{
		$nik = $this->session->userdata('nik');
		$query = $this->db->where('nik', $nik)->get('t_request');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
	public function dataall()
	{
		$query = $this->db->get('t_request');
		return $query->result();
		/*if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}*/
	}
	public function get_by_id($table,$id)
	{
		return $this->db->get_where($table, array('id' => $id))->row();
    }
}