<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_product extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_product');
		$this->load->model('M_product_category');
		$this->load->model('M_taxes');

		if($this->session->userdata('level') != "1") {  
			redirect('');  
		}
	} 

	public function getAjax()
	{
		$data['data'] = $this->M_product->getproduct();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id_product');
        $data=$this->M_product->getstokWhereId($id);
        echo json_encode($data);
    }

	public function add() {
		$upload=$this->M_product->upload();
		if($upload['result']=="success"){
			$data = array(
				'id_product'	=>	$this->input->post(''),
				'product_name'	=>	$this->input->post('product_name'),
				'product_type'	=>	$this->input->post('product_type'),
				'sales_price'	=>	$this->input->post('sales_price'),
				'id_tax'	=>	$this->input->post('id_tax'),
				'id_product_category'	=>	$this->input->post('id_product_category'),
				'stok'	=>	"0",
				'internal_notes'	=>	$this->input->post('internal_notes'),
				'foto'=> $upload['file']['file_name']
			);
			$level=1;
			$this->M_product->insert($data);
			redirect('C_admin/product');
		}else{
			$data['message']=$upload['error'];
			$this->load->view('menu/product', $data);
		}
	}

	public function loadDelete($id){
		$data['record']=$this->M_product->getproductWhereId($id);//record dari getBiodata
		$this->load->view('menu/product/delete', $data);
	}

	public function loadEdit($id){
		$data['product_category']=$this->M_product_category->listproduct_category();
		$data['taxes']=$this->M_taxes->listtaxes();
		$data['record']=$this->M_product->getproductWhereId($id);//record dari getBiodata
		$this->load->view('menu/product/edit', $data);
	}

	public function update()
	{
		if($_FILES['foto']['name']!="") //"foto" name dari input file, "name" itu punyanya $_FILES jdi ada tmp_name dll
		{
			$upload=$this->M_product->upload();
			if($upload['result']=="success"){
				$image_name=$upload['file']['file_name'];
			}else{
				$data['message']=$upload['error'];
				$this->load->view('product', $data);
			}
		}
		else{
			$image_name=$this->input->post('foto_old');
		}

		$data = array(
			'id_product'	=>	$this->input->post('id_product'),
			'product_name'	=>	$this->input->post('product_name'),
			'product_type'	=>	$this->input->post('product_type'),
			'sales_price'	=>	$this->input->post('sales_price'),
			'id_tax'	=>	$this->input->post('id_tax'),
			'id_product_category'	=>	$this->input->post('id_product_category'),
			'internal_notes'	=>	$this->input->post('internal_notes'),
			'foto'=> $image_name
		);
		$where=$this->input->post('id_product');
		$this->M_product->update($data, $where);
		redirect('C_admin/product');
	}

	public function updatestok(){
		$dat=array(
			'id_product'=>$this->input->post('id_product'),
			'product_name'=>$this->input->post('product_name'),
			'stok'=>$this->input->post('stok')
		);
		$where=$this->input->post('id_product');
		$data=$this->M_product->updatestok($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->uri->segment(3);
		$photo=$this->M_product->dropFoto($where);
		if ($photo->num_rows() > 0)
		{
			$row = $photo->row();
			$file_photo = $row->foto;
			$path_file = './foto/';
			unlink($path_file.$file_photo);
			$this->M_product->delete($where);
		}
		redirect('C_admin/product');
	}

}