<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author baccardi
 */
class Admin extends CI_Controller {

    public $data;
    public $data_menu;

    function __construct() {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            $this->data['admin'] = $this->session->userdata('admin');
            $this->load->view("admin/header", $this->data);
        }


        /* load menu */
        $this->load->model('main_m');

        $this->data['menu_buyer'] = $this->main_m->get_menu_front('2');
        $this->data['menu_seller'] = $this->main_m->get_menu_front('1');
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
        $this->data['count_order'] = $this->product_m->get_new_order();
    }

    /*  function login admin  */

    function get_admin() {
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            redirect(base_url('admin/index'));
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('user_model');
            $data['admin'] = $this->user_model->login_user($email, $password);
            if (!empty($data['admin'])) {
                foreach ($data['admin'] as $item) {
                    $session_data['name'] = $item['name'];
                    $session_data['email'] = $item['email'];
                    $session_data['user_type'] = $item['user_type'];
                }
                $this->session->set_userdata(array('admin' => $session_data));
                redirect(base_url('admin/index'));
            } else {
                $this->load->view("pages/auth_admin");
            }
        }
    }

    /* END function login admin  */

    /* Main Page ADMIN */

    function admin_pages($page = 'index') {
        if (!empty(@$this->session->userdata('admin'))) {
            if (!file_exists(APPPATH . '/views/admin/' . $page . '.php')) {
                show_404();
            } else {
                $this->load->view("admin/$page", $this->data);
                $this->load->view("admin/footer", $this->data);
            }
        } else {
            redirect(base_url('admin'));
        }
    }

    /* END Main Page ADMIN */

    /*  function exit user  */

    function exit_user() {
        if (isset($_POST['logout'])) {
            $this->session->unset_userdata('admin');
            redirect(base_url());
        }
    }

    /* END function exit user  */

    /* function edit slider */

    function edit_slider() {
        if (isset($_POST['edit'])) {
            foreach ($this->input->post('edit') as $val) {
                $id = $val;
            }
            foreach ($this->input->post('name') as $key => $value) {
                if ($id == $key)
                    $name = $value;
            }
            foreach ($this->input->post('text') as $key => $value) {
                if ($id == $key)
                    $text = $value;
            }
            $this->db->query("UPDATE slider SET text='$text' WHERE id='$id'");
            $this->db->query("UPDATE slider SET header='$name' WHERE id='$id'");
        }
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('slider');
            }
        }
        if (isset($_POST['status'])) {
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->db->query("UPDATE slider SET status='disable' WHERE id='$key'");
                } else {
                    $this->db->query("UPDATE slider SET status='enable' WHERE id='$key'");
                }
            }
        }
        if (isset($_POST['first'])) {
            $id = $this->input->post('act');
            $this->db->query("UPDATE slider SET act='0'");
            $this->db->query("UPDATE slider SET act='1' WHERE id='$id'");
        }
        $this->data['slider'] = $this->main_m->get_slider_item();
        $this->load->view("admin/slider", $this->data);
        $this->load->view("admin/footer", $this->data);
    }

    /* END function edit slider */
    /* slide_add START */

    function slide_add() {
        if (isset($_POST['slide_add'])) {
            unset($this->data);
            $header = $this->input->post('text');
            $text = $this->input->post('header');
            if (!empty($header) && !empty($text)) {
                if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                    $this->data['header'] = $this->input->post('header');
                    $this->data['text'] = $this->input->post('text');
                    $this->data['status'] = $this->input->post('status');
                    $this->data['act'] = '0';
                    $this->data['path'] = '../../../img/' . $_FILES["prod_photo"]["name"];
                    move_uploaded_file($_FILES["prod_photo"]["tmp_name"], "./img/" . $_FILES["prod_photo"]["name"]);
                    $this->main_m->get_slider_insert($this->data);
                    redirect(base_url('admin/slider'));
                } else {
                    $this->data['error'] = 'Ошибка при загрузке файла';
                    $this->load->view('admin/error', $this->data);
                    $this->load->view('admin/footer');
                }
            } else {
                $this->data['error'] = 'Ошибка при заполнении формы';
                $this->load->view('admin/error', $this->data);
                $this->load->view('admin/footer');
            }
        } else {
            $this->load->view("admin/slide_add", $this->data);
            $this->load->view("admin/footer", $this->data);
        }
    }

    /* slide_add End */

    /* partners function START */

    function partners() {
        if (isset($_POST['edit'])) {
            foreach ($this->input->post('edit') as $val) {
                $id = $val;
            }
            foreach ($this->input->post('name') as $key => $value) {
                if ($id == $key)
                    $name = $value;
            }
            foreach ($this->input->post('link') as $key => $value) {
                if ($id == $key)
                    $link = $value;
            }
            $this->db->query("UPDATE partners SET name='$name' WHERE id='$id'");
            $this->db->query("UPDATE partners SET link='$link' WHERE id='$id'");
        }
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('partners');
            }
        }
        if (isset($_POST['status'])) {
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->db->query("UPDATE partners SET status='disable' WHERE id='$key'");
                } else {
                    $this->db->query("UPDATE partners SET status='enable' WHERE id='$key'");
                }
            }
        }
        $this->data['partner'] = $this->main_m->get_partners();
        $this->load->view("admin/partners", $this->data);
        $this->load->view("admin/footer", $this->data);
    }

    /* partners function END */

    /* add partner START */

    function add_partner() {
        if (isset($_POST['add_partner'])) {
            $name=$this->input->post('name');
            if (!empty($name)) {
                if (is_uploaded_file($_FILES["logo"]["tmp_name"])) {
                    unset($this->data);
                    $this->data['link'] = $this->input->post('link');
                    $this->data['name'] = $this->input->post('name');
                    $this->data['status'] = $this->input->post('status');
                    $this->data['logo'] = '../../../logo/' . $_FILES["logo"]["name"];
                    move_uploaded_file($_FILES["logo"]["tmp_name"], "./logo/" . $_FILES["logo"]["name"]);
                    $this->main_m->partner_add($this->data);
                    redirect(base_url('admin/partners'));
                } else {
                    $this->data['error'] = 'Ошибка при загрузке файла';
                    $this->load->view('admin/error', $this->data);
                    $this->load->view('admin/footer');
                }
            } else {
                $this->data['error'] = 'Ошибка при заполнении формы';
                $this->load->view('admin/error', $this->data);
                $this->load->view('admin/footer');
            }
        } else {
            $this->load->view("admin/partner_add", $this->data);
            $this->load->view("admin/footer", $this->data);
        }
    }

    /* add partner END */
    /* get order START */

    function get_order() {
        $this->data['prepare'] = $this->product_m->get_order();
        foreach ($this->data['prepare'] as $k => $v) {
            $this->data['order'][$v['item_id']] = $v;
            $this->data['order'][$v['item_id']]['image'] = $this->product_m->get_order_img($v['item_id']);
        }
//        echo'<pre>';
//        print_r($this->data['order']);
//        echo'</pre>';
        $this->load->view("admin/new_orders", $this->data);
        $this->load->view("admin/footer", $this->data);
    }

    /* get_order END */
}
