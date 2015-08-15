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
class Product_m extends CI_Model {

//
    function __construct() {
        parent::__construct();
    }

    function get_all_product($num, $offset) {
        $query = $this->db->get('product', $num, $offset);
        return $query->result_array();
    }

    function get_all_products() {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    function count_prod() {
        $query = $this->db->where('status', 'enable')->get('product');
        return $query->num_rows();
    }

    function get_products($link, $num, $offset) {
        $query = $this->db->where('link', $link)->where('status', 'enable')->select('id')->get('subcategories');
        foreach ($query->result() as $row) {
            $subcat_id = $row->id;
        }
        $query = $this->db->where('subcat_id', $subcat_id)->where('status', 'enable')->where('status', 'enable')->get('product', $num, $offset);
        return $query->result_array();
    }

    function get_products_byLINK($link) {
        $query = $this->db->where('link', $link)->where('status', 'enable')->select('id')->get('subcategories');
        foreach ($query->result() as $row) {
            $subcat_id = $row->id;
        }
        $query = $this->db->where('subcat_id', $subcat_id)->where('status', 'enable')->get('product');
        return $query->result_array();
    }

    function get_product($id) {
        $query = $this->db->where('id', $id)->get('product');
        return $query->result_array();
    }

    function get_product_cat($cat_id) {
        $query = $this->db->where('id', $cat_id)->get('subcategories');
        return $query->result_array();
    }

    function count_products($id) {
        $query = $this->db->where('subcat_id', $id)->get('product');
        return $query->num_rows();
    }

    function get_cat_name($link) {
        $query = $this->db->where('link', $link)->select('cat_id')->get('subcategories');
        foreach ($query->result() as $row) {
            $cat_id = $row->cat_id;
        }
        $query = $this->db->where('id', $cat_id)->select('id, name, link')->get('categories');
        return $query->result_array();
    }

    function get_subcat_name($link) {
        $query = $this->db->where('link', $link)->select('name')->get('subcategories');
        foreach ($query->result() as $row) {
            return $row->name;
        }
    }

    function add_product($data) {
        if ($this->db->insert('product', $data)) {
            return TRUE;
        }
    }

    function get_product_by_subcat_id($id) {
        $query = $this->db->where('subcat_id', $id)->get('product');
        return $query->result_array();
    }

    function search_prod($name, $city, $num, $offset) {
        if ($city == 'Вся Украина'||empty($city)) {
            $query = $this->db->like('name', $name)->where('status', 'enable')->order_by("views", "desc")->get('product', $num, $offset);
        } else {
            $query = $this->db->like('name', $name)->where('city', $city)->where('status', 'enable')->order_by("views", "desc")->get('product', $num, $offset);
        }
        return $query->result_array();
    }

    function search_by($name) {
        $query = $this->db->like('name', $name)->get('product');
        return $query->result_array();
    }

    function search_by_city($name, $city) {
        $query = $this->db->where('city', $city)->like('name', $name)->get('product');
        return $query->result_array();
    }

    function add_order($data) {
        if ($this->db->insert('orders', $data)) {
            return TRUE;
        }
    }

    function get_user_by_product($id) {
        $query = $this->db->where('id', $id)->select('id_user')->get('product');
        foreach ($query->result() as $row) {
            return $row->id_user;
        }
    }

    function get_order() {
        $query = $this->db->get('orders');
        return $query->result_array();
    }

    function get_order_img($id) {
        $query = $this->db->where('id', $id)->select('image_path')->get('product');
        foreach ($query->result() as $row) {
            return $row->image_path;
        }
    }

    function get_new_order() {
        $query = $this->db->where('a_status', 'new')->get('orders');
        return $query->result_array();
    }

    function get_product_name($link, $num, $offset) {
        $query = $this->db->where('link', $link)->select('id')->get('subcategories');
        foreach ($query->result() as $row) {
            $subcat_id = $row->id;
        }
        $query = $this->db->where('subcat_id', $subcat_id)->select('name')->get('product', $num, $offset);
        return $query->result_array();
    }

    function get_item_by_user_id($id) {
        $query = $this->db->where('id_user', $id)->get('product');
        return $query->result_array();
    }

    function get_item_by_userid($id_user, $id) {
        $query = $this->db->where('id_user', $id_user)->where('status', 'enable')->where('id !=', $id)->get('product');
        return $query->result_array();
    }

    function get_item_like_subcat($id, $subcat, $name) {
        $query = $this->db->where('id !=', $id)->where('subcat_id', $subcat)->where('status', 'enable')->like('name', $name)->get('product');
//         $query=$this->db->query("SELECT * FROM product WHERE name LIKE '%$name%'");
        return $query->result_array();
    }

    function get_popular() {
        $query = $this->db->query("SELECT * FROM `product` WHERE views>0 ORDER BY `views` DESC LIMIT 10");
        return $query->result_array();
    }

}
