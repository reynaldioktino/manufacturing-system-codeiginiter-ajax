<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_grafik extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listUser()
	{
		$query=$this->db->query("SELECT * FROM user LIMIT 5");
		return $query->result();
	}

	public function getUser()
	{
		$this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
	}

	//nampilin di tabel
	public function getManufacturingWhereStatus($where)
	{
		$this->db->SELECT('product.*, manufacturing.*');
		$this->db->FROM('manufacturing');
		$this->db->join('product','product.id_product=manufacturing.id_product');
		$this->db->WHERE('manufacturing.status', $where);
		$query = $this->db->get();
		return $query->result();
	}

	//nampilin di pie
	public function manufacturing_status($where)
	{
		$this->db->SELECT('count(id_manufacturing) AS semua');
		$this->db->FROM('manufacturing');
		$this->db->WHERE('status', $where);
		$query = $this->db->get();
		return $query->row();
	}
	
	//per bulan
	public function manufacturing_bln($month){
		$this->db->SELECT('SUM(quantity) AS semua');
		$this->db->FROM('manufacturing');
		$this->db->WHERE('MONTH(deadline_start)', $month);
		$query = $this->db->get();
		return $query->row();
	}

	//nampilin jml
	public function manufacturing_count()
	{
		$this->db->SELECT('count(id_manufacturing) AS semua');
		$this->db->FROM('manufacturing');
		$query = $this->db->get();
		return $query->row();
	}

	//nampilin jml
	public function user_count()
	{
		$this->db->SELECT('count(id_user) AS semua');
		$this->db->FROM('user');
		$query = $this->db->get();
		return $query->row();
	}

	//nampilin jml
	public function bom_count()
	{
		$this->db->SELECT('count(id_bom) AS semua');
		$this->db->FROM('bom');
		$query = $this->db->get();
		return $query->row();
	}

	//nampilin jml
	public function product_count()
	{
		$this->db->SELECT('count(id_product) AS semua');
		$this->db->FROM('product');
		$query = $this->db->get();
		return $query->row();
	}
}
?>