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

//    function get_menu_front($num) {
//        if (isset($num)) {
////        $main = $this->db->where('status', 'enable')->where('access', '3')->where('type', 'r')->get('menu');
//            $main = $this->db->query('SELECT * FROM menu WHERE type="r" AND  access!=' . $num . ' AND status="enable"');
//            foreach ($main->result_array() as $row) {
//                $arr1[$row['name']] = [$row['id']];
//                $arr1[$row['name']][] = $row['main_link'];
//                $level1 = $this->db->where('status', 'enable')->where('p_id', $row['id'])->get('menu');
//                foreach ($level1->result_array() as $r) {
//                    $arr1[$row['name']][$row['id']][$r['link']] = [$r['name']];
//                    $level2 = $this->db->where('status', 'enable')->where('p_id2', $r['id'])->get('menu');
//                    foreach ($level2->result_array() as $p) {
//                        $arr1[$row['name']][$row['id']][$r['link']][$r['name']][$p['link']] = $p['name'];
//                    }
//                }
//            }
//            return $arr1;
//        }
//    }

//    function get_menu() {
//        $main = $this->db->where('status', 'enable')->where('type', 'r')->get('menu');
//        foreach ($main->result_array() as $row) {
//            $arr1[$row['name']] = [$row['id']];
//            $level1 = $this->db->where('status', 'enable')->where('p_id', $row['id'])->get('menu');
//            foreach ($level1->result_array() as $r) {
//                $arr1[$row['name']][$row['id']][$r['link']] = [$r['name']];
//                $level2 = $this->db->where('status', 'enable')->where('p_id2', $r['id'])->get('menu');
//                foreach ($level2->result_array() as $p) {
//                    $arr1[$row['name']][$row['id']][$r['link']][$r['name']][$p['link']] = $p['name'];
//                }
//            }
//        }
//        return $arr1;
//    }
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

}
