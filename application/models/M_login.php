<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

	function cek_login($email, $password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		return $this->db->get()->row();
	}

	function getIdUser($email) {
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}

}
 ?>
