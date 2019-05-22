<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listproduct()
	{
		$query=$this->db->query("SELECT * FROM product");
		return $query->result();
	}

	public function getproduct()
	{
		$this->db->select('product.*, taxes.tax_name as tax, product_category.name_category as category');
        $this->db->from('product');
        $this->db->join('taxes','taxes.id_tax=product.id_tax');
        $this->db->join('product_category','product_category.id_product_category=product.id_product_category');
        $query = $this->db->get();
        return $query->result();
	}

	public function getproductWhereId($id)
	{
		$query=$this->db->query("SELECT * FROM product where id_product='$id'");
		return $query->result();
	}

	public function getstokWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM product WHERE id_product='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_product' => $value->id_product,
					'product_name' => $value->product_name,
					'stok' => $value->stok
				);
			}
		}
		return $data;
	}

	public function upload(){
		$config['upload_path']='./foto/'; //folder foto
		$config['allowed_types']='jpg|png|jpeg|';
		$config['max_size']='2048';
		$config['remove_space']=TRUE;

		$this->load->library('upload', $config);//konfig upload
		if($this->upload->do_upload('foto')){
			//jika berhasil upload
			$return = array('result'=>'success','file'=>$this->upload->data(),'error'=>'');
			return $return;
		}else{  
		// Jika gagal :  
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());  
			return $return;
		}
	}

	public function dropFoto($where){
		$this->db->where('id_product',$where);
		$query = $getData = $this->db->get('product');
		if($getData->num_rows() > 0)
			return $query;
		else
			return null;
	}

	public function insert($data)
	{
		$this->db->insert('product', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_product", $where);
		$this->db->update('product', $data);
	}

	public function updatestok($data, $where){
		$this->db->set($data);
		$this->db->where("id_product", $where);
		$this->db->update('product', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM product where id_product='$where'");
	}
	
}
?>