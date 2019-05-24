<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_user');

		if($this->session->userdata('level') != "1") {  
			redirect('');  
		}
	} 

	public function getAjax()
	{
		$data['data'] = $this->M_user->getuser();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id_user');
        $data=$this->M_user->getuserWhereId($id);
        echo json_encode($data);
    }

	public function add() {
		$dat = array(
			'id_user'	=>	$this->input->post(''),
			'name'	=>	$this->input->post('name'),
			'email'	=>	$this->input->post('email'),
			'password'	=>	md5($this->input->post('password')),
			'address'	=>	$this->input->post('address'),
			'phone'	=>	$this->input->post('phone'),
			'level'	=>	$this->input->post('level')
		);
		$data = $this->M_user->insert($dat);
		$this->session->set_flashdata('berhasil','Data Berhasil Ditambahkan'); 
		redirect('C_admin/adduser');
	}

	public function update(){
		$dat=array(
			'id_user'=>$this->input->post('id_user'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'address'=>$this->input->post('address'),
			'phone'=>$this->input->post('phone'),
			'level'=>$this->input->post('level')
		);
		$where=$this->input->post('id_user');
		$data=$this->M_user->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('id_user');
		$data=$this->M_user->delete($where);
		echo json_encode($data);
	}

}