<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    function index() {
        $this->load->model('Profile_model');
        $data['Profile'] = "";
        $data['data'] = $this->Profile_model->get_all();
        $data['logout'] = 'logout';
        $data['view'] = 'profile';
        $data['kiri'] = 'nav';
        $data['page'] = 'profile/view';
        $this->load->view('layout', $data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads_keuangan/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
    }

    function create() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama Profile', 'required|is_unique[profilkeu.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $params['nama'] = $this->input->post('nama');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Profile_model->add($params);
            $this->do_upload();
            redirect('profile');
        } else {
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'profile/add';
            $this->load->view('layout', $data);
        }
    }

    function delete($id) {
        $this->Profile_model->delete($id);
        redirect('profile');
    }

    function update($id) {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Profile', 'required|alpha|is_unique[profilkeu.nama]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $params['nama'] = $this->input->post('nama');
            $params['alamat'] = $this->input->post('alamat');
            $params['foto'] = $this->input->post('foto');
            $this->Profile_model->update($this->input->post('id'), $params);
            $this->do_upload();
            redirect('profile');
        } else {
            $data['data'] = $this->Profile_model->get_id($id);
            $data['kiri'] = 'nav';
            $data['view'] = 'profile';
            $data['logout'] = 'logout';
            $data['page'] = 'profile/edit';
            $this->load->view('layout', $data);
        }
    }

    function galery() {
        $this->load->model('Login_model');
        if ($this->Login_model->check_logged() === TRUE) {
            $data['data'] = $this->Profile_model->get_all();
            $data['logout'] = 'logout';
            $data['view'] = 'profile';
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'profile/galeri';
            $this->load->view('layout', $data);
        } else {
            $data['data'] = $this->Profile_model->get_all();
            $data['kiri'] = 'nav_unlogin';
            $data['page'] = 'profile/galeri';
            $this->load->view('layout', $data);
        }
    }

}
