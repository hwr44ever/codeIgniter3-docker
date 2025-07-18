<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cash_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        //$this->load->database();
        // $this->load->model('User_model');
    }

    function user_login($username, $password)
    {
        $encrpyt_password = md5($password);
        //$query_txt = "SELECT * from users WHERE email = '$username' AND password = '$encrpyt_password'";
        $query = $this->db->query("SELECT * from users WHERE email = '$username' AND password = '$encrpyt_password'");
        return $query->result();
    }

    function get_all_entries()
    {
        $query = $this->db->query("SELECT * FROM `entry_list_view` WHERE entry_status = 1 ORDER BY `date` DESC");
        return $query->result();
    }
    function get_all_entries_between_dates($start_date, $end_date)
    {
        $query_text = "SELECT * FROM `entry_list_view` where date BETWEEN '$start_date' AND '$end_date' ORDER BY `date` ASC";
        $query = $this->db->query($query_text);
        return $query->result();
    }

    function get_all_entries_by_vendor_hashval($vendor_hashval)
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query_txt = "SELECT * FROM `entry_list_view` WHERE vendor_hashval = '$vendor_hashval' ORDER BY  `date` DESC";
        $query = $this->db->query($query_txt);
        return $query->result();
    }
    
    function get_all_entries_by_vendor_id($vendor_id)
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query_txt = "SELECT * FROM `entry_list_view` WHERE vendor_id = '$vendor_id' ORDER BY  `date` DESC";
        $query = $this->db->query($query_txt);
        return $query->result();
    }

    function get_all_disabled_users()
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT * from users WHERE `status` = 0");
        return $query->result();
    }

    function insert_entry($param = array())
    {
        //print_r($param);        die("in model");
        $user_id = $_SESSION['user_id'];
        $date = $param['date'];
        $vendor_id = "";
        $is_invoice_entry = isset($param['invoice_entry']) ? $param['invoice_entry'] : 0;
        $amount = $param['item_total_amount'];
        $detail_textarea = $param['detail_textarea'];
        $entry_type = $param['entry_type'];        
        //Selecting values from dropdown or textbox
        if ($param['vendor_drop_down'] > 0)
        {
            $vendor_id = $param['vendor_drop_down'];
        }
        else if ($param['vendor_name_custom'] != '' && $is_invoice_entry == 0)
        {
            $vendor_name = $param['vendor_name_custom'];
            $vendor_id = $this->Vendor_model->add_vendor_by_name_only($vendor_name);
        }
        $entry_hashval = isset($param['hashval']) ? $param['hashval'] : md5(rand(0, 5000) . date('Y-m-d i:h:s'));
        //$test_query = "INSERT INTO `cash_entry` (`date`, `vendor_id`, `amount`, `entry_type`, `detail`, `entry_hashval`, `modified_by`, `entry_date`) VALUES ('2023-06-26', '1', '200', '2', 'Entry Date test', '886513897asdf879', '1', '2023-06-19 13:33:41')";
        $query_text = "INSERT INTO `cash_entry` (`date`, `vendor_id`, `amount`, `entry_type`, `detail`, `entry_hashval`, `modified_by`, `invoice_entry`, `entry_status`, `entry_date`) "
                . "VALUES ('$date', '$vendor_id', '$amount', '$entry_type', '$detail_textarea', '$entry_hashval', '$user_id','$is_invoice_entry', 1 ,'" . date('Y-m-d h:i:s') . "'  )";

        $query = $this->db->query($query_text);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_entry_by_hashval($param = array())
    {
        //print_r($param);        die("in Cash model");
        $user_id = $_SESSION['user_id'];
        $cash_book_id = $param['cash_book_id'];
        $date = $param['date']; 
        $amount = $param['amount'];
        $detail_textarea = $param['detail_textarea'];
        $entry_type = $param['entry_type'];

        //Selecting values from dropdown or textbox
        $vendor_id = "";
        if (isset($param['vendor_drop_down']) && $param['vendor_drop_down'] > 0)
        {
            $vendor_id = $param['vendor_drop_down'];
        }
        else if (isset($param['vendor_name_custom']) || $param['vendor_name_custom'] != '')
        {
            $vendor_name = $param['vendor_name_custom'];
            $vendor_id = $this->Vendor_model->add_vendor_by_name_only($vendor_name);
        }
        $entry_hashval = md5($date . $amount . $entry_type);
        $query_text = "UPDATE `cash_entry` SET `date` = '$date', `vendor_id` = '$vendor_id', `amount` = '$amount', `entry_type` = '$entry_type', `detail` = '$detail_textarea', `modified_by` = '$user_id' WHERE `cash_entry`.`cash_book_id` = $cash_book_id;";

        $query = $this->db->query($query_text);
        return $cash_book_id;
    }
    
    function update_entry_by_hashval_for_invoice($param = array())
    {
      // print_r($param);        die("in model");
        $user_id = $_SESSION['user_id'];
        $date = $param['date'];
        $hashval = $param['hashval'];
        $vendor_id = "";
        $weight_qty = $param['weight_qty'];
        $rate_qty = $param['rate_qty'];
        $item_total_amount = $param['item_total_amount'];
        $detail_textarea = $param['detail_textarea'];
        $entry_type = $param['entry_type'];

        //Selecting values from dropdown or textbox
        if (isset($param['vendor_drop_down']) && $param['vendor_drop_down'] > 0)
        {
            $vendor_id = $param['vendor_drop_down'];
        }
        else if (isset($param['vendor_name_custom']) || $param['vendor_name_custom'] != '')
        {
            $vendor_name = $param['vendor_name_custom'];
            $vendor_id = $this->Vendor_model->add_vendor_by_name_only($vendor_name);
        }
        //echo $vendor_id;die;
        //$entry_hashval = md5($date . $vendor_id . $item_total_amount . $entry_type);

        $query_text_cash_book = "UPDATE `cash_entry` SET `date`='$date',`vendor_id`='$vendor_id',`amount`='$item_total_amount',`entry_type`='$entry_type'"
                . ",`detail`='$detail_textarea',`modified_by`='$user_id' WHERE `entry_hashval`= '$hashval'";
         $query_cash_book = $this->db->query($query_text_cash_book);
        
       

        return $hashval;
    }

    function get_entry_by_hashval($hashval)
    {
        $query = $this->db->query("SELECT * from entry_list_view WHERE entry_hashval = '$hashval'");

        return $query->row();
    }
    
    function check_entry_if_exist($param)
    {
        //print_r($param);die('In Model');
        $query = $this->db->query("SELECT * FROM entry_list_view WHERE date = '".$param['date']."' AND entry_type = '".$param['entry_type']."' AND amount = '".$param['item_total_amount']."' AND vendor_id = '".$param['vendor_drop_down']."'");

        return $query->row();
    }

    function update_vendor($param = array())
    {
        //  print_r($param);        die("in Model"); //$user_id = $_SESSION['user_id'];
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

    function get_total_value_of_credit()
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT Sum(cash_entry.amount) as total_credit FROM cash_entry WHERE cash_entry.entry_type = 2 AND entry_status = 1");
        return $query->result();
    }

    function get_total_value_of_debit()
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT Sum(cash_entry.amount) as total_debit FROM cash_entry WHERE cash_entry.entry_type = 1 AND entry_status = 1");
        return $query->result();
    }

    function get_total_value_of_future_debit()
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT Sum(cash_entry.amount) AS future_debit FROM cash_entry WHERE cash_entry.entry_type = 1 AND entry_status = 1 AND cash_entry.date > '" . date("Y-m-d") . "'");
        return $query->result();
    }

    function get_total_value_of_future_credit()
    {
        /* $this->db->select("*");
          $this->db->from("users");
          $query = $this->db->get();
          //print_r($query->result());die;
          return $query->result(); */
        // OR
        $query = $this->db->query("SELECT Sum(cash_entry.amount) AS future_credit FROM cash_entry WHERE cash_entry.entry_type = 2 AND entry_status = 1 AND cash_entry.date > '" . date("Y-m-d") . "'");
        return $query->result();
    }
    
    function delete_cash_entry_by_id($cash_hashval) {
        $query = $this->db->query("DELETE FROM `cash_entry` WHERE `cash_entry`.`entry_hashval` = '$cash_hashval'");
        return $cash_hashval;
    }

}

?>