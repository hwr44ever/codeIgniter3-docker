<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->database();
        // $this->load->model('User_model');
    }

    function user_login($username, $password) {
        //echo $username.'===='.$password;        die();
       
        $encrpyt_password = md5($password.'');
        //echo $query_txt = "SELECT * from users WHERE email = '$username' AND password = '$encrpyt_password'"; die;
        $query = $this->db->query("SELECT * from users WHERE email = '$username' AND password = '$encrpyt_password'");
        return $query->result();
    }

    function get_all_users() {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $user_id = $_SESSION['user_id'];
        $query = $this->db->query("SELECT * from users WHERE `status` = 1 AND user_id != $user_id");
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

    function insert_user($param = array()) {
        //print_r($param);die("in Model");
        $first_name = $param['first_name'];
        $last_name = $param['last_name'];
        $email = $param['email'];
        $contact = $param['contact'];
        $address = $param['address'];
        $password = md5($param['user_password']);
        $user_hashval = md5($email.$contact.$first_name);
        $user_type = $param['user_type'];
        $query = $this->db->query("INSERT INTO `users` (`first_name`, `last_name`, `email`, `contact`, `address`, `password`, `user_hashval`, `user_type`, `status`) "
                . "VALUES ('$first_name', '$last_name', '$email', '$contact', '$address', '$password', '$user_hashval', '$user_type', '1');");
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_user_by_id($id) {
        $query = $this->db->query("SELECT * from users WHERE user_id = $id");
        return $query->row();
    }
    function get_user_by_hashval($user_hashval) {
        $query = $this->db->query("SELECT * from users WHERE user_hashval = '$user_hashval'");
        return $query->row();
    }
    function get_user_by_email($user_email) {
        $query = $this->db->query("SELECT * from users WHERE email = '$user_email'");
        return $query->row();
    }

    function update_user($param = array()) {
        //print_r($param);die("in Model");
        $user_id = $param['user_id'];
        $first_name = $param['first_name'];
        $last_name = $param['last_name'];
        $email = $param['email'];
        $contact = $param['contact'];
        $address = $param['address'];
        $password = md5($param['address']);
        $user_type = $param['user_type'];
        $query = $this->db->query("UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `contact` = '$contact', address = '$address', `user_type` = $user_type WHERE `users`.`user_id` = $user_id; ");
        return $user_id;
    }

    function delete_user_by_id($user_id) {
        $query = $this->db->query("UPDATE `users` SET `status` = '0' WHERE `users`.`user_id` = $user_id;");
        return $user_id;
    }
    function enable_user_by_id($user_id) {
        $query = $this->db->query("UPDATE `users` SET `status` = '1' WHERE `users`.`user_id` = $user_id;");
        return $user_id;
    }
    
    function password_updated($user_password, $user_id) {
        $query = $this->db->query("UPDATE `users` SET `password` = '$user_password' WHERE `users`.`user_id` = $user_id;");
        return $user_id;
    }
    function user_password_updated($user_password, $user_hashval) {
        $query_txt = "UPDATE `users` SET `password` = '$user_password' WHERE `users`.`user_hashval` = '$user_hashval';";
        $query = $this->db->query($query_txt);
        return $user_hashval;
    }

}

?>