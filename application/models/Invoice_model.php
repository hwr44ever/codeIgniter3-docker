<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->database();
        // $this->load->model('User_model');
    }

    function get_all_invoice_entries() {
        $query = $this->db->query("SELECT * FROM `invoice_view` ORDER BY `date` DESC");
        return $query->result();
    }
    
    function get_all_invoice_entries_by_entry_type($invoice_type) {
        $query = $this->db->query("SELECT * FROM `invoice_view` WHERE invoice_type = '$invoice_type' AND pending_value = '0' ORDER BY `date` DESC");
        return $query->result();
    }
    
    function get_all_pending_invoices() {
        $query = $this->db->query("SELECT * FROM `invoice_view` WHERE pending_value = '1' ORDER BY `date` DESC");
        return $query->result();
    }

    function get_all_entries_by_vendor_hashval($vendor_hashval) {
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

    function get_all_invoice_entries_between_dates($start_date, $end_date) {
        $query_text = "SELECT * FROM `invoice_view` where date BETWEEN '$start_date' AND '$end_date' ORDER BY `date` ASC";
        $query = $this->db->query($query_text);
        return $query->result();
    }

    function get_invoice_entry_by_hashval($hashval) {
        $query = $this->db->query("SELECT * from invoices_entry WHERE invoice_hashval = '$hashval'");

        return $query->row();
    }
    
    function check_buyer_invoice_if_exist($param)
    {
        //print_r($param);die('In Model');
        $query = $this->db->query("SELECT * FROM invoices_entry WHERE date = '".$param['date']."' AND invoice_type = '".$param['entry_type']."' AND rate = '".$param['rate_qty']."' AND vendor_id = '".$param['vendor_drop_down']."'");

        return $query->row();
    }
    
    function check_seller_invoice_if_exist($param)
    {
        //print_r($param);die('In Model');
        $query = $this->db->query("SELECT * FROM invoices_entry WHERE date = '".$param['date']."' AND invoice_type = '".$param['entry_type']."' AND rate = '".$param['rate_qty']."' AND vendor_id = '".$param['vendor_drop_down']."' AND weight = '".$param['weight_qty']."'");

        return $query->row();
    }
    function deactivate_invoice_and_cash_entry_by_hashval($hashval)
    {
         $cash_deactivate_query = "UPDATE `cash_entry` SET `entry_status` = '0' WHERE `entry_hashval` = '$hashval'"; 
         $invoice_deactivate_query = "UPDATE `invoices_entry` SET `invoice_status` = '0' WHERE `invoice_hashval` = '$hashval'";
        
        //Set inactive Cash_entry
        $query = $this->db->query($cash_deactivate_query);
        //set inactive Invoice
        $query = $this->db->query($invoice_deactivate_query);
        return $hashval;
    }
    
    function insert_invoice_entry($param = array())
    {
        //print_r($param);        die("in model");
        $user_id = $_SESSION['user_id'];
        $date = $param['date'];
        $vendor_id = "";
        $is_invoice_entry = isset($param['invoice_entry']) ? $param['invoice_entry'] : 0;
        $item_total_amount = $param['item_total_amount'];
        $detail_textarea = $param['detail_textarea'];
        $weight_qty = isset($param['weight_qty']) ? $param['weight_qty']: 0;
        $is_pending = isset($param['pendingValue']) ? $param['pendingValue']: 0;
        $rate_qty = $param['rate_qty'];
        $invoice_entry_type = $param['entry_type'];

        //Selecting values from dropdown or textbox
        if ($param['vendor_drop_down'] > 0)
        {
            $vendor_id = $param['vendor_drop_down'];
        }
        else if ($param['vendor_name_custom'] != '')
        {
            $vendor_name = $param['vendor_name_custom'];
            $vendor_id = $this->Vendor_model->add_vendor_by_name_only($vendor_name);
        }
        $entry_hashval = isset($param['hashval']) ? $param['hashval'] : md5(rand(0, 5000) . date('Y-m-d i:h:s'));
        //$test_query = "INSERT INTO `cash_entry` (`date`, `vendor_id`, `amount`, `entry_type`, `detail`, `entry_hashval`, `modified_by`, `entry_date`) VALUES ('2023-06-26', '1', '200', '2', 'Entry Date test', '886513897asdf879', '1', '2023-06-19 13:33:41')";
        $query_text = "INSERT INTO `invoices_entry` (`date`, `vendor_id`, `weight`, `rate`, `total_invoice`, `detail_box`, `invoice_type`, `invoice_hashval`, `pending_value`, `invoice_status`, `entry_date`) "
                . "VALUES ('$date', '$vendor_id', '$weight_qty', '$rate_qty', '$item_total_amount', '$detail_textarea', '$invoice_entry_type', '$entry_hashval', '$is_pending', 1 , '".date('Y-m-d i:h:s')."');";

        $query = $this->db->query($query_text);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function update_invoice_by_hashval($param = array())
    {
        //print_r($param);        die("in Invoice model");
        $user_id = $_SESSION['user_id'];
        $weight= $param['weight_qty'];
        $rate = $param['rate_qty'];
        $date = $param['date']; 
        $amount = $param['item_total_amount'];
        $detail_textarea = $param['detail_textarea'];
        $entry_type = $param['entry_type'];
        $invoice_hashval = $param['hashval'];
        $is_pending = isset($param['pendingValue']) ? $param['pendingValue']: 0;

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
        $query_text = "UPDATE `invoices_entry` SET `date` = '$date', `vendor_id` = '$vendor_id', `weight` = '$weight', "
                . "`rate` = '$rate', `total_invoice` = '$amount', `detail_box` = '$detail_textarea',`pending_value` = '$is_pending',"
                . "`invoice_type` = '$entry_type' WHERE `invoices_entry`.`invoice_hashval` = '$invoice_hashval'";

        $query = $this->db->query($query_text);
        return $invoice_hashval;
    }

}

?>