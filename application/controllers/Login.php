<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_login');
        $this->load->model('Model_aksi');
    }

    public function index() {
        if ($this->session->userdata('is_login')) {
            redirect('home');
        } else {
            $this->load->view('login');
        }
    }

    function validasi() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $row = $this->Model_login->validate_login($username, $password);
        $kd_user = $row->kd_user;
        $count_row = count($row);
        if ($count_row) { // jika data user benar
            if ($row->is_active == 1) {
                $data = array(
                    'kd_user' => $row->kd_user,
                    'username' => $row->username,
                    'password' => $row->password,
                    'kd_level' => $row->kd_level,
                    'ket_level' => $row->ket_level,
                    'nama_user' => $row->nama_user,
                    'is_active' => $row->is_active,
                    'foto' => $row->foto
                );
                $this->session->set_userdata('is_login', $data);
                $data['is_login'] = 1;
                $this->Model_aksi->update('kd_user', $kd_user, 'user', $data);
                echo "true";
            } else {
                echo "false";
            }
        } else {
            return false;
        }
    }

    function logout($kd_user) {
        $this->session->unset_userdata('is_login');
        $data['is_login'] = 0;
        $this->Model_aksi->update('kd_user', $kd_user, 'user', $data);
        redirect('login');
    }

}

?>