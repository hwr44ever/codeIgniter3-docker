<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $user_id = '';
        $my_server_addres = $_SERVER['HTTP_HOST'];
        if($my_server_addres != "najamtraderssargodha.com"){
            //header('Location:https://najamtraderssargodha.com');
        }
        if (isset($_SESSION['user_id']))
        {
            $user_id = $_SESSION['user_id'];
        }
        if ($user_id != '')
        {
            redirect('home');
        }
        else
        {
            $data['heading'] = "Login";
            $this->load->view('login', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('user_email');
        $password = $this->input->post('password');
        //print_r($this->input->post());die;
        $user_detail = $this->User_model->user_login($username, $password);
        if (!empty($user_detail))
        {
            $this->create_session($user_detail);
            $data['status'] = 'success';
            //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
            $data['msg'] = "Login Successfully";
        }
        else
        {
            $data['status'] = 'error';
            $data['msg'] = ERRORMESSAGETHEME . '<br> Looks like you entered wrong password';
        }
        print json_encode($data);
    }

    public function create_session($user_detail)
    {
        if (!empty($user_detail))
        {   
            $profile_pic = '';
            if($user_detail[0]->profile_pic != ''){
                $profile_pic = base_url(SITETHEME).$user_detail[0]->profile_pic;
            }else{
                $profile_pic = 'https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg';
            }
            $newdata = array(
                'fullname' => $user_detail[0]->first_name . " " . $user_detail[0]->last_name,
                'email' => $user_detail[0]->email,
                'user_id' => $user_detail[0]->user_id,
                'user_type' => $user_detail[0]->user_type,
                'user_pic' => base_url(SITETHEME).$user_detail[0]->profile_pic
            );
            $this->session->set_userdata($newdata);
        }
    }

    public function logout()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            session_destroy();
            redirect('User');
        }
        else
        {
            redirect('User');
        }
    }

    public function logged_out()
    {
        $this->load->view('loggedout');
    }

    public function add_user()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Add User';
            $this->load->view('add_user', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function change_password()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Change Password';
            $this->load->view('change_password', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function change_user_password($user_hashval)
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Change User Password';
            $this->load->view('change_user_password', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function password_updated()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            //print_r($this->input->post());die;
            $user_password = md5($this->input->post('change_password') . '');
            $insert_id = $this->User_model->password_updated($user_password, $user_id);
            if ($insert_id != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User Password has been updated";
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

    public function user_password_update_by_hashval()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            //print_r($this->input->post());die;
            $user_password = md5($this->input->post('change_password') . '');
            $user_hashval = $this->input->post('user_hashval');
            $insert_id = $this->User_model->user_password_updated($user_password, $user_hashval);
            if ($insert_id != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User Password has been updated";
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

    public function user_added()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            // print_r($this->input->post());die;
            $insert_id = $this->User_model->insert_user($this->input->post());
            if ($insert_id != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User " . SUCCESSMESSAGETHEME;
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

    public function list_users()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'List Users';
            $data['users_data'] = $this->User_model->get_all_users();
            //print_r($data);die;
            $this->load->view('list_users_with_pic', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function list_disabled_users()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Disabled Users List';
            $data['users_data'] = $this->User_model->get_all_disabled_users();
            //print_r($data);die;
            $this->load->view('list_disabled_user', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function edit_user($user_hashval)
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $data['heading'] = 'Edit User';
            $data['user_data'] = $this->User_model->get_user_by_hashval($user_hashval);
            //print_r($data);die;
            $this->load->view('edit_user', $data);
        }
        else
        {
            redirect('loggedout');
        }
    }

    public function update_user()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $res = $this->User_model->update_user($this->input->post());
            //print_r($data);die;
            if ($res != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User has successfully been updated";
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

    public function delete_user()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $users_identification = $this->input->post('user_id');
            $res = $this->User_model->delete_user_by_id($users_identification);
            if ($res != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User is deactivated";
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

    public function enable_user()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $users_identification = $this->input->post('user_id');
            $res = $this->User_model->enable_user_by_id($users_identification);
            if ($res != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "User is Activated";
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
    
    public function check_email_if_exist()
    {
        $user_id = $_SESSION['user_id'];
        if ($user_id != '')
        {
            $users_email = $this->input->post('emailId');
            $res = $this->User_model->get_user_by_email($users_email);
            //print_r($res);die;
            if ($res != '')
            {
                $data['status'] = 'success';
                //$data['redirect'] = base_url() . 'realnet/realnet-entity/addedit-entity/' . $partner_hashval . '/' . $result['hashval'] . '#tabs-2';
                $data['msg'] = "Email address is already in use. Please choose another";
            }
            
        }
        else
        {
            redirect('loggedout');
        }
        print json_encode($data);
    }

}
