<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deposits extends CI_Controller {
    
    public function index(){
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
            $this->load->model('model_transactions');
            $data['depositsData']=$this->model_transactions->getDepositsbyUser($userID);
            $data['pageTitle']='Deposits Management';
            $this->template->load('templates/template_private', 'deposits/index', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

    }


    /*
    * CRUD Functions
    ******************/

    public function create(){                                                           // [ show create form ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
            $this->load->model('model_support');
            $data['stores']=$this->model_support->get_stores();
            $data['categories']=$this->model_support->get_expCategories();
            $data['depositor']=$this->model_support->get_depositor();
            $data['pageTitle']='Create a New Deposit';
            $this->template->load('templates/template_private', 'deposits/create', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

    }

    public function read(){
        $data['pageTitle']='';
        $this->template->load('templates/template_private', 'deposits/read', $data);
    }

    public function update(){                                                               // [ show update form ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
            $deposits_id = $this->uri->segment(3);

            //$this->load->model('model_options');
            //$data['optionYN']=$this->model_options->getOptionsYN();

            //$this->load->model('model_options');
            //$data['optBookmarksCategoryData']=$this->model_options->getBookmarksCategory();

            $this->load->model('model_transactions');
            $data['depositsData']=$this->model_transactions->getDetail($deposits_id);

            $data['pageTitle']='Update a Deposit';
            $this->template->load('templates/template_private', 'deposits/update', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

    }

    public function delete(){
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){
            $deposits_id = $this->uri->segment(3);

            //$this->load->model('model_deposits');
            //$this->model_deposits->delete($deposits_id);

            $data['pageTitle']='Bookmarks Deleted';
            $this->template->load('templates/template_private', 'messages/successDelete', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

    }
    
    public function details(){
        $data = array('title' => '');
        $this->template->load('templates/template_private', 'deposits/details', $data);
    }
    
    
/*
 * Database Functions
 *********************/
    
    public function add(){                                                                  // [ insert into DB ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){

            $depositData = array(
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
            $this->model_transactions->createDeposit($depositData);

            $data['pageTitle']='Deposits Created';
            $this->template->load('templates/template_private', 'messages/successCreate', $data);
        } else {
            $data['pageTitle']='Error';
            $this->template->load('templates/template_private', 'messages/error', $data);
        }

    }
    
    public function change(){                                                               // [ update in DB ]
        $sessionData = $this->session->all_userdata();
        $userID = $sessionData['0']['id'];

        $logged_in = $this->input->cookie('logged_in');
        if ($logged_in == TRUE){

            $depositsData = array(
                'type' => $_POST['type'],
                'transactionFrom' => $_POST['transactionFrom'],             //idk what this is
                'amount' => $_POST['amount'],
                'date' => $_POST['date'],
                'expCategory' => $_POST['expCategory'],
                'accountID' => $_POST['accountID'],
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                //'notes' => $_POST['notes']                                // future
            );

            $this->load->model('model_deposits');                              /* CALL MODEL */
            $data['depositsData']=$this->model_deposits->update($depositsData);  /* GET DATA FROM MODEL & PASS TO VIEW */

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
        $this->load->model('model_deposits');
        $data['depositsData']=$this->model_deposits->search();
        $data['pageTitle']='Bookmark Search Results';
        $this->template->load('templates/template_admin', 'deposits/show', $data);
    }
    

    // idk about this junk yet //

    // validation fields
    function _set_fields(){
        $fields['id'] = 'id';
        $fields['name'] = 'name';
        $fields['gender'] = 'gender';
        $fields['dob'] = 'dob';
         
        $this->validation->set_fields($fields);
    }

    // validation rules
    function _set_rules(){
        $rules['name'] = 'trim|required';
        $rules['gender'] = 'trim|required';
        $rules['dob'] = 'trim|required|callback_valid_date';
         
        $this->validation->set_rules($rules);
         
        $this->validation->set_message('required', '* required');
        $this->validation->set_message('isset', '* required');
        $this->validation->set_error_delimiters('<p class="error">', '</p>');
    }
     
    // date_validation callback
    function valid_date($str)
    {
        if(!ereg("^(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})$", $str))
        {
            $this->validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
            return false;
        }
        else
        {
            return true;
        }
    }
    
    //$this->load->view('welcome_message');
    
}
