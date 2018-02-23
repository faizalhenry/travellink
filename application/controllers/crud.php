<?php 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->library('encryption');
 
	}
 
	function index(){
		$data['tb_user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
	}
 
	function tambah(){
		$this->load->view('v_admin_data_tambah_user');
	}

	function tambah_user(){
		$this->load->view('v_admin_data_tambah_user');
	}

	function tambah_customer(){
		$this->load->view('v_admin_data_tambah_customer');
	}

	function tambah_reservation(){
		$this->load->view('v_admin_data_tambah_reservation');
	}

	function tambah_rute(){
		$this->load->view('v_admin_data_tambah_rute');
	}
 
	function tambah_aksi(){
	
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$data = array(
			'fullname' => $fullname,
			'username' => $username,
			'password' => base64_encode($password),
			'level' => $level
		);
 
		$this->m_data->input_data($data,'tb_user');
		redirect('admin/');
	}
	function tambah_aksi_customer(){
	
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$gender = $this->input->post('gender');
		$data = array(
			'name' => $name,
			'address' => $address,
			'phone' => $phone,
			'gender' => $gender
		);
 
		$this->m_data->input_data($data,'tb_customer');
		redirect('admin/');
	}
	function tambah_aksi_reservation(){
	
		$reservation_id = $this->input->post('reservation_id');
		$reservation_at = $this->input->post('reservation_at');
		$reservation_date = $this->input->post('reservation_date');
		$customer_id = $this->input->post('customer_id');
		$seat_code = $this->input->post('seat_code');
		$rute_id = $this->input->post('rute_id');
		$depart_at = $this->input->post('depart_at');
		$price = $this->input->post('price');
		$user_id = $this->input->post('user_id');
		$data = array(
			'reservation_id' => $reservation_id,
			'reservation_at' => $reservation_at,
			'reservation_date' => $reservation_date,
			'customer_id' => $customer_id,
			'seat_code' => $seat_code,
			'rute_id' => $rute_id,
			'depart_at' => $depart_at,
			'price' => $price,
			'user_id' => $user_id
		);
 
		$this->m_data->input_data($data,'tb_reservation');
		redirect('admin/');
	}
	function tambah_aksi_rute(){
	
		$depart_at = $this->input->post('depart_at');
		$rute_from = $this->input->post('rute_from');
		$rute_to = $this->input->post('rute_to');
		$price = $this->input->post('price');
		$transportation_id = $this->input->post('transportation_id');
		$data = array(
			'depart_at' => $depart_at,
			'rute_from' => $rute_from,
			'rute_to' => $rute_to,
			'price' => $price,
			'transportation_id' => $transportation_id
		);
 
		$this->m_data->input_data($data,'tb_rute');
		redirect('admin/');
	}
	function tambah_aksi_transportation(){
	
		$code = $this->input->post('code');
		$description = $this->input->post('description');
		$seat_qty = $this->input->post('seat_qty');
		$transportation_type_id = $this->input->post('transportation_type_id');
		$data = array(
			'code' => $code,
			'description' => $description,
			'seat_qty' => $seat_qty,
			'transportation_type_id' => $transportation_type_id
		);
 
		$this->m_data->input_data($data,'tb_transportation');
		redirect('admin/');
	}
	function tambah_aksi_transportation_type(){
	
		$description = $this->input->post('description');
		$data = array(
			'description' => $description
			
		);
 
		$this->m_data->input_data($data,'tb_transportation_type');
		redirect('admin/');
	}
	function edit($id){
	$where = array('id' => $id);
	$data['tb_user'] = $this->m_data->edit_data($where,'tb_user')->result();
	$this->load->view('v_admin_data_edit_user',$data);
	}
 
	function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'tb_user');
		redirect('admin/');
	}

	function update(){
	$id = $this->input->post('id');
	$fullname = $this->input->post('fullname');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$level = $this->input->post('level');
	$data = array(
		'fullname' => $fullname,
		'username' => $username,
		'password' => base64_encode($password),
		'level' => $level
	);
 
	$where = array(
		'id' => $id
	);

	$this->m_data->update_data($where,$data,'tb_user');
	redirect('admin/');
	
	// $query = $this->db->query('UPDATE `tb_user` SET `username` = "'.$username.'", `password` = "'.$password.'", `fullname` = "'.$fullname.'", `level` = "'.$level.'" WHERE `tb_user`.`id` = "'.$id.'"');
	// 	if ($query) {
	// 		echo redirect('admin/');
	// 	}
	}
}