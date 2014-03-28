<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rpl3 extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('Rpl3_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('upload');
    }

    function index() {
        $this->load->model('Rpl3_model');
        $data['Profile'] = "";
        $data['data'] = $this->Rpl3_model->get_all();
        $data['logout'] = 'logout';
        $data['view'] = 'profile';
        $data['kiri'] = 'nav';
        $data['page'] = 'rpl3/view';
        $this->load->view('layout', $data);
    }
    
    function do_upload() {
        $config['upload_path'] = './uploads_3/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
    }

    function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama Profil', 'required|is_unique[rpl3.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $this->load->model('Rpl3_model');
            $params['nama'] = $this->input->post('nama');
            $params['gender'] = $this->input->post('gender');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('nama');
            $this->Rpl3_model->add($params);
            $this->do_upload();
            redirect('rpl3');
        } else {
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'rpl3/add';
            $this->load->view('layout', $data);
        }
    }
    function delete($id) {
        $this->Rpl3_model->delete($id);
        redirect('rpl3');
    }

    function update($id) {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Profile', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $config['upload_path'] = './uploads_3/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $params['nama'] = $this->input->post('nama');
            $params['gender'] = $this->input->post('gender');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Rpl3_model->update($this->input->post('id'), $params);          
            redirect('rpl3');
        } else {
            $data['data'] = $this->Rpl3_model->get_id($id);
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['kiri'] = 'nav';
            $data['page'] = 'rpl3/edit';
            $this->load->view('layout', $data);
        }
    }

    function galery() {
        $this->load->model('Login_model');
        if ($this->Login_model->check_logged() === TRUE) {
            $data['data'] = $this->Rpl3_model->get_all();
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'rpl3/galeri';
            $this->load->view('layout', $data);
        } else {
        $data['data'] = $this->Rpl3_model->get_all();
        $data['kiri'] = 'nav_unlogin';
        $data['page'] = 'rpl3/galeri';
        $this->load->view('layout', $data);
        }   
    }
}
