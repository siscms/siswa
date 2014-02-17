<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    var $table = 'user';

    function check_user($username, $password) {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('user');

        if ($query->num_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function check_logged ()
    {
        return ($this->session->userdata('login'))?TRUE:FALSE;
    }
    
    function loggned ()
    {
        return ($this->check_logged())?$this->session->userdata('login'):'';
    }

}
