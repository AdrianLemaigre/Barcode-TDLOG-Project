<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('article_model');
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('search');
	}

	public function results($filename) {
		$this->load->helper('search');
		$data = array();
		$code = barcode($filename);
		$data = $this->article_model->search($code);
		unlink("file/$filename");

		$this->load->view('header');
		$this->load->view('search');

		if ($code == "NOT DECODED: Not Understood") {
			$this->load->view('bad_image');
		}else if (count($data) == 0) {
			$data['code'] = $code;
			$this->load->view('not_found', $data);
			$this->load->view('new_article', $data);
		} else {
			$this->load->view('result', $data[0]);
		}
	}

	public function upload_file() {
		$status = "";
		$msg = "";
		$filename = 'picture';

		if (empty($_FILES['picture'])) {
			$this->load->view('header');
			$this->load->view('missing_image');
			$this->load->view('search');
			return;
		}

		if ($status != 'error') {
			$config['upload_path'] = 'file/';
			$config['allowed_types'] = 'jpg';
			$config['max_size'] = 1024*8;
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($filename)) {
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			} else {
				$data = $this->upload->data();
				$filename = $data['file_name'];
			}

			@unlink($_FILES[$filename]);
		}

		if ($status == 'error') {
			$this->load->view('header');
			$this->load->view('search');
			$this->load->view('bad_image');
		} else {
			$this->results($filename);
		}
	}

	public function upload_article() {
		$this->article_model->post_article(
			$this->input->post('name'),
			$this->input->post('barcode'),
			(int)$this->input->post('price'),
			(int)$this->input->post('disponibility'),
			$this->input->post('description'),
			$this->input->post('data'));

		$this->load->view('header');
		$this->load->view('search');
	}

	public function about() {
		$this->load->view('header');
		$this->load->view('about');
	}

	public function contact() {
		$this->load->view('header');
		$this->load->view('contact');
	}

	public function add_article() {
		$this->load->view('header');
		$this->load->view('new_article', array('code' => ''));
	}
}
