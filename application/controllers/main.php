<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public $data = '';
    public $script = '';

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('main_m');
        $this->load->model('settings_m');
        $this->load->model('product_m');
        $this->load->model('about_us_m');
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
        $this->data['prep_popular'] = $this->product_m->get_popular();
        $this->data['gallery'] = $this->main_m->get_gallery_data();
        $this->data['about_us'] = $this->about_us_m->about_us_data();
        foreach ($this->data['prep_popular'] as $k => $v) {
            foreach ($v as $key => $val) {
                if ($key == 'name') {
                    $this->data['popular'][$k]['trans'] = $this->translit($val);
                }
                $this->data['popular'][$k][$key] = $val;
            }
        }

        /* load header */
        $this->data['slider'] = $this->main_m->get_slider_item();
        $session = $this->session->userdata('user');
        $this->data['menu'] = $this->main_m->get_menu_item();
        $this->load->view("templates/header", $this->data);
        
        /* load category_m */

        $this->load->model('main_m');
        $this->load->model('category_m');
        $this->load->model('subcategories_m');
        $this->data['list'] = $this->subcategories_m->get_subcategories_list();

        $this->data['subcategory_img'] = $this->subcategories_m->get_subcategories_limit12();

        $this->data['partner'] = $this->main_m->get_partners();
        $this->data['group_list'] = $this->category_m->focus_product_list();
        $this->data['location'] = $this->main_m->get_location();
        $this->script['location'] = $this->main_m->get_location();
        $this->data['city'] = $this->main_m->get_city();
        $this->data['fake'] = $this->main_m->get_enable_fake();
        $this->data['fake_one'] = $this->main_m->get_fake_one();

        /* load subcategories_m */
    }

    function translit($str) {
        $str = trim($str);
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', '.', ',', '>', '<', ';', ')', '(', '*', '}', '', ', ');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '-', '_', '_', '', '', '', '', '', '', '', '', '_');
        return str_replace($rus, $lat, $str);
    }

    /* Main Page USER */

    public function index($page = "default") {
         $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
            $this->data['prepare'] = $this->category_m->get_category_sidebar();
            foreach ($this->data['prepare'] as $key => $value) {
                foreach ($this->data['subcat_side'] as $k => $v) {
                    if ($v['cat_id'] == $value['id']) {
                        $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                    }
                }
            }
            $this->data['slider'] = $this->main_m->get_slider_item();

        if (file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            $this->load->view("pages/$page", $this->data);
        }elseif (file_exists(APPPATH . '/views/userpages/' . $page . '.php')) {
            $this->data['user_cont']=$this->main_m->get_page_item($page);
            $this->load->view("pages/template_user", $this->data);               
        }else {
             show_404();  
        }
        switch ($page) {
            case'registration':
                $this->script['script'] = "<script src='../../../js/validation.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>";
                break;
            case'edit_item':
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
                        . "<script src='../../../js/products.js'></script>";
            default:
                $this->script['script'] = ""
                        . "<script src='../../../js/sidebar.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>"
                        . "<script src='../../../js/main_tabs.js'></script>";

                break;
        }
        $this->load->view("templates/footer", $this->script);
        unset($this->script, $this->data);
    }

    /* END Main Page USER */
    /* get_blog START */

    public function get_blog() {
        $this->data['city'] = $this->settings_m->get_set('city');
        $this->data['street_build'] = $this->settings_m->get_set('street/build');
        $this->data['phone1'] = $this->settings_m->get_set('phone1');
        $this->data['phone2'] = $this->settings_m->get_set('phone2');
        $this->data['email'] = $this->settings_m->get_set('email');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
        $this->data['prepare'] = $this->category_m->get_category_sidebar();
        foreach ($this->data['prepare'] as $key => $value) {
            foreach ($this->data['subcat_side'] as $k => $v) {
                if ($v['cat_id'] == $value['id']) {
                    $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                }
            }
        }
        $arr = $this->main_m->count_blog();
        $config['base_url'] = base_url() . 'blog/page';
        $config['total_rows'] = count($arr);
        $config['per_page'] = '10';
        $config['full_tag_open'] = '<ul class="pagination-list text-center">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><a  class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = 'Назад';
        $config['next_link'] = 'Вперед';
        $config['prev_tag_open'] = '<li><a class="prev-pag">';
        $config['prev_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li><a class="next-pag">';
        $config['next_tag_close'] = '</a></li>';
        $this->load->model('main_m');
        $this->data['post'] = $this->main_m->get_blog($config['per_page'], $this->uri->segment(3));
        $this->pagination->initialize($config);
        $this->load->view("pages/blog", $this->data);
        $this->data['script'] = ""
                        . "<script src='../../../js/sidebar.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>"
                        . "<script src='../../../js/contentBlog.js'></script>"
                        . "<script src='../../../js/main_tabs.js'></script>";

         
        $this->load->view("templates/footer", $this->data);

    }

    /* get_blog END */
    /* get_post START */

    function get_post($id) {
        $this->data['city'] = $this->settings_m->get_set('city');
        $this->data['street_build'] = $this->settings_m->get_set('street/build');
        $this->data['phone1'] = $this->settings_m->get_set('phone1');
        $this->data['phone2'] = $this->settings_m->get_set('phone2');
        $this->data['email'] = $this->settings_m->get_set('email');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
        $this->data['prepare'] = $this->category_m->get_category_sidebar();
        foreach ($this->data['prepare'] as $key => $value) {
            foreach ($this->data['subcat_side'] as $k => $v) {
                if ($v['cat_id'] == $value['id']) {
                    $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                }
            }
        }
        $this->load->model('main_m');
        $this->data['post_view'] = $this->main_m->get_blog_by_id($id);
        $this->data['script'] = ""
                        . "<script src='../../../js/sidebar.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>"
                        . "<script src='../../../js/contentBlog.js'></script>"
                        . "<script src='../../../js/main_tabs.js'></script>";
        $this->load->view('pages/single-post', $this->data);
        $this->load->view('templates/footer');
//         
    }

    /* get_post END */

    public function get_news_list() {
        $this->data['city'] = $this->settings_m->get_set('city');
        $this->data['street_build'] = $this->settings_m->get_set('street/build');
        $this->data['phone1'] = $this->settings_m->get_set('phone1');
        $this->data['phone2'] = $this->settings_m->get_set('phone2');
        $this->data['email'] = $this->settings_m->get_set('email');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
        $this->data['prepare'] = $this->category_m->get_category_sidebar();
        foreach ($this->data['prepare'] as $key => $value) {
            foreach ($this->data['subcat_side'] as $k => $v) {
                if ($v['cat_id'] == $value['id']) {
                    $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                }
            }
        }
        $arr = $this->main_m->count_news();
        $config['base_url'] = base_url() . 'news/page';
        $config['total_rows'] = count($arr);
        $config['per_page'] = '10';
        $config['full_tag_open'] = '<ul class="pagination-list text-center">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><a  class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = 'Назад';
        $config['next_link'] = 'Вперед';
        $config['prev_tag_open'] = '<li><a class="prev-pag">';
        $config['prev_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li><a class="next-pag">';
        $config['next_tag_close'] = '</a></li>';
        $this->load->model('main_m');
        $this->data['news'] = $this->main_m->get_news($config['per_page'], $this->uri->segment(3));
        $this->pagination->initialize($config);
        $this->load->view("pages/news", $this->data);
        $this->data['script'] = ""
                        . "<script src='../../../js/sidebar.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>"
                        . "<script src='../../../js/contentBlog.js'></script>"
                        . "<script src='../../../js/main_tabs.js'></script>";

         
        $this->load->view("templates/footer", $this->data);

    }

    /* get_blog END */
    /* get_post START */

    function get_news($id) {
        $this->data['city'] = $this->settings_m->get_set('city');
        $this->data['street_build'] = $this->settings_m->get_set('street/build');
        $this->data['phone1'] = $this->settings_m->get_set('phone1');
        $this->data['phone2'] = $this->settings_m->get_set('phone2');
        $this->data['email'] = $this->settings_m->get_set('email');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
        $this->data['prepare'] = $this->category_m->get_category_sidebar();
        foreach ($this->data['prepare'] as $key => $value) {
            foreach ($this->data['subcat_side'] as $k => $v) {
                if ($v['cat_id'] == $value['id']) {
                    $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                }
            }
        }
        $this->load->model('admin_m');
        $this->data['post_view'] = $this->admin_m->get_news_by_id($id);
        $this->data['script'] = ""
                        . "<script src='../../../js/sidebar.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>"
                        . "<script src='../../../js/contentBlog.js'></script>"
                        . "<script src='../../../js/main_tabs.js'></script>";
        $this->load->view('pages/single-post', $this->data);
        $this->load->view('templates/footer');
//         
    }

    /* get_post END */

    function single_gallery($id){
        $this->data['city'] = $this->settings_m->get_set('city');
        $this->data['street_build'] = $this->settings_m->get_set('street/build');
        $this->data['phone1'] = $this->settings_m->get_set('phone1');
        $this->data['phone2'] = $this->settings_m->get_set('phone2');
        $this->data['email'] = $this->settings_m->get_set('email');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
        $this->data['prepare'] = $this->category_m->get_category_sidebar();
        foreach ($this->data['prepare'] as $key => $value) {
            foreach ($this->data['subcat_side'] as $k => $v) {
                if ($v['cat_id'] == $value['id']) {
                    $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                }
            }
        }
        $this->load->model('admin_m');
        
        $this->data['post_view'] = $this->main_m->get_gallery_item($id);
        $this->data['script'] = ""
                        . "<script src='../../../js/sidebar.js'></script>"
                        . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                        . "<script src='../../../js/autoComplete.js'></script>"
                        . "<script src='../../../js/main.js'></script>"
                        . "<script src='../../../js/cart.js'></script>"
                        . "<script src='../../../js/ajax_select.js'></script>"
                        . "<script src='../../../js/bootstrap-switch.js'></script>"
                        . "<script src='../../../js/main_nav.js'></script>"
                        . "<script src='../../../js/switcher.js'></script>"
                        . "<script src='../../../js/contentBlog.js'></script>"
                        . "<script src='../../../js/main_tabs.js'></script>";
        $this->load->view('pages/single-post', $this->data);
        $this->load->view('templates/footer');
    }
}
