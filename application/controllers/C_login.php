<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('M_login');
		$this->load->library(array('session'));
	} 

	public function index()
	{
		if($this->session->userdata('level') == "1") {  
			redirect(base_url('C_admin'));  
		} else if ($this->session->userdata('level') == "2") {
			redirect(base_url('C_manager')); 
		}
	}

	public function aksi_login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$cek=$this->M_login->cek_login($email,$password);
		if($cek>0){//jika ada ditabel
			$data_session=array(
					'email'=>$cek->email,
					'level'=> $cek->level,
					'name' => $cek->name
				);
			$this->session->set_userdata($data_session);  
			if($this->session->userdata('level')==1) {   
				redirect('C_admin');  
			}elseif($this->session->userdata('level')==2) {   
				redirect('C_manager');  
			}

		}else{
			echo "<script type=\"text/javascript\"> alert('email dan password salah!'); </script>";
			redirect('');
		}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
}
