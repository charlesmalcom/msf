<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function index()
	{
		$data['pageTitle']='Welcome to My Simple Finances user';
		$this->template->load('templates/template_private', 'user/index', $data);
	}

	public function create(){
		$data['pageTitle']='';
		$this->template->load('templates/template_private', 'user/create', $data);

	}

	public function read(){
		$data['pageTitle']='';
		$this->template->load('templates/template_private', 'user/read', $data);

	}

	public function delete(){
		$data['pageTitle']='';
		$this->template->load('templates/template_private', 'user/delete', $data);

	}

	public function update(){
		$data['pageTitle']='';
		$this->template->load('templates/template_private', 'user/update', $data);

	}
	
	public function details(){
		$data['pageTitle']='';
		$this->template->load('templates/template_private', 'user/details', $data);

	}
	
	//$this->load->view('welcome_message');
	
}
