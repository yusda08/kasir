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

}
