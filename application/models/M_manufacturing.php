<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manufacturing extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listmanufacturing()
	{
		$query=$this->db->query("SELECT * FROM manufacturing");
		return $query->result();
	}

	public function getmanufacturing()
	{
		$this->db->select('*');
        $this->db->from('manufacturing');
        $query = $this->db->get();
        return $query->result();
	}

	public function getmanufacturingconfirmed()
	{
		$this->db->select('manufacturing.*, product.product_name as pn, user.name as un');
        $this->db->from('manufacturing');
        $this->db->join('product','product.id_product=manufacturing.id_product');
        $this->db->join('user','user.id_user=manufacturing.id_user');
        $this->db->order_by('id_manufacturing', 'desc');
        $query = $this->db->get();
        return $query->result();
	}

	public function getmanufacturingWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM manufacturing WHERE id_manufacturing='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_manufacturing' => $value->id_manufacturing,
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
		$this->db->insert('manufacturing', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_manufacturing", $where);
		$this->db->update('manufacturing', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM manufacturing where id_manufacturing='$where'");
	}
	
}
?>