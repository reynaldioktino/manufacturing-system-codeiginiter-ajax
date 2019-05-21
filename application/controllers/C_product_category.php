<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_product_category extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_product_category');

		if($this->session->userdata('level') != "1") {  
			redirect('');  
		}
	} 

	public function getAjax()
	{
		$data['data'] = $this->M_product_category->getproduct_category();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id_product_category');
        $data=$this->M_product_category->getproduct_categoryWhereId($id);
        echo json_encode($data);
    }

	public function add() {
		$dat = array(
			'id_product_category'	=>	$this->input->post(''),
			'name'	=>	$this->input->post('name'),
			'email'	=>	$this->input->post('email'),
			'password'	=>	md5($this->input->post('password')),
			'address'	=>	$this->input->post('address'),
			'phone'	=>	$this->input->post('phone'),
			'level'	=>	$this->input->post('level')
		);
		$data = $this->M_product_category->insert($dat);
		$this->session->set_flashdata('berhasil','Data Berhasil Ditambahkan'); 
		redirect('C_admin/addproduct_category');
	}

	public function update(){
		$dat=array(
			'id_product_category'=>$this->input->post('id_product_category'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'address'=>$this->input->post('address'),
			'phone'=>$this->input->post('phone'),
			'level'=>$this->input->post('level')
		);
		$where=$this->input->post('id_product_category');
		$data=$this->M_product_category->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('id_product_category');
		$data=$this->M_product_category->delete($where);
		echo json_encode($data);
	}

}