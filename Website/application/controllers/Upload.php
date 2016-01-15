<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function index() {
		$this->load->view('index');
	}

	public function upload_file() {
		$status = "";
		$msg = "";
		$filename = 'picture';

		if (empty($_POST['title'])) {
			$status = "error";
			$msg = "Please enter title";
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
				$this->load->model('file_model');
				$data = $this->upload->data();
				$file_id = $this->file_model->post_file($data['file_name'], $_POST['title']);

				if ($file_id) {
					redirect("Upload/results/$filename");
				} else {
					unlink($data['full_path']);
					$status = 'error';
					$msg = 'please try again';
				}
			}

			@unlink($_FILES[$filename]);
		}

		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	public function results($filename) {
		$this->load->helper('search');
		$data = array();
		$data['result'] = barcode($filename);

		$this->load->view('index');
		$this->load->view('result', $data);
	}
}