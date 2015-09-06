<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author baccardi
 */
class Main_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_stock(){       
        $main = $this->db->where('stock_price >', 0)->where('stock_price !=', '')->get('product');
        return $main->result_array();
    }
    function get_recomend(){       
        $main = $this->db->where('recomendation >', 0)->where('recomendation !=', '')->get('product');
        return $main->result_array();
    }
    function get_page_item($id){
        $main = $this->db->where('link', $id)->get('menu');
        return $main->result_array();
    }
    function get_menu_item(){
        $main = $this->db->where('status', 'enable')->get('menu');
        return $main->result_array();
    }
    
    function get_parent($type) {
        $main = $this->db->where('type', $type)->select('id, name')->get('menu');
        return $main->result_array();
    }

    function insert_item($data) {
        $query = $this->db->insert('menu', $data);
    }

    function get_fst_l() {
        $main = $this->db->where('type', 'r')->get('menu');
        return $main->result_array();
    }

    function get_snd_l() {
        $main = $this->db->where('type', 'd')->get('menu');
        return $main->result_array();
    }

    function get_trd_l() {
        $main = $this->db->where('type', 'dd')->get('menu');
        return $main->result_array();
    }

    function get_location() {
        $location = $this->db->get('city');
        return $location->result_array();
    }

    function get_city() {
        $location = $this->db->get('locality');
        return $location->result_array();
    }

    function get_city_by_id($id) {
        $location = $this->db->where('city_id', $id)->select('id, name')->get('locality');
        return $location->result_array();
    }

    function get_slider_item() {
        $picture = $this->db->get('slider');
        return $picture->result_array();
    }

    function get_slider_insert($data) {
        if ($this->db->insert('slider', $data)) {
            return true;
        }
    }

    function get_partners() {
        $partner = $this->db->get('partners');
        return $partner->result_array();
    }

    function partner_add($data) {
        if ($this->db->insert('partners', $data)) {
            return true;
        }
    }

    function get_pages() {
        $partner = $this->db->query('SELECT * FROM menu WHERE link!="#"');
        return $partner->result_array();
    }
    function get_recent_post() {   
        $this->db->order_by('date','DESC');
        $query = $this->db->get('blog');
        return $query->result_array();
    }

    function get_recent_news() {   
        $this->db->order_by('date','DESC');
        $query = $this->db->get('news');
        return $query->result_array();
    }

    function get_fake() {
        $partner = $this->db->get('fake_comments');
        return $partner->result_array();
    }

    function get_fake_one() {
        $query = $this->db->query("SELECT * FROM `fake_comments` ORDER BY `id`  LIMIT 1");
        return $query->result_array();
    }

    function get_enable_fake() {
        $partner = $this->db->where('status', 'enable')->get('fake_comments');
        return $partner->result_array();
    }
     function get_blog($num, $offset) {
        $blog = $this->db->where('status', 'enable')->order_by("date", "desc")->get('blog',$num, $offset);
        return $blog->result_array();
    }
     function get_news($num, $offset) {
        $blog = $this->db->where('status', 'enable')->order_by("date", "desc")->get('news',$num, $offset);
        return $blog->result_array();
    }
    function count_blog(){
         $blog = $this->db->where('status', 'enable')->order_by("date", "desc")->get('blog');
        return $blog->result_array();
    }
    function count_news(){
         $blog = $this->db->where('status', 'enable')->order_by("date", "desc")->get('news');
        return $blog->result_array();
    }
    function get_blog_by_id($id) {
        $blog = $this->db->where('id', $id)->get('blog');
        return $blog->result_array();
    }
    function get_blog_back() {
        $blog = $this->db->get('blog');
        return $blog->result_array();
    }
    function get_commit_num() {
        $query = $this->db->get('commit');
        return $query->num_rows();
    }
    function get_gallery_data() {
        $query = $this->db->get('gallery');
        return $query->result_array();
    }
    function get_gallery_item($id) {
        $query = $this->db->where('id', $id)->get('gallery');
        return $query->result_array();
    }
   
}
