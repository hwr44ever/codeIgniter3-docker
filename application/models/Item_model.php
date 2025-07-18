<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->database();
        //$this->load->model('User_model');
    }

  
    function get_all_items() {
        $this->db->select("*");
        $this->db->from("items");
        $query = $this->db->get();
        //print_r($query->result());die;
        return $query->result();
        // OR
        //$query = $this->db->query("SELECT * from employees_tasks WHERE your condition");
        //return $query->result();
    }
    
    function get_item_by_hashval($item_hashval){
        $query = $this->db->query("SELECT * from items WHERE item_hashval = '$item_hashval'");
        return $query->row();
    }
    function insert_item($item_name,$user_id){
        $item_hashval = md5($item_name.$user_id.'waqas');
        $query = $this->db->query("INSERT INTO `items` (`item_name`,`item_hashval`, `added_by`) VALUES ('$item_name','$item_hashval', $user_id);");
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function user_query_model($query_text){
        
        $query = $this->db->query("'.$query_text.'");
        $insert_id = 1;
        return $insert_id;
    }
    
    function update_item($item_id,$item_name){
        $query = $this->db->query("UPDATE `items` SET `item_name` = '$item_name' WHERE `items`.`item_id` = $item_id; ");
        return $item_id;
    }
    
    function delete_item_by_id($item_id){
        $query = $this->db->query("DELETE FROM `items` WHERE `items`.`item_id` = $item_id");
        return $item_id;
    }
       


}

?>