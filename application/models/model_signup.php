<?php

class Model_signup extends CI_Model{

    function createUser($signupData){
        $this->db->insert('users', $signupData);
    }
    
    function createCc($ccData){
        $this->db->insert('ccInfo', $ccData);
    }
    
    
    function confirm($user, $randomNumberUrl){

        //check to see if parameters are populated/
        if ($user == NULL and $randomNumberUrl == NULL){
            //echo 'parameters are NULL';
            return '0';                       //paramaters are NULL
        } else {

            //get random number from DB
            $query = $this->db->get_where('users', array('random' => $randomNumberUrl, 'username' => $user));
            $randomNumberDb = $query->result();

            //echo $randomNumberUrl."<br />";
            //echo $randomNumberDb['random']."<br />";

            print_r($randomNumberDb);
            echo"<br />";

            //compare email info to db info
            if ($randomNumberUrl == $randomNumberDb){ echo 'same'; }
            else { echo 'different'; }

            return '1';                           //compare is good
        }
        
    }






    function create($signupData){
        $this->db->insert("signup", $signupData);          /* table, data */
    }

    function getCurrent(){
        $query = $this->db->get_where('signup', array('show' => 'Yes'));
        return $query->result();
    }

    function getDetail($signup_id){
        $query = $this->db->get_where('signup', array('id' => $signup_id));
        return $query->result();
    }

    function update($signupData){
        $this->db->update('signup', $signupData, array('id' => $signupData['id']));
    }

    function delete($signup_id){
        $this->db->delete('signup', array('id' => $signup_id));
    }

    function search(){

        $search_text = $_POST['search_text'];
        $search_category = $_POST['search_category'];

        if ($search_category == 'All') { $this->db->select('*'); }
        else { $this->db->where('category', $search_category); }

        //$this->db->where('category', $search_category);
        $this->db->like('description', $search_text);

        $query = $this->db->get_where('signup');
        return $query->result();
    }

}
