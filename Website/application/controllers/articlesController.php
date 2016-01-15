<?php
class articlesController extends CI_Controller {
	
	public function index() {
		exec('./application/executables/Test test.txt', $out);
		echo $out[0];
	}
}