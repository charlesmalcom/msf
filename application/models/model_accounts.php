<?php

class Model_accounts extends CI_Model{

    /*
     *  CRUD Functions
     ******************/
    function create($xxxxxData){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
    }

    function read(){
        $query = $this->db->get_where('xxxxx');
        return $query->result();
    }

    function update($xxxxxData){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
    }

    function delete($xxxxx_id){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
    }


    /*
    * Other Functions
    ******************/
    function getAll(){
        $query = $this->db->get_where('xxxxx');
        return $query->result();
    }

    function getCurrent(){
        $query = $this->db->get_where('xxxxx', array('show' => 'Yes'));
        return $query->result();
    }

    function getDetail($xxxxx_id){
        $query = $this->db->get_where('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    /*
    * Other Functions
    ******************/
    function getAccountsbyUser($userID){
        $query = $this->db->get_where('bankAccounts', array('userID' => $userID));
        return $query->result();
    }

    function getCurrentUser(){
        $query = $this->db->get_where('xxxxx', array('show' => 'Yes'));
        return $query->result();
    }

    function getDetailUser($xxxxx_id){
        $query = $this->db->get_where('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    /*
    * Search Functions
    *******************/

    function search(){

        $search_text = $_POST['search_text'];
        $search_category = $_POST['search_category'];

        if ($search_category == 'All') { $this->db->select('*'); }
        else { $this->db->where('category', $search_category); }

        //$this->db->where('category', $search_category);
        $this->db->like('description', $search_text);

        $query = $this->db->get_where('xxxxx');
        return $query->result();
    }

}
