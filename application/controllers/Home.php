<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    protected function get_model_category() {
        return new Categories;
    }

    public function index() {
        $datas = array();

        $datas['list_category'] = $this->get_model_category()->_get_result();
        $this->load->view('home/index', $datas);
    }

    public function start() {
        echo '<pre>';
        print_r($this->input->post());
        die;
    }
}