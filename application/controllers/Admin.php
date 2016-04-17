<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	protected function get_model_admin() {
		return new Admins;
	}

	public function index() {
		if ($this->session->userdata('admin_login') === null) {
			redirect('admin/login');
		}
		
		$this->load->view('admin/index');
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