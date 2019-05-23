<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bom extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listbom()
	{
		$query=$this->db->query("SELECT bom.*, product.product_name as pn FROM bom INNER JOIN product on product.id_product=bom.id_product");
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

	function product_bom($id) {
		$this->db->select('bom.*, product.product_name as pn, product.foto as fp');
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


	public function getbomdetail()
	{
		$this->db->select('detail_bom.*, product.product_name as pn');
        $this->db->from('detail_bom');
        $this->db->join('product','product.id_product=detail_bom.id_product');
        $query = $this->db->get();
        return $query->result();
	}

	public function insertdetail($data)
	{
		$this->db->insert('detail_bom', $data);
	}

	public function deletedetail($where){
		$this->db->query("DELETE FROM detail_bom where id_detail_bom='$where'");
	}

	public function getdetailbomWhereId($where)
	{
		$query=$this->db->query("SELECT detail_bom.*, product.product_name as pn FROM detail_bom INNER JOIN product ON product.id_product=detail_bom.id_product WHERE id_detail_bom='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_detail_bom' => $value->id_detail_bom,
					'pn' => $value->pn,
					'quantity' => $value->quantity
				);
			}
		}
		return $data;
	}

	public function updatedetail($data, $where){
		$this->db->set($data);
		$this->db->where('id_detail_bom', $where);
		$this->db->update('detail_bom', $data);
	}
	

	public function getdetailbomid($id_bom) {
		$this->db->select('detail_bom.*, product.product_name as pn, product.stok as sp');
        $this->db->from('detail_bom');
        $this->db->join('product','product.id_product=detail_bom.id_product');
        $this->db->where('id_bom', $id_bom);
        $query = $this->db->get();
        return $query->result();
	}
}
?>