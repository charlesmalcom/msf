<?php

class Model_support extends CI_Model{


    /*
     * Users
     *********/
    function get_surname(){
        //$query = $this->db->query("SELECT * FROM locations WHERE available = 'Yes'");
        $query = $this->db->query("SELECT * FROM support_surname");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->surname] = $dropdown->surname; 
        }
        return $dropDownList;
    }
    
    function get_suffix(){
        $query = $this->db->query("SELECT * FROM support_suffix");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->suffix] = $dropdown->suffix; 
        }
        return $dropDownList;
    }
    
    function get_phoneCarriers(){
        $query = $this->db->query("SELECT * FROM support_phoneCarrier");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->carrier] = $dropdown->carrier; 
        }
        return $dropDownList;
    }

    function get_ccType(){
        $query = $this->db->query("SELECT * FROM support_ccType");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->type] = $dropdown->type; 
        }
        return $dropDownList;
    }

    function get_actionStatus(){
        $query = $this->db->query("SELECT * FROM support_actionStatus");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->status] = $dropdown->status; 
        }
        return $dropDownList;
    }

    function get_accountType(){
        $query = $this->db->query("SELECT * FROM support_accountType");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->type] = $dropdown->type; 
        }
        return $dropDownList;
    }

    function get_depositor(){ 
        $query = $this->db->query("SELECT * FROM support_depositor");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->from] = $dropdown->from; 
        }
        return $dropDownList;
    }

    function get_stores(){    
        $query = $this->db->query("SELECT * FROM support_stores");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->store] = $dropdown->store; 
        }
        return $dropDownList;
    }

    function get_tActions(){
        $query = $this->db->query("SELECT * FROM support_tActions");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->status] = $dropdown->status; 
        }
        return $dropDownList;
    }

    function get_expCategories(){   
        $query = $this->db->query("SELECT * FROM support_expCategory");
        $dropdowns = $query->result();

        foreach($dropdowns as $dropdown) { 
            $dropDownList[$dropdown->category] = $dropdown->category; 
        }
        return $dropDownList;
    }


    /*
     * Admin - Create
     ******************/
    function create_phoneCarrier(){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
        return $query->result();
    }

    function update_phoneCarrier(){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
        return $query->result();
    }

    function delete_phoneCarrier(){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    function create_ccType(){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
        return $query->result();
    }

    function update_ccType(){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
        return $query->result();
    }

    function delete_ccType(){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    function create_depositor(){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
        return $query->result();
    }

    function update_depositor(){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
        return $query->result();
    }

    function delete_depositor(){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    function create_store(){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
        return $query->result();
    }

    function update_store(){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
        return $query->result();
    }

    function delete_store(){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    function create_tActions(){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
        return $query->result();
    }

    function update_tActions(){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
        return $query->result();
    }

    function delete_tActions(){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


    function create_expCategory(){
        $this->db->insert("xxxxx", $xxxxxData);          /* table, data */
        return $query->result();
    }

    function update_expCategory(){
        $this->db->update('xxxxx', $xxxxxData, array('id' => $xxxxxData['id']));
        return $query->result();
    }

    function delete_expCategory(){
        $this->db->delete('xxxxx', array('id' => $xxxxx_id));
        return $query->result();
    }


   /*
    * Other
    ********/

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

}
