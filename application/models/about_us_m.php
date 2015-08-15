<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product_m
 *
 * @author baccardi
 */
class About_us_m extends CI_Model {

//
    function __construct() {
        parent::__construct();
    }

    function about_us_data() {
        $query = $this->db->where('id','1')->select('data')->get('about_us_data');
        foreach ($query->result() as $row){
			return $row->data;
		}
    }
	
	function get_uploaded_images() {
        $query = $this->db->get('about_us_uploads');
        
		return $query->result_array();
    }
}
