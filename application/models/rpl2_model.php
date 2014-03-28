<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rpl2_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function add($data = array()) {
        $param = array(
            'nama' => $data['nama'],
            'gender' => $data['gender'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto']
        );

        $this->db->insert('rpl2', $param);
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function update($id, $params) {

        $this->db->where('id', $id);
        $this->db->update('rpl2', $params);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('rpl2');
    }

    function get_all() {
        $sql = $this->db->get('rpl2');
        return $sql->result();
    }

    function get_id($id) {
        $this->db->select('id, nama, foto, alamat');
        $this->db->where('id', $id);
        $res = $this->db->get('rpl2');
        return $res->row_array();
    }

}
