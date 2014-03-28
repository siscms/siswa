<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rpl1 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Rpl1_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    function index() {
        $this->load->model('Rpl1_model');
        $data['Profile'] = "";
        $data['data'] = $this->Rpl1_model->get_all();
        $data['logout'] = 'logout';
        $data['view'] = 'profile';
        $data['kiri'] = 'nav';
        $data['page'] = 'rpl1/view';
        $this->load->view('layout', $data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads_1/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
    }

    function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama Profile', 'required|is_unique[rpl1.nama]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $params['nama'] = $this->input->post('nama');
            $params['gender'] = $this->input->post('gender');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('nama');
            $this->Rpl1_model->add($params);
            $this->do_upload();
            redirect('rpl1');
        } else {
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'rpl1/add';
            $this->load->view('layout', $data);
        }
    }

    function delete($id) {
        $this->Rpl1_model->delete($id);
        redirect('rpl1');
    }

    function update($id) {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Profile', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $params['nama'] = $this->input->post('nama');
            $params['gender'] = $this->input->post('gender');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Rpl1_model->update($this->input->post('id'), $params);
            $this->do_upload();
            redirect('rpl1');
        } else {
            $data['data'] = $this->Rpl1_model->get_id($id);
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'rpl1/edit';
            $this->load->view('layout', $data);
        }
    }

    function galery() {
        $this->load->model('Login_model');
        if ($this->Login_model->check_logged() === TRUE) {
            $data['data'] = $this->Rpl1_model->get_all();
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'rpl1/galeri';
            $this->load->view('layout', $data);
        } else {
            $data['data'] = $this->Rpl1_model->get_all();
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'rpl1/galeri';
            $this->load->view('layout', $data);
        }
    }

}
