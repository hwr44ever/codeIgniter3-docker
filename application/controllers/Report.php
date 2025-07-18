<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     *
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Cash_model');
        $this->load->model('Vendor_model');
        $this->load->model('Invoice_model');
    }

    public function index() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Cash Book';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            //print_r($data['vendor_data']);die;
            $this->load->view('add_entry', $data);
        } else {
            redirect('User');
        }
    }

    public function view_cash_report_by_dates() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Cash Report by Date';
            // $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            //$data['entry_data'] = $this->Cash_model->get_entry_by_hashval();
            //print_r($data);die;
            $this->load->view('cash_report_by_dates', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function generate_cash_report_by_dates() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            //print_r($this->input->post());die;
            $start_date = $this->input->post('start_Date');
            $end_date = $this->input->post('end_Date');
            $data['all_entries_between_dates'] = $this->Cash_model->get_all_entries_between_dates($start_date, $end_date);
            //print_r($data['all_entries_between_dates']);die;
            $cash_data = "";
            $total_debit_amount = 0;
            $total_credit_amount = 0;
            $entry_type = '';
            $total_amount = 0;
            foreach ($data['all_entries_between_dates'] as $data_row) {                
                $total_amount = $total_amount + $data_row->amount;
                if ($data_row->entry_type == 1) {
                    $total_debit_amount = $total_debit_amount + $data_row->amount;
                    $entry_type = "Debit";
                } else {
                    $total_credit_amount = $total_credit_amount + $data_row->amount;
                    $entry_type = "Credit";
                }                
                $cash_data = $cash_data."<tr>"
                . "<td>$data_row->date</td>"
                . "<td><a href=''>$data_row->vendor_company</a></td>"
                . "<td>$entry_type</td>"
                . "<td>".number_format($data_row->amount,2)."</td>"
                . "<td>$data_row->detail</td>"
                
                . "<td>$data_row->first_name $data_row->last_name</td>"
                . "</tr>";
            }
            $diff_in_amount = $total_credit_amount - $total_debit_amount;
            $text_color = '';
            if($diff_in_amount > 0){
                $text_color = "green";
            }else{
                $text_color = "red";
            }
            $cash_data = $cash_data.""
                    . "<tr>"
                    . "<td colspan = 2>Total Debit = <b style='color:red'>".number_format($total_debit_amount,2)."</b></td>"
                    . "<td colspan = 2>Total Credit = <b style='color:green'>".number_format($total_credit_amount,2)."</b></td>"
                    . "<td colspan = 2>Difference = <b style='color:$text_color'>".number_format($diff_in_amount,2)."</b></td>"
                    . "</tr>";
           
            $data['cash_data'] = $cash_data;
            if (!empty($cash_data)) {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Worked fine";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }
    
    public function view_invoice_report_by_dates() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Invoice Report by Date';
            // $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            //$data['entry_data'] = $this->Cash_model->get_entry_by_hashval();
            //print_r($data);die;
            $this->load->view('invoice_report_by_dates', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function generate_invoice_report_by_dates() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            //print_r($this->input->post());die;
            $start_date = $this->input->post('start_Date');
            $end_date = $this->input->post('end_Date');
            $data['all_entries_between_dates'] = $this->Invoice_model->get_all_invoice_entries_between_dates($start_date, $end_date);
            //print_r($data['all_entries_between_dates']);die;
            $invoice_data = "";
            $total_debit_amount = 0;
            $total_credit_amount = 0;
            $entry_type = '';
            $total_amount = 0;
            foreach ($data['all_entries_between_dates'] as $data_row) {                
                $total_amount = $total_amount + $data_row->total_amount;
                if ($data_row->invoice_type == 1) {
                    $total_debit_amount = $total_debit_amount + $data_row->total_amount;
                    $entry_type = "Debit";
                } else {
                    $total_credit_amount = $total_credit_amount + $data_row->total_amount;
                    $entry_type = "Credit";
                }                
                $invoice_data = $invoice_data."<tr>"
                . "<td>$data_row->date</td>"
                . "<td><a href='".base_url('vendor/entries/'.$data_row->vendor_hashval)."'>$data_row->vendor_name</a></td>"
                . "<td>$entry_type</td>"
                . "<td>$data_row->weight</td>"
                . "<td>$data_row->rate</td>"
                . "<td>".number_format($data_row->total_amount,2)."</td>"
                . "<td>$data_row->detail_box</td>"                
                . "<td>$data_row->vendor_fname $data_row->vendor_lname</td>"
                . "<td><a href='". base_url('Invoice/Edit/'.$data_row->invoice_type.'/'.$data_row->invoice_hashval)."' ><i class='dripicons-pencil'></i></a></td>"
                . "</tr>";
            }
            $diff_in_amount = $total_credit_amount - $total_debit_amount;
            $text_color = '';
            if($diff_in_amount > 0){
                $text_color = "green";
            }else{
                $text_color = "red";
            }
            $invoice_data = $invoice_data.""
                    . "<tr>"
                    . "<td colspan = 2>Total Debit = <b style='color:red'>".number_format($total_debit_amount,2)."</b></td>"
                    . "<td colspan = 2>Total Credit = <b style='color:green'>".number_format($total_credit_amount,2)."</b></td>"
                    . "<td colspan = 2>Difference = <b style='color:$text_color'>".number_format($diff_in_amount,2)."</b></td>"
                    . "</tr>";
           
            $data['invoice_data'] = $invoice_data;
            if (!empty($invoice_data)) {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Worked fine";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }



}
