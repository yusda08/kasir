<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_master
 *
 * @author Asus
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master extends CI_Model {

    public function get_jenisBarang() {
        $query = $this->db->query("select * from master_jenis_barang");
            return $query;
    }

}
