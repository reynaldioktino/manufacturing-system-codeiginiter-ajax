<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manager extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('M_product_category');
		$this->load->model('M_taxes');
		$this->load->model('M_product');
		$this->load->model('M_bom');
		$this->load->model('M_user');
		$this->load->model('M_manufacturing');

		if($this->session->userdata('level') != "2") {  
			redirect('');  
		}
	} 

	public function index()
	{
		$this->load->view('menu/index');
	}

	public function productcategory() {
		$this->load->view('menu/productcategory');
	}

	public function taxes() {
		$this->load->view('menu/taxes');
	}

	public function product() {
		$data['product_category']=$this->M_product_category->listproduct_category();
		$data['taxes']=$this->M_taxes->listtaxes();
		$this->load->view('menu/product', $data);
	}

	public function bom() {
		$data['product']=$this->M_product->listproduct();
		$this->load->view('menu/bom', $data);
	}

	public function createmanufacturing() {
		$data['product']=$this->M_product->listproduct();
		$data['bom']=$this->M_bom->listbom();
		$data['user']=$this->M_user->listuser();
		$this->load->view('menu/manufacturing/create', $data);
	}

	public function confirmed() {
		$this->load->view('menu/manufacturing/confirmed');
	}

	public function produce() {
		$this->load->view('menu/manufacturing/produce');
	}

	public function done() {
		$this->load->view('menu/manufacturing/done');
	}

	public function manufacturing() {
		$data['manufacturing']=$this->M_manufacturing->getmanufacturing();
		$this->load->view('menu/manufacturing/manufacturing', $data);
	}

}