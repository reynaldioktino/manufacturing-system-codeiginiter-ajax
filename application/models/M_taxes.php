<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_taxes extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listtaxes()
	{
		$query=$this->db->query("SELECT * FROM taxes");
		return $query->result();
	}

	public function gettaxes()
	{
		$this->db->select('*');
        $this->db->from('taxes');
        $query = $this->db->get();
        return $query->result();
	}

	public function gettaxesWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM taxes WHERE id_tax='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_tax' => $value->id_tax,
					'tax_name' => $value->tax_name,
					'amount' => $value->amount
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('taxes', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_tax", $where);
		$this->db->update('taxes', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM taxes where id_tax='$where'");
	}
	
}
?>