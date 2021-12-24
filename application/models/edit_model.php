<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function cheackProductImage($id){
		$query = $this->db->get_where('product', ['id' => $id]);
		return $query->row();
	}

	public function delete($id){
		return $this->db->delete('product', ['id' => $id]);
	}

	public function updateStatus($id){
		$data = [
			'status' => 1,
		];
		$this->db->where('id', $id);
		return $this->db->update('product', $data);
	}
}
?>
