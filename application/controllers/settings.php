<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function index()
	{
		$data['pageTitle']='Settings';
		$this->template->load('templates/template_private', 'pages/settings', $data);
	}	
	
	//$this->load->view('welcome_message');
	
}
