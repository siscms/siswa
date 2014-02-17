<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profileman extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('Profileman_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('upload');
    }

    function index() {
        $this->load->model('Profileman_model');
        $data['Profile'] = "";
        $data['data'] = $this->Profileman_model->get_all();
        $data['logout'] = 'logout';
        $data['view'] = 'profile';
        $data['kiri'] = 'nav';
        $data['page'] = 'profileman/view';
        $this->load->view('layout', $data);
    }
    
    function do_upload() {
        $config['upload_path'] = './uploads_manager/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
    }

    function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama Profil', 'required|is_unique[profilman.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $this->load->model('Profileman_model');
            $params['nama'] = $this->input->post('nama');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Profileman_model->add($params);
            $this->do_upload();
            redirect('profileman');
        } else {
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'profileman/add';
            $this->load->view('layout', $data);
        }
    }
    function delete($id) {
        $this->Profileman_model->delete($id);
        redirect('profileman');
    }

    function update($id) {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Profile', 'required|is_unique[profilkeu.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $config['upload_path'] = './uploads_manager/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $params['nama'] = $this->input->post('nama');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Profileman_model->update($this->input->post('id'), $params);          
            redirect('profileman');
        } else {
            $data['data'] = $this->Profileman_model->get_id($id);
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['kiri'] = 'nav';
            $data['page'] = 'profileman/edit';
            $this->load->view('layout', $data);
        }
    }

    function galery() {
        $this->load->model('Login_model');
        if ($this->Login_model->check_logged() === TRUE) {
            $data['data'] = $this->Profileman_model->get_all();
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'profileman/galeri';
            $this->load->view('layout', $data);
        } else {
        $data['data'] = $this->Profileman_model->get_all();
        $data['kiri'] = 'nav_unlogin';
        $data['page'] = 'profileman/galeri';
        $this->load->view('layout', $data);
        }   
    }
}
