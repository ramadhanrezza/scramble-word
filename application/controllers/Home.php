<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    protected function get_model_category() {
        return new Categories;
    }
    protected function get_model_word() {
        return new Words;
    }

    public function index() {
        $datas = array();

        $datas['list_category'] = $this->get_model_category()->_get_result();
        $this->load->view('home/index', $datas);
    }

    protected function getrandomstring($text) {
        $words = preg_split('//', $text, -1);
        shuffle($words);
        $_text = '';
        foreach($words as $word) {
            $_text .= $word;
        }
        return $_text;
    }

    public function start() {
        $postdata = $this->input->post();

        $filters = null;
        if ($postdata['category'] != 0) {
            $filters['category_id'] = $postdata['category'];
        }
        $result = $this->get_model_word()->_get_result(null, $filters);
        if (count($result) > 0) {
            foreach ($result as $idx=>$val) {
                $result[$idx]['scramble'] = $this->getrandomstring($val['word']);
            }
        }


        echo '<pre>';
        print_r($postdata);
        print_r($result);
        die;
    }
}