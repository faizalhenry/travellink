<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->library('encryption');
		if ($this->session->userdata('status')!='login') {
			redirect(base_url('login'));
		}
	 }
	public function index()
	{
		$data['tb_user']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
	}
	public function reservation()
	{
		$data['tb_reservation']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin_data_reservation',$data);
	}
	public function rute()
	{
		$data['tb_rute']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
	}
	public function transportation()
	{
		$data['tb_transportation']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
	}
	public function transportation_type()
	{
		$data['tb_transportation_type']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
	}
	public function user()
	{
		$data['tb_user']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin_data_user',$data);
	}
}
