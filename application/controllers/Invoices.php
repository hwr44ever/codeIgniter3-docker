<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {

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

    public function list_invoice() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $invoice_list_type = $this->uri->segment(2);
            $invoice_list_type_binary = 0;
            if ($invoice_list_type == 'Seller') {
                $invoice_list_type_binary = 2;
            } else if ($invoice_list_type = 'Buyer') {
                $invoice_list_type_binary = 1;
            }
            $data['heading'] = $invoice_list_type . ' Invoice List';
            $data['invoices_data'] = $this->Invoice_model->get_all_invoice_entries_by_entry_type($invoice_list_type_binary);
            $data['invoice_list_type'] = $invoice_list_type;
            //print_r($data['invoices_data']);die;
            $this->load->view('list_invoices', $data);
        } else {
            redirect('User');
        }
    }
    public function list_pending_invoices() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
          
            $data['heading'] = 'Pending Invoice List';
            $data['invoices_data'] = $this->Invoice_model->get_all_pending_invoices();
            //print_r($data['invoices_data']);die;
            $this->load->view('list_invoices', $data);
        } else {
            redirect('User');
        }
    }
    public function generate_invoice() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
          
            $data['heading'] = 'Pending Invoice List';
            $data['invoices_data'] = $this->Invoice_model->get_all_pending_invoices();
            //print_r($data['invoices_data']);die;
            $this->load->view('list_invoices', $data);
        } else {
            redirect('User');
        }
    }

    public function view_invoice_entry() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Invoice Entry';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            //print_r($data['vendor_data']);die;
            $this->load->view('add_invoice', $data);
        } else {
            redirect('User');
        }
    }  

    public function view_edit_invoice_entry($invoice_hashval) {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') { 

            $data['heading'] = 'Edit invoice';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            $data['invoice_data'] = $this->Invoice_model->get_invoice_entry_by_hashval($invoice_hashval);
            //print_r($data['invoice_data']);die;
            $this->load->view('edit_invoice', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function edit_seller_invoice($hashval) {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Edit Seller invoice';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            $data['invoice_data'] = $this->Invoice_model->get_invoice_entry_by_hashval($hashval);
            //print_r($data['invoice_data']);die;
            $this->load->view('edit_seller_invoice', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function add_invoice_entry() {
        $user_id = $_SESSION['user_id'];
        $insert_id = '';
        if ($user_id != '') {
            $param = $this->input->post();
            $param['hashval'] = md5(rand(0, 10000000) . date('Y-m-d h:i:s'));
            $param['invoice_entry'] = 1;
            $buyer_entry = $param['entry_type'];
            //print_r($param);die;
            $insert_hashval = $this->Invoice_model->insert_invoice_entry($param); 
            if ($insert_hashval != '') {
                //Insert Cash Entry Line
                $insert_id = $this->Cash_model->insert_entry($param);
                
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Invoice has been generated";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }

    public function update_invoice_entry() {
        //print_r($this->input->post());die;
        $param = $this->input->post();
        $invoice_hashval = $this->Invoice_model->update_invoice_by_hashval($param);
        $update = $this->Cash_model->update_entry_by_hashval_for_invoice($param);        
        
        if ($invoice_hashval != '') {
            $data['status'] = 'success';
            //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
            $data['msg'] = "Invoice has been updated";
        } else {
            $data['status'] = 'error';
            $data['msg'] = ERRORMESSAGETHEME;
        }

        print json_encode($data);
    }

    public function check_invoice_if_exist() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $entry_type = $this->input->post('entry_type');
            if ($entry_type == 1) {
                $reseult = $this->Invoice_model->check_buyer_invoice_if_exist($this->input->post());
            } else if ($entry_type == 2) {
                $reseult = $this->Invoice_model->check_seller_invoice_if_exist($this->input->post());
            }
            if (!empty($reseult)) {
                $data['status'] = 'entry_success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Entry Already exist for the same date, same amount, same vendor, and same entry type<b> <br>Select Yes to Enter Duplicate Entry, No to cancel.</b>";
            } else {
                $data['status'] = 'NO Result';
                $data['msg'] = 'No Entry Found';
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }
    
    public function deactivate_invoice_and_cash_entry_by_hashval() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $invoice_hashval = $this->input->post('hashval');
            $cash_record = $this->Cash_model->get_entry_by_hashval($invoice_hashval);
            if (!empty($cash_record)) {
                $query_execute = $this->Invoice_model->deactivate_invoice_and_cash_entry_by_hashval($invoice_hashval);
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Invoice is deactivated";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }
    
    public function generate_invoice_by_hashval($invoice_hashval) {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') { 

            $data['heading'] = 'Generate invoice';
            $data['invoice_data'] = $this->Invoice_model->get_invoice_entry_by_hashval($invoice_hashval);
            $data['vendor_data'] = $this->Vendor_model->get_vendor_by_id($data['invoice_data']->vendor_id);
            //print_r($data['invoice_data']);die;
            //print_r($data['vendor_data']);die;
            $this->load->view('generate_invoice', $data);
        } else {
            redirect('loggedout');
        }
    }

}
