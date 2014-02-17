<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function add($data = array()) {
        $param = array(
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto'],
        );
        $this->db->insert('profilkeu', $param);
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function update($id, $params) {

        $this->db->where('id', $id);
        $this->db->update('profilkeu', $params);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('profilkeu');
    }

    function get_all() {
        $sql = $this->db->get('profilkeu');
        return $sql->result();
    }

    function get_id($id) {
        $this->db->select('id, nama, alamat');
        $this->db->where('id', $id);
        $res = $this->db->get('profilkeu');
        return $res->row_array();
    }

}
