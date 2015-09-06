<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author baccardi
 */
class Search extends CI_Controller {

    public $data;
    public $script;

    function __construct() {
        parent::__construct();

        $this->load->model('product_m');
        $this->load->model('main_m');
        $this->load->model('subcategories_m');
        $this->load->model('category_m');
        $this->load->model('user_model');
        $this->load->model('settings_m');
        $this->script['city'] = $this->settings_m->get_set('city');
        $this->script['street_build'] = $this->settings_m->get_set('street/build');
        $this->script['phone1'] = $this->settings_m->get_set('phone1');
        $this->script['phone2'] = $this->settings_m->get_set('phone2');
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
        /* load header */
        $this->data['menu'] = $this->main_m->get_menu_item();
        $this->data['partner'] = $this->main_m->get_partners();
        $session = $this->session->userdata('user');
        $this->data['slider'] = $this->main_m->get_slider_item();
        if (!empty($session)) {
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['user_category'] = $this->user_model->get_usercat_byID($this->data['user']['id']);
            if ($this->data['user']['usercat'] == "seller") {
                $num = 1;
            } else {
                $num = 2;
            }
            $this->data['menu'] = $this->main_m->get_menu_front($num);

            $this->load->view("templates/header_user", $this->data);
        } else {
            $this->load->view("templates/header", $this->data);
        }
        /* load sidebar_data */
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
        $this->data['prepare'] = $this->category_m->get_category_sidebar();
        foreach ($this->data['prepare'] as $key => $value) {
            foreach ($this->data['subcat_side'] as $k => $v) {
                if ($v['cat_id'] == $value['id']) {
                    $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                }
            }
        }
        /* load category_m */
        $this->data['location'] = $this->main_m->get_location();
        $this->script['location'] = $this->main_m->get_location();
        $this->data['city'] = $this->main_m->get_city();
        $this->load->model('category_m');
        $this->load->model('subcategories_m');
        $this->data['list'] = $this->subcategories_m->get_subcategories_list();
        $this->data['group_list'] = $this->category_m->focus_product_list();
    }

    function search_name() {
        if (isset($_POST['search'])) {
            $name1 = $this->input->post('name');
            $city_sess[] = $this->input->post('certainCity');
            $this->session->set_userdata(array('city_sess' => $city_sess));
//            print_r($city_sess);
            if (empty($name1)) {
                redirect(base_url('search/prod'));
            } else {
                $name = explode(" ", $name1);
                foreach ($name as $item) {
                    $session_data[] = $item;
                }

                $this->session->set_userdata(array('search' => $session_data));
                redirect(base_url('search/' . $this->translit($name1)));
            }
        } else {
            redirect(base_url('search/prod'));
        }
        unset($this->script, $this->data, $name, $item, $name1, $session_data);
    }

    function get_search() {

        $link = '';
        $name = $this->session->userdata('search');
        $city = $this->session->userdata('city_sess');
//        print_r($city);
        if (empty($name)) {
            $arr = $this->product_m->search_by($name);
            $config['base_url'] = base_url() . 'search/prod';
            $this->data['prep'] = $this->product_m->search_prod($name, $city['0'], 18, $this->uri->segment(3));
            foreach ($this->data['prep'] as $k => $v) {
                foreach ($v as $key => $val) {
                    if ($key == 'name') {
                        $this->data['items'][$k]['trans'] = $this->translit($val);
                    }
                    $this->data['items'][$k][$key] = $val;
                }
            }
            $this->data['total_rows'] = count($arr);
        } else {
            foreach ($name as $item) {
                $arr = $this->product_m->search_by($item);
                $link.=$item . ' ';
            }
            $this->data['total_rows'] = count($arr);
            $config['base_url'] = base_url() . 'search/' . $link;
            foreach ($name as $item) {
                $this->data['prep'] = $this->product_m->search_prod($item,$city['0'], 18, $this->uri->segment(3));
            }
            if (empty($this->data['prep'])) {
                foreach ($name as $item) {
                    $this->data['prep'] = $this->product_m->search_prod($this->untranslit($item), 18, $this->uri->segment(3));
                }
            }
            foreach ($this->data['prep'] as $k => $v) {
                foreach ($v as $key => $val) {
                    if ($key == 'name') {
                        $this->data['items'][$k]['trans'] = $this->translit($val);
                    }
                    $this->data['items'][$k][$key] = $val;
                }
            }
        }
        if ($name)
            $this->session->unset_userdata('search');
        $config['total_rows'] = count($arr);
        $config['per_page'] = '18';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = 'Назад';
        $config['next_link'] = 'Вперед';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->data['prep_popular'] = $this->product_m->get_popular();
        foreach ($this->data['prep_popular'] as $k => $v) {
            foreach ($v as $key => $val) {
                if ($key == 'name') {
                    $this->data['popular'][$k]['trans'] = $this->translit($val);
                }
                $this->data['popular'][$k][$key] = $val;
            }
        }
        $this->data['data_view'] = $this->session->userdata('data_view');

        if (!empty($this->data['data_view'])) {
            foreach ($this->data['data_view'] as $identif) {
                $this->data['prep_views'][] = $this->product_m->get_product($identif);
            }
        }
        if (!empty($this->data['prep_views'])) {
            foreach ($this->data['prep_views'] as $k => $v) {
                foreach ($v as $key => $val) {
                    $this->data['previews'][$val['id']] = $val;
                }
            }
            foreach ($this->data['previews'] as $k => $v) {
                foreach ($v as $key => $val) {
                    if ($key == 'name') {
                        $this->data['views'][$k]['trans'] = $this->translit($val);
                    }
                    $this->data['views'][$k][$key] = $val;
                }
            }
        }
        $this->pagination->initialize($config);
        $this->load->view("pages/products", $this->data);
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
        $this->load->view("templates/footer", $this->script);
        unset($this->script, $this->data, $name, $item, $key, $val, $link, $arr);
    }

    function translit($str) {
        $str = trim($str);
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', '.', ',', '>', '<', ';', ')', '(', '*', '}', '', ', ');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '-', '_', '_', '', '', '', '', '', '', '', '', '_');
        return str_replace($rus, $lat, $str);
    }

    function untranslit($str) {
        $str = trim($str);
        $rus = array(
            "й", "ц", "у", "к", "е", "н", "г", "ш", "щ", "з", "х", "ъ",
            "ф", "ы", "в", "а", "п", "р", "о", "л", "д", "ж", "э",
            "я", "ч", "с", "м", "и", "т", "ь", "б", "ю"
        );
        $lat = array(
            "q", "w", "e", "r", "t", "y", "u", "i", "o", "p", "[", "]",
            "a", "s", "d", "f", "g", "h", "j", "k", "l", ";", "'",
            "z", "x", "c", "v", "b", "n", "m", ",", "."
        );
        return str_replace($lat, $rus, $str);
    }

}
