<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('barcode')) {
	function barcode($filename) {
		exec("./application/executables/Test file/$filename", $out);
		return $out[0];
	}
}
