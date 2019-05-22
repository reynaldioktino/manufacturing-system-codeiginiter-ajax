<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('M_product_category');
		$this->load->model('M_taxes');
		$this->load->model('M_product');
		// $this->load->library(array('session'));
		// $this->load->library('user_agent'); //deklarasi mengaktifkan library pagination
		if($this->session->userdata('level') != "1") {  
			redirect('');  
		}
	} 

	public function index()
	{
		$this->load->view('menu/index');
	}

	public function user() {
		$this->load->view('menu/user');
	}

	public function adduser()
	{
		$this->load->view('menu/adduser');
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

}
