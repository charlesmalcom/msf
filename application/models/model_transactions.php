<?php

class Model_transactions extends CI_Model{

    /*
     * User Functions
     ******************/

    function createDeposit($depositData){
        $this->db->insert('transactions', $depositData);
    }



    function getAll(){
        $query = $this->db->get_where('transactions');
        return $query->result();
    }

    function getDepositsbyUser($userID){
        $query = $this->db->get_where('transactions', array('type' => 'dep', 'userID' => $userID));
        return $query->result();
    }

    function getWithdrawlsbyUser($userID){
        $query = $this->db->get_where('transactions', array('type' => 'pur', 'userID' => $userID));
        return $query->result();
    }

    function getDetail($transactions_id){
        $query = $this->db->get_where('transactions', array('id' => $transactions_id));
        return $query->result();
    }



    /*
     * Admin Functions
     ******************/

    //function getAll(){}
    //function getDeposits(){}
    //function getWithdrawls(){}



    /*
     * Other Functions                                      [ can probably delete ]
     ******************/
    

    function create($transactionsData){
        $this->db->insert("transactions", $transactionsData);          /* table, data */
    }

    function getCurrent(){
        $query = $this->db->get_where('transactions', array('show' => 'Yes'));
        return $query->result();
    }

    function update($transactionsData){
        $this->db->update('transactions', $transactionsData, array('id' => $transactionsData['id']));
    }

    function delete($transactions_id){
        $this->db->delete('transactions', array('id' => $transactions_id));
    }

    function search(){
        $search_text = $_POST['search_text'];
        $search_category = $_POST['search_category'];

        if ($search_category == 'All') { $this->db->select('*'); }
        else { $this->db->where('category', $search_category); }

        //$this->db->where('category', $search_category);
        $this->db->like('description', $search_text);

        $query = $this->db->get_where('transactions');
        return $query->result();
    }

}
