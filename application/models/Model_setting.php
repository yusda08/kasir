<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setting extends CI_Model {

    public function get_user() {
        $query = $this->db->query("select a.*, b.ket_level from user a join level_user b on a.kd_level=b.kd_level");
        return $query;
    }

}
