<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilehrd_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function add($data = array()) {
        $param = array(
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto']
        );

        $this->db->insert('profilhrd', $param);
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function update($id, $params) {

        $this->db->where('id', $id);
        $this->db->update('profilhrd', $params);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('profilhrd');
    }

    function get_all() {
        $sql = $this->db->get('profilhrd');
        return $sql->result();
    }

    function get_id($id) {
        $this->db->select('id, nama, alamat');
        $this->db->where('id', $id);
        $res = $this->db->get('profilhrd');
        return $res->row_array();
    }

}
