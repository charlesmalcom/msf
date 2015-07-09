<?php

class Model_bookmarks extends CI_Model{

    function getAll(){
        $query = $this->db->get_where('bookmarks');
        return $query->result();

    }

    function create($bookmarksData){
        $this->db->insert("bookmarks", $bookmarksData);          /* table, data */

    }

    function getCurrent(){
        $query = $this->db->get_where('bookmarks', array('show' => 'Yes'));
        return $query->result();

    }

    function getDetail($bookmarks_id){
        $query = $this->db->get_where('bookmarks', array('id' => $bookmarks_id));
        return $query->result();

    }

    function update($bookmarksData){
        $this->db->update('bookmarks', $bookmarksData, array('id' => $bookmarksData['id']));

    }

    function delete($bookmarks_id){
        $this->db->delete('bookmarks', array('id' => $bookmarks_id));
    }

    function search(){

        $search_text = $_POST['search_text'];
        $search_category = $_POST['search_category'];

        if ($search_category == 'All') { $this->db->select('*'); }
        else { $this->db->where('category', $search_category); }

        //$this->db->where('category', $search_category);
        $this->db->like('description', $search_text);

        $query = $this->db->get_where('bookmarks');
        return $query->result();

    }

}
