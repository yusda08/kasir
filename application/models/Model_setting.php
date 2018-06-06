<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setting extends CI_Model {

    public function get_user() {
        $query = $this->db->query("select a.*, b.ket_level from user a join level_user b on a.kd_level=b.kd_level order by a.kd_level, a.kd_user asc");
        return $query;
    }
    
    public function get_profil() {
        $query = $this->db->query("select * from profil");
        return $query;
//        if ($query->num_rows() == 1) {
//            return $query->row();
//        } else {
//            return false;
//        }
    }
    
    public function get_levelUser() {
        $query = $this->db->query("select * from level_user order by kd_level");
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
}
