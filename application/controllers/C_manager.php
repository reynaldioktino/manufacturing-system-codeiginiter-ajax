<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manager extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		// $this->load->model('M_login');
		// $this->load->library(array('session'));
		// $this->load->library('user_agent'); //deklarasi mengaktifkan library pagination
		if($this->session->userdata('level') != "2") {  
			redirect('');  
		}
	} 

	public function index()
	{
		$this->load->view('menu/index');
	}

}