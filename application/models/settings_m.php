<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crud
 *
 * @author baccardi
 */
class Settings_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_set($param) {
        $query = $this->db->where('parametr', $param)->select('value')->get('settings');
        foreach ($query->result() as $row) {
            return $row->value; 
        }
    }

    function get_setlist() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

}
