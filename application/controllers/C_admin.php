<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		// $this->load->model('M_login');
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

}
