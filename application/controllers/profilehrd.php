<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilehrd extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Profilehrd_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('upload');
    }

    function index() {
        $this->load->model('Profilehrd_model');
        $data['Profile'] = "";
        $data['data'] = $this->Profilehrd_model->get_all();
        $data['logout'] = 'logout';
        $data['view'] = 'profile';
        $data['kiri'] = 'nav';
        $data['page'] = 'profilehrd/view';
        $this->load->view('layout', $data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads_hrd/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
    }

    function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama Profil', 'required|is_unique[profilhrd.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $this->load->model('Profilehrd_model');
            $params['nama'] = $this->input->post('nama');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Profilehrd_model->add($params);
            $this->do_upload();
            redirect('profilehrd');
        } else {
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'profilehrd/add';
            $this->load->view('layout', $data);
        }
    }

    function delete($id) {
        $this->Profilehrd_model->delete($id);
        redirect('profilehrd');
    }

    function update($id) {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Profile', 'required|is_unique[profilkeu.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $config['upload_path'] = './uploads_hrd/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $params['nama'] = $this->input->post('nama');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Profilehrd_model->update($this->input->post('id'), $params);
            redirect('profilehrd');
        } else {
            $data['data'] = $this->Profilehrd_model->get_id($id);
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['kiri'] = 'nav';
            $data['page'] = 'profilehrd/edit';
            $this->load->view('layout', $data);
        }
    }

    function galery() {
        $this->load->model('Login_model');
        if ($this->Login_model->check_logged() === TRUE) {
            $data['data'] = $this->Profilehrd_model->get_all();
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'profilehrd/galeri';
            $this->load->view('layout', $data);
        } else {
            $data['data'] = $this->Profilehrd_model->get_all();
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'profilehrd/galeri';
            $this->load->view('layout', $data);
        }
    }

}
