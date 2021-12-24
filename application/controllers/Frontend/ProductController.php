<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('ProductModel');
	}

	public function visible(){
		$this->load->view('template/header');
		$this->load->model('ProductModel');
		$data['products'] = $this->ProductModel->getProduct();
		$data['category'] = $this->ProductModel->getCategory();

		$this->load->view('products/index', $data);
		$this->load->view('template/footer');
	}


	public function create(){
		$this->load->view('template/header');
		$this->load->model('ProductModel');
		$data['category'] = $this->ProductModel->getCategory();
		$this->load->view('products/create', $data);
		$this->load->view('template/footer');
	}

	public function store(){
		$this->form_validation->set_rules('name', 'Название', 'required');
		$this->form_validation->set_rules('description', 'Описание', 'required');
		$this->form_validation->set_rules('price', 'Цена товара', 'required');
		$this->form_validation->set_rules('category', 'Категория', 'required');

		if ($this->form_validation->run()){
			$ori_filename = $_FILES['name_image']['name'];
			$new_name = time()."".str_replace(' ', '-', $ori_filename);
			$config['upload_path']          = './image/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['file_name']            = $new_name;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('name_image')){
				$imageError = array('imageError' => $this->upload->display_errors());
				$this->load->view('template/header');
				$this->load->view('products/create', $imageError);
				$this->load->view('template/footer');
			}else{
				$prod_filename = $this->upload->data('file_name');
				$date_time = new DateTime();
				$data = [
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'price' => $this->input->post('price'),
					'prod_image' => $prod_filename,
					'data_time' => $date_time->format('Y-m-d H:i:s'),
					'category' => $this->input->post('category'),
				];
				echo $data['prod_image'];
				$this->load->model('ProductModel');
				$product = new ProductModel();
				$res = $product->ProductInsert($data);
				$this->session->set_flashdata('status', 'Добавление успешное');
				redirect(base_url('products/add'));
			}
		}else{
			$this->create();
		}
	}

	public function delete($id){
		$product = new Edit_model();
		if ($product->cheackProductImage($id)){
			$data = $product->cheackProductImage($id);
			if (file_exists("./image/".$data->prod_image)){
				unlink("./image/".$data->prod_image);
			}
			$product->delete($id);
			$this->session->set_flashdata('status', 'Удаление успешно');
			redirect(base_url('products/index'));
		}
	}

	public function buyed($id){
		$product = new Edit_model();
		$product->updateStatus($id);
		$this->session->set_flashdata('status', 'Запись помечена как куплена');
		redirect(base_url('products/index'));
	}
}
