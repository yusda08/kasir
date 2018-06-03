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

class Setting extends MY_Controller {
    
    
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_aksi');
        $this->load->model('Model_setting');
    }

    public function set_user() {
        if ($this->session->userdata('is_login')) {
            $data = $this->layout();
            $data['name_page'] = 'Setting';
            $data['name_page_small'] = 'User';
            $record['get_user'] = $this->Model_setting->get_user();
            $record['javasc'] = $this->load->view('home/js', NULL, TRUE);
            $data['content'] = $this->load->view('setting/set_user', $record, TRUE);
            $this->load->view('temp_home/layout', $data);
        }else{
            redirect('login');
        }
    }

}
