<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product_category extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getproduct_category()
	{
		$this->db->select('*');
        $this->db->from('product_category');
        $query = $this->db->get();
        return $query->result();
	}

	public function getproduct_categoryWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM product_category WHERE id_product_category='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_product_category' => $value->id_product_category,
					'name_category' => $value->name_category,
					'strategy' => $value->strategy
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('product_category', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_product_category", $where);
		$this->db->update('product_category', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM product_category where id_product_category='$where'");
	}
	
}
?>