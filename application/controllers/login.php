<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    function index() {
        if ($this->Login_model->check_logged()===TRUE)
        {  
            $rpl1 = $this->Login_model->total_rpl1();
            $rpl2 = $this->Login_model->total_rpl2();
            $rpl3 = $this->Login_model->total_rpl3();
            $data['total_rpl1']= $this->Login_model->total_rpl1();
            $data['total_rpl2']= $this->Login_model->total_rpl2();
            $data['total_rpl3']= $this->Login_model->total_rpl3();
            $data['total']=$rpl1 + $rpl2 + $rpl3;
            $data['logout'] = 'logout';
            $data['kiri'] = 'dashboard';
            $data['view'] = 'profile';
            $data['page'] = 'index';
            $this->load->view('layout', $data);
        }
        else
        {
        $data['kiri'] = 'login';
        $data['page'] = 'index';
        $this->load->view('layout', $data);
        }
    }

    function process_login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->Login_model->check_user($username, $password) == TRUE) {
                $login = array('username' => $username, 'login' => TRUE);
                $this->session->set_userdata($login);
                redirect('login');
            } else {
                $data['pesan'] = 'pesan';
                $data['kiri'] = 'login';
                $data['page'] = 'index';
                $this->load->view('layout', $data);
            }
        } else {
            $data['pesan'] = 'pesan';
            $data['kiri'] = 'login';
            $data['page'] = 'index';
            $this->load->view('layout', $data);
        }
    }

    function galery() {
        if ($this->Login_model->check_logged()===TRUE)
        {  
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['page'] = 'galery';
            $this->load->view('layout', $data);
        }
        else
        {
            $data['page'] = 'galery';
            $this->load->view('layout', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
    
    

}
