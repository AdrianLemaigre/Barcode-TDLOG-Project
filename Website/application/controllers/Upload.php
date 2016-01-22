<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function index() {
		$this->load->view('index');
	}

	public function results($filename) {
		$this->load->helper('search');
		$data = array();
		$data['result'] = '01221922291';

		$this->load->view('index');
		$this->load->view('result', $data);
		unlink("file/$filename");
	}

	public function upload_file() {
		$status = "";
		$msg = "";
		$filename = 'picture';

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

			echo $filename;
			@unlink($_FILES[$filename]);
		}

		if ($status == 'error') {
			echo json_encode(array('status' => $status, 'msg' => $msg));
		} else {
			$this->results($filename);
		}
	}
}
