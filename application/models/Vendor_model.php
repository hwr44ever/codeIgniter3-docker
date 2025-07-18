<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->database();
        // $this->load->model('User_model');
    }

    function user_login($username, $password) {
        $encrpyt_password = md5($password);
        //$query_txt = "SELECT * from users WHERE email = '$username' AND password = '$encrpyt_password'";
        $query = $this->db->query("SELECT * from users WHERE email = '$username' AND password = '$encrpyt_password'");
        return $query->result();
    }

    function get_all_vendor() {       
        $query = $this->db->query("SELECT * FROM vendors WHERE `status` = 1 ORDER BY vendor_company ASC");
        return $query->result();
    }

    function get_all_disabled_users() {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT * from users WHERE `status` = 0");
        return $query->result();
    }

    function insert_vendor($param = array()) {
        $user_id = $_SESSION['user_id'];
        $first_name = $param['first_name'];
        $last_name = $param['last_name'];
        $email = $param['email'];
        $contact = $param['contact'];
        $vendor_hasval = md5($first_name.$last_name.$user_id. rand(0,1000000).date("Ymdhis"));
        $address = $param['address'];
        $company_name = $param['company_name'];
        $query = $this->db->query("INSERT INTO `vendors` (`vendor_company`, `vendor_fname`, `vendor_lname`, `vendor_phone`, `vendor_email`, `vendor_address`,`vendor_hashval`, `modified_by`, `status`) "
                . "VALUES ('$company_name', '$first_name', '$last_name', '$contact', '$email', '$address','$vendor_hasval', $user_id, '1')");
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function add_vendor_by_name_only($vendor_name) {
        $user_id = $_SESSION['user_id'];
        $vendor_hasval = md5($vendor_name.$user_id);
        $query = $this->db->query("INSERT INTO `vendors` (`vendor_company`, `vendor_hashval`, `modified_by`, `status`) "
                . "VALUES ('$vendor_name', '$vendor_hasval', '$user_id', '1')");
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_vendor_by_hashval($hashval) {
        $query = $this->db->query("SELECT * from vendors WHERE vendor_hashval = '$hashval'");

        return $query->row();
    }
    function get_vendor_by_id($hashval) {
        $query = $this->db->query("SELECT * from vendors WHERE vendor_id = '$hashval'");

        return $query->row();
    }

    function update_vendor($param = array()) {
        //  print_r($param);        die("in Model"); //$user_id = $_SESSION['user_id'];
        $user_id = $_SESSION['user_id'];
        $hash_val = $param['vendor_hashval'];
        $first_name = $param['first_name'];
        $last_name = $param['last_name'];
        $email = $param['email'];
        $contact = $param['contact'];
        $address = $param['address'];
        $company_name = $param['company_name'];
        $query = $this->db->query("UPDATE `vendors` SET `vendor_company`='$company_name', `vendor_fname`='$first_name', `vendor_lname`='$last_name', `vendor_phone`='$contact', `vendor_email`='$email', `vendor_address`='$address', `modified_by`='$user_id' WHERE (`vendor_hashval`='$hash_val')");
        return $user_id;
    }

    function delete_vendor_by_id($vendor_id) {
        $query = $this->db->query("UPDATE `vendors` SET `status` = '0' WHERE `vendors`.`vendor_id` = $vendor_id;");
        return $vendor_id;
    }

    function enable_user_by_id($user_id) {
        $query = $this->db->query("UPDATE `users` SET `status` = '1' WHERE `users`.`user_id` = $user_id;");
        return $user_id;
    }
    
     function get_all_disabled_vendors() {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT * from vendors WHERE `status` = 0");
        return $query->result();
    }

}

?>