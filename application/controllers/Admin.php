<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->session->set_userdata('admin_login', null);
	}

	public function index() {
		if ($this->session->userdata('admin_login') === null) {
			redirect('admin/login');
		}
		die('udah login');
	}

	public function login() {
		$datas = array();

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$postdata = $this->input->post();
			echo '<pre>';
			print_r($postdata);
			die;
		}

		$this->load->view('admin/login');
	}
}