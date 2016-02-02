<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function index() {
		$this->load->view('index');
	}

	public function results($filename) {
		$this->load->model('article_model');
		$this->load->helper('search');
		$data = array();
		$code = barcode($filename);
		$data = $this->article_model->search($code);
		unlink("file/$filename");

		$this->load->view('index');

		if (count($data) == 0) {
			$data['code'] = $code;
			$this->load->view('not_found', $data);
		} else {
			$this->load->view('result', $data[0]);
		}
	}

	public function upload_file() {
		$status = "";
		$msg = "";
		$filename = 'picture';

		if (empty($_FILES['picture'])) {
			$this->load->view('MissingImage');
			$this->load->view('index');
			return;
		}

		if ($status != 'error') {
			$config['upload_path'] = 'file/';
			$config['allowed_types'] = 'png|jpg';
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
			echo json_encode(array('status' => $status, 'msg' => $msg));
		} else {
			$this->results($filename);
		}
	}

	public function upload_article() {
		$this->load->model('article_model');
		$this->article_model->post_article(
			$this->input->post('name'),
			$this->input->post('barcode'),
			(int)$this->input->post('price'),
			(int)$this->input->post('disponibility'),
			$this->input->post('description'),
			$this->input->post('data'));
		$this->load->view('index');
	}
}
