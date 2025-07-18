<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $this->load->model('Item_model');
        $this->load->model('Cash_model');
    }

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
     */
    public function index()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Dashboard';
            $total_value_of_credit = $this->Cash_model->get_total_value_of_credit();
            $total_value_of_future_credit = $this->Cash_model->get_total_value_of_future_credit();
            $total_value_of_future_debit = $this->Cash_model->get_total_value_of_future_debit();
            $total_value_of_debit = $this->Cash_model->get_total_value_of_debit();

            // print_r($total_value_of_debit);die;
            $data['total_value_of_credit'] = (float) $total_value_of_credit[0]->total_credit;
            $data['total_value_of_future_credit'] = (float) $total_value_of_future_credit[0]->future_credit;
            $data['total_value_of_debit'] = (float) $total_value_of_debit[0]->total_debit;
            $data['total_value_of_future_debit'] = (float) $total_value_of_future_debit[0]->future_debit;
            //print_r($total_value_of_future_debit);die;
            $this->load->view('dashboard', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function add_item()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Add Item';
            $this->load->view('add_item', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function list_item()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'List Items';
            $data['items_data'] = $this->Item_model->get_all_items();
            $this->load->view('list_item', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function user_query()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Query Page';
            //$insert_id = $this->Item_model->user_query_model($this->input->post());
            $this->load->view('query_view', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function user_qurey_added()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $query_text = $this->input->post('detail_message');
            $insert_id = $this->Item_model->user_query_model($query_text);
            if ($insert_id != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Item " . SUCCESSMESSAGETHEME;
            }
            else
            {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        }
        else
        {
            redirect('loggedout');
        }
        print json_encode($data);
    }

    public function item_added()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $item_name = ucfirst($this->input->post('item_name'));
            $insert_id = $this->Item_model->insert_item($item_name, $user_id);
            if ($insert_id != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Item " . SUCCESSMESSAGETHEME;
            }
            else
            {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        }
        else
        {
            redirect('loggedout');
        }
        print json_encode($data);
    }

    public function edit_item($hasval)
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Edit Item';
            $data['item_data'] = $this->Item_model->get_item_by_hashval($hasval);
            //print_r($data);die;
            $this->load->view('edit_item', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function delete_item()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $item_id = $this->input->post('item_id');
            $res = $this->Item_model->delete_item_by_id($item_id);
            if ($res != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Item is deleted";
            }
            else
            {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        }
        else
        {
            redirect('loggedout');
        }
        print json_encode($data);
    }

    public function update_item()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $item_id = $this->input->post('item_id');
            $item_name = $this->input->post('item_name');
            $data['heading'] = 'Edit Item';
            $res = $this->Item_model->update_item($item_id, $item_name);
            if ($res != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Item has successfully been updated";
            }
            else
            {
                $data['status'] = 'error';
                $data['msg'] = ERRORMESSAGETHEME;
            }
        }
        else
        {
            redirect('loggedout');
        }
        print json_encode($data);
    }

}
