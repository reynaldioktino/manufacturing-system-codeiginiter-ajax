<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bom extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listbom()
	{
		$query=$this->db->query("SELECT * FROM bom");
		return $query->result();
	}

	public function getbom()
	{
		$this->db->select('bom.*, product.product_name as pn');
        $this->db->from('bom');
        $this->db->join('product','product.id_product=bom.id_product');
        $query = $this->db->get();
        return $query->result();
	}

	public function getbomWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM bom WHERE id_bom='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_bom' => $value->id_bom,
					'id_product' => $value->id_product,
					'quantity' => $value->quantity,
					'bom_type' => $value->bom_type
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('bom', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where('id_bom', $where);
		$this->db->update('bom', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM bom where id_bom='$where'");
	}
	
}
?>