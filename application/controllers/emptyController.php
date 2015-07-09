<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xxxxx extends CI_Controller {
	
	public function index(){
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
            //$this->load->model('model_xxxxx');
			//$data['xxxxxData']=$this->model_xxxxx->getAll();
			$data['pageTitle']='Xxxxx Management';
			$this->template->load('templates/template_private', 'xxxxx/index', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

	}


	/*
 	* CRUD Functions
 	******************/

	public function create(){																// [ show create form ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
			//$this->load->model('model_options');
			//$data['optionYN']=$this->model_options->getOptionsYN();

			//$this->load->model('model_options');
			//$data['optBookmarksData']=$this->model_options->getBookmarksCategory();

			$data['pageTitle']='Xxxxx Management';
			$this->template->load('templates/template_private', 'xxxxx/create', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

	}

	public function read(){
		$data = array('title' => '');
		$this->template->load('templates/template_private', 'xxxxx/read', $data);
	}

	public function delete(){
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){

			$xxxxx_id = $this->uri->segment(3);

			//$this->load->model('model_xxxxx');
			//$this->model_xxxxx->delete($xxxxx_id);

			$data['pageTitle']='Bookmarks Deleted';
			$this->template->load('templates/template_private', 'messages/successDelete', $data);


			$data = array('title' => '');
			$this->template->load('templates/template_private', 'xxxxx/delete', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }
	}

	public function update(){																// [ show update form ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){

			$xxxxx_id = $this->uri->segment(3);

			//$this->load->model('model_options');
			//$data['optionYN']=$this->model_options->getOptionsYN();

			//$this->load->model('model_options');
			//$data['optBookmarksCategoryData']=$this->model_options->getBookmarksCategory();

			$this->load->model('model_xxxxx');
			$data['xxxxxData']=$this->model_xxxxx->getDetail($xxxxx_id);

			$data['pageTitle']='Xxxxx Management';
			$this->template->load('templates/template_private', 'xxxxx/update', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

	}
	
	public function details(){
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
		$data = array('title' => '');
		$this->template->load('templates/template_private', 'xxxxx/details', $data);
	}
	
	
/*
 * Database Functions
 *********************/

	public function add(){																// [ insert into DB ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){

			$xxxxxData = array(
				'link' => $_POST['link'],													// [ edit this ]
			);

			//$this->load->model('model_security');
			//$isAllowed = $this->model_security->hasAccess();

			$this->load->model('model_xxxxx');
			$this->model_xxxxx->create($xxxxxData);

			$data['pageTitle']='Xxxxx Created';
			$this->template->load('templates/template_private', 'messages/successCreate', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

	}
	
	public function change(){																// [ update in DB ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){

			$xxxxxData = array(
				'id' => $_POST['id'],														// [ edit this ]
			);

			$this->load->model('model_xxxxx');
			$data['xxxxxData']=$this->model_xxxxx->update($xxxxxData);

			$data['pageTitle']='Bookmarks Management';
			$this->template->load('templates/template_admin', 'messages/successUpdate', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

	}

	function search(){
		$this->load->model('model_options');
		$data['optBookmarksData']=$this->model_options->getBookmarksCategory();

		$data['pageTitle']='Bookmark Search';
		$this->template->load('templates/template_admin', 'forms/search/searchBookmark', $data);

	}

	function results(){
		$this->load->model('model_options');

		$this->load->model('model_xxxxx');
		$data['xxxxxData']=$this->model_xxxxx->search();

		$data['pageTitle']='Bookmark Search Results';
		$this->template->load('templates/template_admin', 'xxxxx/show', $data);

	}
	
	//$this->load->view('welcome_message');
	
}
