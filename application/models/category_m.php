<?php

class Category_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function category_list() {
        $query = $this->db->query("SELECT id,name,status,link,fp_id FROM categories");
        return $query->result_array();
    }

    function add_category($data) {
        $this->db->insert('categories', $data);
    }

    function focus_product_list() {
        $query = $this->db->query("SELECT id,name,status FROM focus_products");
        return $query->result_array();
    }
    function get_category_description($id) {
        $query = $this->db->where('id', $id)->select('description')->get('categories');
        foreach ($query->result() as $row) {
            return $row->description;
        }
    }

    function add_focus_product($data) {
        $this->db->insert('focus_products', $data);
    }

    function get_category_list($id) {
        $query = $this->db->where('fp_id', $id)->where('status', 'enable')->select('name, link')->get('categories');
        return $query->result_array();
    }

    function get_category_name($name) {
        $query = $this->db->where('link', $name)->select('name')->get('categories');
        foreach ($query->result() as $row) {
            return $row->name;
        }
    }
    function get_category_id_by_link($name) {
        $query = $this->db->where('link', $name)->select('id')->get('categories');
        foreach ($query->result() as $row) {
            return $row->id;
        }
    }
    function get_category_listby_id($id) {
        $query = $this->db->where('fp_id', $id)->where('status', 'enable')->select('name, id')->get('categories');
        return $query->result_array();
    }
     function get_category_sidebar() {
        $query = $this->db->where('status', 'enable')->get('categories');
        return $query->result_array();
    }
}
