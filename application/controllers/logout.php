<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	public function index()
	{
		$data['pageTitle']='Logout of My Simple Finances';
		$this->template->load('templates/template_public', 'pages/logout', $data);
	}
	
	//$this->load->view('welcome_message');
	
}
