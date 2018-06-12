<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting
 *
 * @author Asus
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_aksi');
        $this->load->model('Model_master');
    }

    public function jenis_barang() {
        if ($this->session->userdata('is_login')) {
            $data = $this->layout();
            $record = $this->javasc();
            $data['name_page'] = 'Master';
            $data['name_page_small'] = 'Jenis Barang';
            $record['get_jenisBarang'] = $this->Model_master->get_jenisBarang();
            $data['content'] = $this->load->view('master/jenis_barang', $record, TRUE);
            $this->load->view('temp_home/layout', $data);
        } else {
            redirect('login');
        }
    }
    
    function insertJenis() {
        $kd_jenis1 = $this->input->post('kd_jenis1');
        $ket_aksi = $this->input->post('ket');
        $kd_jenis2 = $this->input->post('kd_jenis2');
        $data['kd_jenis'] = trim($kd_jenis1.$kd_jenis2);
        $data['ket_jenis'] = $this->input->post('ket_jenis');
        $qry = $this->Model_aksi->insert_duplicate('master_jenis_barang', $data);
        if ($qry) {
            
            $ket = $ket_aksi.' Jenis Barang Dengan KODE = '.trim($kd_jenis1.$kd_jenis2);
            $this->aktifitas($ket);
            echo 'true';
        } else {
            echo 'false';
        }
    }
    function deleteJenis() {
        $kd_jenis1 = $this->input->post('kd_jenis1');
        $kd_jenis2 = $this->input->post('kd_jenis2');
        $kd_jenis = trim($kd_jenis1.$kd_jenis2);
        $qry = $this->Model_aksi->delete('kd_jenis', $kd_jenis, 'master_jenis_barang');
        if ($qry) {
            $ket = 'Hapus Jenis Barang Dengan KODE = '.trim($kd_jenis1.$kd_jenis2);
            $this->aktifitas($ket);
            echo 'true';
        } else {
            echo 'false';
        }
    }
}