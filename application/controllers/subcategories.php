<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subcategories_front
 *
 * @author baccardi
 */
class Subcategories extends CI_Controller {

    public $data;
    public $script;

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('main_m');
        $this->load->model('settings_m');
        $this->script['city'] = $this->settings_m->get_set('city');
        $this->script['street_build'] = $this->settings_m->get_set('street/build');
        $this->script['phone1'] = $this->settings_m->get_set('phone1');
        $this->script['phone2'] = $this->settings_m->get_set('phone2');
         $this->data['phone1'] = $this->script['phone1'];
        $this->data['phone2'] =  $this->script['phone2'];
        $this->script['email'] = $this->settings_m->get_set('email');
        $this->script['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->script['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->script['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->script['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['recent_post']=$this->main_m->get_recent_post();
        $this->data['recent_news']=$this->main_m->get_recent_news();
        $this->data['menu'] = $this->main_m->get_menu_item();
        $this->load->view("templates/header",  $this->data);
        $this->load->model('subcategories_m');
        $this->load->model('category_m');
        $this->load->model('product_m');       
        $this->script['location'] = $this->main_m->get_location();
        $this->data['location'] = $this->main_m->get_location();
        $this->data['city'] = $this->main_m->get_city();
        $this->data['partner'] = $this->main_m->get_partners();
         $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
            $this->data['prepare'] = $this->category_m->get_category_sidebar();
            foreach ($this->data['prepare'] as $key => $value) {
                foreach ($this->data['subcat_side'] as $k => $v) {
                    if ($v['cat_id'] == $value['id']) {
                        $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                    }
                }
            }
        $this->script['script'] = "<script src='../../../js/validation.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                . "<script src='../../../js/autoComplete.js'></script>"
                . "<script src='../../../js/main.js'></script>"
                . "<script src='../../../js/cart.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/bootstrap-switch.js'></script>"
                . "<script src='../../../js/main_nav.js'></script>"
                . "<script src='../../../js/switcher.js'></script>"
                . "<script src='../../../js/sidebar.js'></script>";
    }

    function get_all_subcat() {
        $this->data['subcategories'] = $this->subcategories_m->get_subcategories_list();
        $sub = $this->data['subcategories'];
        if (!empty($sub)) {
            foreach ($this->data['subcategories'] as $k => $arr) {
                $id[] = $arr['id'];
            }
            foreach ($id as $k => $v) {
                $this->data['count'][$v] = $this->product_m->count_products($v);
            }
        }
        $this->load->view("pages/subcategories", $this->data);
        $this->load->view("templates/footer", $this->script);
        unset($this->script, $this->data, $sub);
    }

    function get_subgategory($name = '') {
        $this->data['category'] = $this->category_m->get_category_name($name);
        $this->data['link'] = $name;
        $this->data['subcategories'] = $this->subcategories_m->get_subcategories($name);
        $sub = $this->data['subcategories'];
        if (!empty($sub)) {
            foreach ($this->data['subcategories'] as $k => $arr) {
                $id[] = $arr['id'];
            }
            foreach ($id as $k => $v) {
                $this->data['count'][$v] = $this->product_m->count_products($v);
            }
        }
        $this->load->view("pages/subcategories", $this->data);
        $this->load->view("templates/footer", $this->script);
        unset($this->script, $this->data, $sub, $id, $name);
    }

}
