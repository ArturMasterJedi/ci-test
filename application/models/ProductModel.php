<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getProduct(){
		$query = $this->db->get('product');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getCategory(){
		$queryCat = $this->db->get('category');
		if ($queryCat->num_rows > 0){
			return $queryCat->result();
		}
		return $queryCat->result();

	}

	public function CategoryInsert($data){
		return $this->db->insert('category', $data);
	}

	public function ProductInsert($data)
	{
		return $this->db->insert('product', $data);
	}

}
