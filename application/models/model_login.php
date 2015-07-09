<?php

class Model_Login extends CI_Model{

    function verifyUser(){

        $query = $this->db->get_where('users', array('username' => $_POST['username'],'password' => $_POST['password']));
        $result = $query->result_array();
        //$result = $query->result();
        //print_r($result);
        //return false;
        
        //put user info a session array
        $this->session->set_userdata($result);


        if ($result == NULL){ echo 'Your account could not be verified.'; }
            else{

                //set cookie $_COOKIE['logged_in']
                $cookie = array(
                    'name'   => 'logged_in',
                    'value'  => 'true',
                    'expire' => '86500',
                    //'domain' => '.some-domain.com',
                    'path'   => '/',
                    //'prefix' => 'myprefix_',
                    //'secure' => TRUE
                );

                $this->input->set_cookie($cookie); 

                //redirect to users page
                $logged_in = $this->input->cookie('logged_in');
                if ($logged_in == TRUE){ redirect('/user/'); }

        }

    }

}
