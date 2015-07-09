<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){
		$data['pageTitle']='Login Page';
		$this->template->load('templates/template_public', 'pages/login', $data);
	}

	public function verify(){
		$this->load->model('model_login');
		$this->model_login->verifyUser();
		$data['pageTitle']='Verify User';
		$this->template->load('templates/template_private', 'pages/test', $data);
	}
	
	//$this->load->view('welcome_message');
	
}
