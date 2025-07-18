<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
        $this->load->model('Vendor_model');
        $this->load->model('Cash_model');
    }

    public function add_vendor() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Add Vendor';
            $this->load->view('add_vendor', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function vendor_added() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            //print_r($this->input->post());die;
            $insert_id = $this->Vendor_model->insert_vendor($this->input->post());
            if ($insert_id != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Vendor is added";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }
    
   

    public function list_vendors() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'List Vendors';
            $data['vendor_data'] = $this->Vendor_model->get_all_vendor();
            //print_r($data);die;
            $this->load->view('list_vendors', $data);
        } else {
            redirect('loggedout');
        }
    }
    public function list_vendors_entries($vendor_hashval) {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {           
            $vendor_data = $this->Vendor_model->get_vendor_by_hashval($vendor_hashval);
            //print_r($vendor_data);die;
            
            $data['vendor_entries_data'] = $this->Cash_model->get_all_entries_by_vendor_id($vendor_data->vendor_id);
            //print_r($data['vendor_entries_data']);die;
            $data['heading'] = $vendor_data->vendor_company.' Entries';
            //print_r($data);die;
            $this->load->view('list_entries', $data);
        } else {
            redirect('loggedout');
        }
    }
 

    public function edit_vendor($hashval) {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $data['heading'] = 'Edit Vendor';
            $data['vendor_data'] = $this->Vendor_model->get_vendor_by_hashval($hashval);
            //print_r($data);die;
            $this->load->view('edit_vendor', $data);
        } else {
            redirect('loggedout');
        }
    }

    public function update_vendor() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            
            $res = $this->Vendor_model->update_vendor($this->input->post());
            //print_r($data);die;
            if ($res != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Vendor has successfully been updated";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }

    public function delete_vendor() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $vendor_identification = $this->input->post('vendor_id');
            $res = $this->Vendor_model->delete_vendor_by_id($vendor_identification);
            if ($res != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Vendor is deactivated";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }

    public function enable_vendor() {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '') {
            $users_identification = $this->input->post('user_id');
            $res = $this->User_model->enable_user_by_id($users_identification);
            if ($res != '') {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User is Activated";
            } else {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        } else {
            redirect('loggedout');
        }
        print json_encode($data);
    }
    
    public function list_disabled_vendor()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Disabled Vendors List';
            $data['users_data'] = $this->Vendor_model->get_all_disabled_vendors();
            //print_r($data);die;
            $this->load->view('list_disabled_vendors', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }
    
}
