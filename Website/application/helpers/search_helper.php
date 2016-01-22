<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('barcode')) {
	function barcode($filename) {
        var_dump(PHP_OS);
		exec("./application/executables/Test file/$filename", $out);
        var_dump($out);
		return $out[0];
	}
}
