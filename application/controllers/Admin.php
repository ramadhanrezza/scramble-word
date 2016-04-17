<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	protected function get_model_admin() {
		return new Admins;
	}
	protected function get_model_category() {
		return new Categories;
	}
	protected function get_model_word() {
		return new Words;
	}

	public function index() {
		if ($this->session->userdata('admin_login') === null) {
			redirect('admin/login');
		}

		$datas = array();
		$datas['error'] = false;
		if ($this->uri->segment(2) == 'edit') {
			$datas['edit_data'] = $this->get_model_word()->_get_result_one(null, array('id' => $this->input->get('id')));
		}
		if ($this->uri->segment(2) == 'delete') {
			$this->get_model_word()->delete(array('id' => $this->input->get('id')));
			redirect('admin');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$postdata = $this->input->post();
			if ($postdata['category'] == '') {
				$datas['error'] = true;					
				$datas['err_category'] = array(
					'div'  => 'has-error has-feedback',
				);
			} 
			if ($postdata['word'] == '') {
				$datas['error'] = true;
				$datas['err_word'] = array(
					'div'  => 'has-error has-feedback',
					'span' => 'glyphicon glyphicon-remove form-control-feedback'
				);
			}
			if ($postdata['type'] == 'add') {
				if (! $datas['error']) {
					$this->get_model_word()->save(array(
						'category_id' 	=> $postdata['category'],
						'word'	   		=> strtolower($postdata['word']),
						'created'  		=> date('Y-m-d H:i:s')
					));
					redirect('admin');
				}
			}
			if ($postdata['type'] == 'edit') {
				if (! $datas['error']) {
					$this->get_model_word()->edit(array(
						'category_id' 	=> $postdata['category'],
						'word'	   		=> strtolower($postdata['word']),
						'created'  		=> date('Y-m-d H:i:s')
					), array('id' => $this->input->get('id')));
					redirect('admin');
				}	
			}
		}

		$datas['list_word'] = $this->get_model_word()->_get_result('sw_words.id as word_id, word, name', null, array('sw_category' => 'sw_category.id = sw_words.category_id'), array('category_id' => 'asc', 'sw_words.id' => 'asc'));
		$datas['list_category'] = $this->get_model_category()->_get_result();

		$this->load->view('admin/index', $datas);
	}

	public function login() {
		$datas = array();
		$datas['error'] = false;

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$postdata = $this->input->post();
			$login_data = $this->get_model_admin()->_get_result_one(null, array('username' => $postdata['username'], 'password' => sha1($postdata['password'])));
			
			if ($login_data) {
				$this->session->set_userdata('admin_login', $login_data);
				redirect('admin');
			} else {
				$datas['error'] = true;
			}
		}

		$this->load->view('admin/login', $datas);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}