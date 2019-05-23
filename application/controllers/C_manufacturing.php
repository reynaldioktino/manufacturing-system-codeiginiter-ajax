<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manufacturing extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_manufacturing');
		$this->load->model('M_bom');
		$this->load->model('M_product');

		if($this->session->userdata('level') != "1") {  
			redirect('');  
		}
	} 

	public function getAjax()
	{
		$data['data'] = $this->M_manufacturing->getmanufacturing();
		echo json_encode($data);
	}

	public function getAjaxConfirmed()
	{
		$data['data'] = $this->M_manufacturing->getmanufacturingconfirmed();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id_manufacturing');
        $data=$this->M_manufacturing->getmanufacturingWhereId($id);
        echo json_encode($data);
    }

	public function add() {
		$dat = array(
			'id_manufacturing'	=>	$this->input->post(''),
			'id_product'	=>	$this->input->post('id_product'),
			'id_bom'	=>	$this->input->post('id_bom'),
			'id_user'	=>	$this->input->post('id_user'),
			'quantity'	=>	$this->input->post('quantity'),
			'deadline_start'	=>	$this->input->post('deadline_start'),
			'status'	=>	"confirmed"
		);
		$data = $this->M_manufacturing->insert($dat);
		redirect('C_admin/confirmed');
	}

	public function update(){
		$dat=array(
			'id_manufacturing'=>$this->input->post('id_manufacturing'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'address'=>$this->input->post('address'),
			'phone'=>$this->input->post('phone'),
			'level'=>$this->input->post('level')
		);
		$where=$this->input->post('id_manufacturing');
		$data=$this->M_manufacturing->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('id_manufacturing');
		$data=$this->M_manufacturing->delete($where);
		echo json_encode($data);
	}

	public function checkstok($id_manufacturing) {
		$data['manufacturing'] = $this->M_manufacturing->getmanufacturingid($id_manufacturing);
		$manufacturing_array = $this->M_manufacturing->getmanufacturingid($id_manufacturing);
		foreach($manufacturing_array as $manufacturing){
		    $id_bom = $manufacturing->id_bom;
		    $id_product = $manufacturing->id_product;
		}
		$data['detail_bom'] = $this->M_bom->getdetailbomid($id_bom);
		$this->load->view('menu/manufacturing/checkstok', $data);
	}

	public function produce() {

	}

}