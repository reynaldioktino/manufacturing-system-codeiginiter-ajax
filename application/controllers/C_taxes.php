<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_taxes extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_taxes');

	} 

	public function getAjax()
	{
		$data['data'] = $this->M_taxes->gettaxes();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id_tax');
        $data=$this->M_taxes->gettaxesWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_tax'	=>	$this->input->post(''),
			'tax_name'	=>	$this->input->post('tax_name'),
			'amount'	=>	$this->input->post('amount'),
		);
		$data=$this->M_taxes->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_tax'=>$this->input->post('id_tax'),
			'tax_name'=>$this->input->post('tax_name'),
			'amount'=>$this->input->post('amount')
		);
		$where=$this->input->post('id_tax');
		$data=$this->M_taxes->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('id_tax');
		$data=$this->M_taxes->delete($where);
		echo json_encode($data);
	}

}