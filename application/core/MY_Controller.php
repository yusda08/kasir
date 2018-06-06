<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author Asus
 */
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
    }

    public function layout() {
        $a = $this->session->userdata('is_login');
        $id['kd_user'] = $a['kd_user'];
        $data['head'] = $this->load->view('temp_home/head', NULL, TRUE);
        $data['nav'] = $this->load->view('temp_home/nav', $id, TRUE);
        $data['nav_header'] = $this->load->view('temp_home/nav_header', NULL, TRUE);
        $data['footer'] = $this->load->view('temp_home/footer', NULL, TRUE);
        return $data;
    }
    
    public function javasc() {
        $a = $this->session->userdata('is_login');
        $id['kd_user']= $a['kd_user'];
        $data['javasc'] = $this->load->view('home/js', $id, TRUE);
        return $data;
    }
    
    public function aktifitas($ket){
        $a = $this->session->userdata('is_login');
        if ($this->agent->is_browser()) {
            $browser = $this->agent->browser() . ' ' . $this->agent->version() . ' (' . $this->agent->platform() . ')';
        } elseif ($this->agent->is_robot()) {
            $browser = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $browser = $this->agent->mobile();
        } else {
            $browser = 'Unidentified User Agent';
        } 
        $ip = $_SERVER['REMOTE_ADDR'];
        $nm_komputer = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data1['ip'] = $ip;
        $data1['tanggal'] = date("Y-m-d");
        $data1['jam'] = date("H:i:s");
        $data1['nm_browser'] = $browser;
        $data1['nm_komputer'] = $nm_komputer;
        $data1['nama_admin'] = $a['nama_user'];;
        $data1['keterangan'] = $ket;
        $data1['level'] = $a['ket_level'];
        $this->Model_aksi->insert('aktifitas', $data1);
    }

}
