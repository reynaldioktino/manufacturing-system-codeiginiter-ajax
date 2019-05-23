<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listuser()
	{
		$query=$this->db->query("SELECT * FROM user");
		return $query->result();
	}

	public function getuser()
	{
		$this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
	}

	public function getuserWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM user WHERE id_user='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_user' => $value->id_user,
					'name' => $value->name,
					'email' => $value->email,
					'password' => $value->password,
					'address' => $value->address,
					'phone' => $value->phone,
					'level' => $value->level
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('user', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_user", $where);
		$this->db->update('user', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM user where id_user='$where'");
	}
	
}
?>