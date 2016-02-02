<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('barcode')) {
    function barcode($filename) {
        exec("./application/executables/decoder -b file/$filename", $out);
        return $out[0];
    }
}
