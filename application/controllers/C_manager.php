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
		$this->load->model('M_grafik');

		if($this->session->userdata('level') != "2") {  
			redirect('');  
		}
	} 

	public function index()
	{
		$data = array(
			'user' => $this->M_grafik->listUser(),
			'manufacturing_confirmed'=> $this->M_grafik->getManufacturingWhereStatus('confirmed'),
			'manufacturing_produce'=> $this->M_grafik->getManufacturingWhereStatus('produce'),
			'manufacturing_done'=> $this->M_grafik->getManufacturingWhereStatus('done'),
			'manuf_confirmed'=> $this->M_grafik->manufacturing_status('confirmed'),
			'manuf_produce'=> $this->M_grafik->manufacturing_status('produce'),
			'manuf_done'=> $this->M_grafik->manufacturing_status('done'),
			'manufacturing_count'=> $this->M_grafik->manufacturing_count(),
			'product_count'=> $this->M_grafik->product_count(),
			'bom_count'=> $this->M_grafik->bom_count(),
			'user_count'=> $this->M_grafik->user_count(),
			'manufacturing_jan' => $this->M_grafik->manufacturing_bln(1),
			'manufacturing_feb' => $this->M_grafik->manufacturing_bln(2),
			'manufacturing_mar' => $this->M_grafik->manufacturing_bln(3),
			'manufacturing_apr' => $this->M_grafik->manufacturing_bln(4),
			'manufacturing_mei' => $this->M_grafik->manufacturing_bln(5),
			'manufacturing_jun' => $this->M_grafik->manufacturing_bln(6),
			'manufacturing_jul' => $this->M_grafik->manufacturing_bln(7),
			'manufacturing_agu' => $this->M_grafik->manufacturing_bln(8),
			'manufacturing_sep' => $this->M_grafik->manufacturing_bln(9),
			'manufacturing_okt' => $this->M_grafik->manufacturing_bln(10),
			'manufacturing_nov' => $this->M_grafik->manufacturing_bln(11),
			'manufacturing_des' => $this->M_grafik->manufacturing_bln(12)
		);
		$this->load->view('menu/index', $data);
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