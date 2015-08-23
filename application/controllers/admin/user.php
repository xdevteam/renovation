<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class USER extends CI_Controller {

    public $data;
    public $data_menu;

    function __construct() {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            $this->data['admin'] = $this->session->userdata('admin');
            $this->load->model('settings_m');
            $this->load->model('main_m');
            $this->data['settings'] = $this->settings_m->get_setlist();
            $this->data['fst_level'] = $this->main_m->get_fst_l();
            $this->data['scnd_level'] = $this->main_m->get_snd_l();
            $this->data['trd_level'] = $this->main_m->get_trd_l();
            /* load categories */
            $this->load->model('category_m');
            $this->data['cat_list'] = $this->category_m->category_list();
            /* load users */
            $this->load->model('user_model');
            $this->data['user'] = $this->user_model->get_user();
            /* load focus product */
            $this->data['fpl'] = $this->category_m->focus_product_list();
            /* load subcategories list */
            $this->load->model('subcategories_m');
            $this->data['list'] = $this->subcategories_m->get_subcategories_list();
            /* load main_m */
            $this->load->model('main_m');
            $this->data['pages'] = $this->main_m->get_pages();
            /* load product_m */
            $this->load->model('product_m');
            $this->data['post'] = $this->main_m->get_blog_back();
            if ($this->data['admin']['user_type'] == 'admin') {
                $this->load->view("admin/header", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'bloger') {
                redirect(base_url('admin'));
            } elseif ($this->data['admin']['user_type'] == 'cm') {
                redirect(base_url('admin'));
            }
        } else {
            $this->load->view("pages/auth_admin");
        }
    }

    function add_user() {
//        if (isset($_POST['add_user'])) {
        $this->data_db = $this->input->post();
        $email = $this->input->post('email');
        if ($this->user_model->add_user($this->data_db, $email) == 400) {
            $this->data['error'] = 'Ошибка! Такой Email  уже зарегестрирован!!';
            $this->load->view('admin/error', $this->data);
            $this->load->view('admin/footer');
        } else {
            redirect(base_url('admin/users'));
        }
//        }
    }

}
