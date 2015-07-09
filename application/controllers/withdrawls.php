<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdrawls extends CI_Controller {
	
	public function index(){

        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];
        $backAccount = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
            $this->load->model('model_transactions');
            $data['withdrawlData']=$this->model_transactions->getWithdrawlsbyUser($userID);
            $data['pageTitle']='Withdrawls Management';
            $this->template->load('templates/template_private', 'withdrawls/index', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }
	}

	public function create(){
        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
    		$this->load->model('model_support');
            $data['store']=$this->model_support->get_stores();
            $data['categories']=$this->model_support->get_expCategories();
            $data['pageTitle']='Create a New Withdrawl';
    		$this->template->load('templates/template_private', 'withdrawls/create', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }
	}

	public function read(){
        $data['pageTitle']='';
		$this->template->load('templates/template_private', 'withdrawls/read', $data);

	}

	public function update(){
        $data['pageTitle']='';
		$this->template->load('templates/template_private', 'withdrawls/update', $data);

	}

	public function delete(){
        $data['pageTitle']='';
		$this->template->load('templates/template_private', 'withdrawls/delete', $data);

	}
	
	public function details(){
        $data['pageTitle']='';
		$this->template->load('templates/template_private', 'withdrawls/details', $data);

	}
    
    public function add(){                                                                  // [ insert into DB ]

        $withdrawlData = array(
            'userID' => $_POST['userID'],
            'type' => $_POST['type'],
            'transactionFrom' => $_POST['transactionFrom'],             //idk what this is
            'amount' => $_POST['amount'],
            'date' => $_POST['date'],
            'expCategory' => $_POST['expCategory'],
            'bankAccount' => $_POST['bankAccount'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            //'notes' => $_POST['notes']                                // future
        );

        //$this->load->model('model_security');
        //$isAllowed = $this->model_security->hasAccess();

        $this->load->model('model_transactions');
        $this->model_transactions->createWithdrawl($withdrawlData);

        $data['pageTitle']='Withdrawl Created';
        $this->template->load('templates/template_private', 'messages/successCreate', $data);
    }
	
	//$this->load->view('welcome_message');
	
}
