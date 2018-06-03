<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author yusda08
 */
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(dirname(__FILE__) . "/Temp.php");

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->layout();
        $record['javasc'] = $this->load->view('home/js', NULL, TRUE);
        $data['content'] = $this->load->view('home/baranda', $record, TRUE);
        $this->load->view('temp_home/layout', $data);
    }

}
