<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cash extends CI_Controller {

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
    }

    public function index() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Cash Book';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            //print_r($data['vendor_data']);die;
            $this->load->view('add_cash_entry', $data);
        } else {
            redirect('User');
        }
    }
    
    public function edit_entry($hashval) {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Edit Entry';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            $data['entry_data'] = $this->Cash_model->get_entry_by_hashval($hashval);
            //print_r($data);die;
            $this->load->view('edit_entry', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function add_entry() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            //print_r($this->input->post());die;
            $insert_id = $this->Cash_model->insert_entry($this->input->post());
            if ($insert_id != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Entry has been made";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }
    public function check_entry_if_exist() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $reseult = $this->Cash_model->check_entry_if_exist($this->input->post());
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
    
    public function update_entry() {
            //print_r($this->input->post());die;
            $insert_id = $this->Cash_model->update_entry_by_hashval($param = $this->input->post());
            if ($insert_id != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Entry has been updated";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        
        print json_encode($data);
    }
    
    public function list_entries() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'List Entries';
            $data['entries_data'] = $this->Cash_model->get_all_entries();
            //print_r($data);die;
            $this->load->view('list_cash_entries', $data);
        } else {
            redirect('loggedout');
        }
    }
    
     public function delete_cash_entry() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $vendor_identification = $this->input->post('cash_hashval');
            $res = $this->Cash_model->delete_cash_entry_by_id($cash_hashval);
            if ($res != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Entry has been deleted";
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
