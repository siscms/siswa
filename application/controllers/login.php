<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    function index() {
        if ($this->Login_model->check_logged()===TRUE)
        {  
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['kiri'] = 'widget';
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
                redirect('profile');
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

    function about() {
        if ($this->Login_model->check_logged()===TRUE)
        {  
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['page'] = 'about';
            $this->load->view('layout', $data);
        }
        else
        {
        $data['page'] = 'about';
        $this->load->view('layout', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}
