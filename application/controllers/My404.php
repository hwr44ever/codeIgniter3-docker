<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

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

        $this->output->set_status_header('404');
        $data['heading'] = 'Page not found';

        $this->load->view('404',$data);
    }

}
