<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profileman_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function add($data = array()) {
        $param = array(
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto']
        );

        $this->db->insert('profilman', $param);
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function update($id, $params) {

        $this->db->where('id', $id);
        $this->db->update('profilman', $params);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('profilman');
    }

    function get_all() {
        $sql = $this->db->get('profilman');
        return $sql->result();
    }

    function get_id($id) {
        $this->db->select('id, nama, alamat');
        $this->db->where('id', $id);
        $res = $this->db->get('profilman');
        return $res->row_array();
    }

}
