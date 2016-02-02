<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('barcode')) {
    function barcode($filename) {
        $ci = get_instance();
        $ci->load->model('article_model');

        exec("./application/executables/Test file/$filename", $out);
        $results = $ci->article_model->search($out[0]);
        return $results;
    }
}
