<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function index(){																// [ Default Method ]
		$this->load->model('model_support');
		$data['surname']=$this->model_support->get_surname();
		$data['suffix']=$this->model_support->get_suffix();
		$data['phoneCarriers']=$this->model_support->get_phoneCarriers();
		$data['accountType']=$this->model_support->get_accountType();
		$data['pageTitle']='Signup';
		$this->template->load('templates/template_public', 'pages/signup', $data);
	}
	
	public function enter(){
		$this->load->model('model_signup');
		$data['signupData']=$this->model_signup->signup();
		$data['pageTitle']='Confirm Account';
		$this->template->load('templates/template_private', 'pages/confirm', $data);
	}
	
	public function confirm(){																// [ Confirm Email Address ]
		$user = $this->uri->segment(3);
		$url = $this->uri->segment(4);
		$this->load->model('model_signup');
		$data['signupData']=$this->model_signup->confirm($user, $url);
		
		if ($data['signupData'] == '0'){
			$data['pageTitle']='Confirm Account Error';
			$this->template->load('templates/template_private', 'messages/accountConfirmError', $data);
		  }
		else if ($data['signupData'] == '1'){ 
			$data['pageTitle']='Confirm Account';
			$this->template->load('templates/template_public', 'messages/accountConfirm', $data);
		 }
		
	}
	
	public function process(){																// [ Enter Data into Database ]
		$signupData = array(
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'surname' => $_POST['surname'],
				'firstName' => $_POST['firstName'],
				'middleName' => $_POST['middleName'],
				'lastName' => $_POST['lastName'],
				'suffix' => $_POST['suffix'],
				'phoneNumber' => $_POST['phoneNumber'],
				'phoneCarrier' => $_POST['phoneCarrier'],
				'email' => $_POST['email'],
				'allowEmail' => $_POST['allowEmail'],
				'allowText' => $_POST['allowText'],
				'accountType' => $_POST['accountType'],
				'accountStatus' => $_POST['accountStatus'],
				'globalStatus' => $_POST['globalStatus'],
				'random' => $_POST['random']
			);

		
		$this->load->model('model_signup');
		$this->model_signup->createUser($signupData);										//put data into database
		
		if ($_POST['accountType'] == 'paid'){												//check to see if account type is free or paid
			$ccData = array(
				'userID' => $_POST[''],					//previous array needs to return this
				'ccName' => $_POST['ccName'],
				'ccNum' => $_POST['ccNum'],
				'ccExp' => $_POST['ccExp'],
				'ccCcv' => $_POST['ccCcv'],
				'ccType' => $_POST['ccType']
			);

			$this->model_signup->createCC($ccData);											//put data into database
		}


		$this->load->model('model_email');
		//$this->model_email->emailConfirm();													//confirm email
		$this->model_email->emailSend();													//fire off confirmation email



		$data['pageTitle']='Signup Completed';
		$this->template->load('templates/template_public', 'messages/successCreate', $data);




	}
	
	//$this->load->view('welcome_message');
	
}
