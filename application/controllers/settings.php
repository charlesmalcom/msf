<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function index()	{
		$sessionData = $this->session->all_userdata();
		$userID = $sessionData['0']['id'];

		$logged_in = $this->input->cookie('logged_in');
		if ($logged_in == TRUE){
			$this->load->model('model_users');
			$data['userData']=$this->model_users->getUser($userID);

			$this->load->model('model_accounts');
			$data['accountData']=$this->model_accounts->getAccountsbyUser($userID);

			$data['pageTitle']='Settings';
			$this->template->load('templates/template_private', 'pages/settings', $data);
		} else {
			$data['pageTitle']='Error';
			$this->template->load('templates/template_private', 'messages/error', $data);
		}
	}	
	
	//$this->load->view('welcome_message');
	
}
