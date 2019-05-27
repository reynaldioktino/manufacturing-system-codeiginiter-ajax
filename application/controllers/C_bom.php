<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bom extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_bom');
		$this->load->model('M_product');

	} 

	public function getAjax()
	{
		$data['data'] = $this->M_bom->getbom();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id_bom');
        $data=$this->M_bom->getbomWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_bom'	=>	$this->input->post(''),
			'id_product'	=>	$this->input->post('id_product'),
			'quantity'	=>	$this->input->post('quantity'),
			'bom_type'	=>	$this->input->post('bom_type')
		);
		$data=$this->M_bom->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_bom'=>$this->input->post('id_bom'),
			'id_product'=>$this->input->post('id_product'),
			'quantity'=>$this->input->post('quantity'),
			'bom_type'=>$this->input->post('bom_type')
		);
		$where=$this->input->post('id_bom');
		$data=$this->M_bom->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('id_bom');
		$data=$this->M_bom->delete($where);
		echo json_encode($data);
	}

	public function detail($id) {
		$data['product']=$this->M_product->listproduct();
		$data['product_bom'] = $this->M_bom->product_bom($id);
		$this->load->view('menu/detailbom', $data);
	}

	public function getAjaxDetail($id)
	{
		$data['data'] = $this->M_bom->getbomdetail($id);
		echo json_encode($data);
	}

	public function adddetail(){
		$dat = array(
			'id_detail_bom'	=>	$this->input->post(''),
			'id_bom'	=>	$this->input->post('id_bom'),
			'id_product'	=>	$this->input->post('id_product'),
			'quantity'	=>	$this->input->post('quantity')
		);
		$data=$this->M_bom->insertdetail($dat);
		echo json_encode($data);
	}

	public function deletedetail(){
		$where=$this->input->post('id_detail_bom');
		$data=$this->M_bom->deletedetail($where);
		echo json_encode($data);
	}

	public function wheredetail(){
        $id=$this->input->get('id_detail_bom');
        $data=$this->M_bom->getdetailbomWhereId($id);
        echo json_encode($data);
    }

    public function updatedetail(){
		$dat=array(
			'id_detail_bom'=>$this->input->post('id_detail_bom'),
			'quantity'=>$this->input->post('quantity')
		);
		$where=$this->input->post('id_detail_bom');
		$data=$this->M_bom->updatedetail($dat, $where);
		echo json_encode($data);
	}

}