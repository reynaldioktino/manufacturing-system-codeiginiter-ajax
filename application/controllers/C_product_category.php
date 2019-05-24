<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_product_category extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_product_category');
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

	public function add(){
		$dat = array(
			'id_product_category'	=>	$this->input->post(''),
			'name_category'	=>	$this->input->post('name_category'),
			'strategy'	=>	$this->input->post('strategy'),
		);
		$data=$this->M_product_category->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_product_category'=>$this->input->post('id_product_category'),
			'name_category'=>$this->input->post('name_category'),
			'strategy'=>$this->input->post('strategy')
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