<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Terbilang
 *
 * @author Asus
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_rupiah extends CI_Model {
    //put your code here
    function terbilang($x) {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return " " . $abil[$x];
        elseif ($x < 20)
            return $this->terbilang($x - 10) . "belas";
        elseif ($x < 100)
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
        elseif ($x < 200)
            return " seratus" . $this->terbilang($x - 100);
        elseif ($x < 1000)
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
        elseif ($x < 2000)
            return " seribu" . $this->terbilang($x - 1000);
        elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
        elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
        elseif ($x < 1000000000000)
            return $this->terbilang($x / 1000000000) . " miliar" . $this->terbilang($x % 1000000000);
    }
    
}
