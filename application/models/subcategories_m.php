<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subcategories_m
 *
 * @author baccardi
 */
class subcategories_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_subcategories_list() {
        $query = $this->db->get('subcategories');
        return $query->result_array();
    }
     function get_subcategories_sidebar() {
        $query = $this->db->where('status', 'enable')->get('subcategories');
        return $query->result_array();
    }
    
    function get_subcategories_limit12() {
        $query = $this->db->limit(12)->where('status', 'enable')->get('subcategories');
        return $query->result_array();
    }
    function get_subcategories_pagin($num, $offset) {
        $query = $this->db->get('subcategories', $num, $offset);
        return $query->result_array();
    }

    function get_subcategories_list_by_category($id) {
        $query = $this->db->where("cat_id", $id)->get('subcategories');
        return $query->result_array();
    }

    function get_cat_id($id) {
       $query = $this->db->where("id", $id)->select('cat_id')->get('subcategories');
       foreach ($query->result() as $row) {
            return $row->cat_id;
        }       
    }

    function add_subcategory($data) {
        $this->db->insert('subcategories', $data);
    }

    function get_subcategories($name) {
        $id = $this->db->where("link", $name)->select('id')->get('categories');
        foreach ($id->result() as $row) {
            $cat_id = $row->id;
        }
        if(!empty($cat_id)){
        $query = $this->db->where("cat_id", $cat_id)->get('subcategories');
        return $query->result_array();
        }
    }

    function get_subcategories_name_by_id($id) {
        $query = $this->db->where("id", $id)->select('id,name')->get('subcategories');
        foreach ($query->result() as $row) {
            $a['id'] = $row->id;
            $a['name'] = $row->name;
            return $a;
        }
    }

    function get_subcategory_by_subcat_id($id) {
        $query = $this->db->where("id", $id)->select('subcat_id')->get('product');
        foreach ($query->result() as $row) {
            return $row->subcat_id;
        }
    }

    function get_subcategory_by_cat_id($id) {
        $query = $this->db->where("cat_id", $id)->select('id')->get('subcategories');
       foreach ($query->result() as $row) {
            return $row->id;
        }
    }
     function get_subcategories_by_category($id) {
        $query = $this->db->where("cat_id", $id)->select('name, id')->get('subcategories');
        return $query->result_array();
    }     
     function get_subcategories_by_cat_id($id) {
        $query = $this->db->where("cat_id", $id)->select('id, name')->get('subcategories');
        return $query->result_array();
    }     
}
