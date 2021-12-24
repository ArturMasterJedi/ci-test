<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function make(){
		$this->load->view('template/header');
		$this->load->view('products/add-category');
		$this->load->view('template/footer');
	}

	public function addCategory(){
		$this->form_validation->set_rules('name', 'Название', "required");

		if ($this->form_validation->run()){
			$data = array('name'=>$this->input->post('name'));
			$this->load->model('ProductModel');
			$this->ProductModel->CategoryInsert($data);
			$this->session->set_flashdata('status', 'Добавление категории успешно');
			redirect(base_url('products/add-category'));
		}else{
			echo 'Error';
		}
	}
}
