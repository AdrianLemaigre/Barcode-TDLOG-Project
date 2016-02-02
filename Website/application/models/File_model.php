<?php

class File_model extends CI_Model {

	function __construct() {
		parent :: __construct();
	}

	public function post_file($filename, $title) {
		$data = array('picture' => $filename, 'title' => $title);
		$this->db->insert('images', $data);
		return $this->db->insert_id();
	}

}
