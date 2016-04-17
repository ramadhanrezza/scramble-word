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

        // echo $this->input->server('REQUEST_URI');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $query = 'start?category=' . $this->input->post('category');

            redirect($query);
        }


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
        $datas = array();
        if (! isset($_GET['category'])) { 
            redirect('');
        } 

        $this->load->view('home/start', $datas);
    }

    public function search() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $filters = null;
            $postdata = $this->input->post();
            if ($postdata['category'] != 0) {
                $filters['category_id'] = $postdata['category'];
            }
            if ($postdata['type'] == 'get_data') {
                $filters['id'] = rand(1, $this->get_model_word()->_get_count($filters));
                $data = $this->get_model_word()->_get_result_one(null, $filters);
                $data->scramble = $this->getrandomstring($data->word);

                echo json_encode($data);
                die;
            }
            if ($postdata['type'] == 'check_answer') {
                $result = $this->get_model_word()->_get_count(array('id' => $postdata['question'], 'word' => $postdata['answer']));

                $data = new stdClass();
                if ($result > 0) {
                    $data->success = true;
                } else {
                    $data->success = false;
                }

                echo json_encode($data);
                die;
            }           
        } 
        print_r($_POST);
        die;
    }
}