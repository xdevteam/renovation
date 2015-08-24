<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blog
 *
 * @author baccardi
 */
class Blog extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->load->model('admin_m');
        $session = $this->session->userdata('admin');
        $this->data['admin'] = $this->session->userdata('admin');
        if (!empty($session)) {
            if ($this->data['admin']['user_type'] == 'admin') {
                $this->load->view("admin/header", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'bloger') {
                $this->load->view("admin/header_bloger", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'cm') {
                $this->load->view("admin/header_cm", $this->data);
            }
        } else {
            $this->load->view("pages/auth_admin");
        }
    }

    /*
     * FUNCTION ADD POST START 
     */

    function add_post() {
        unset($this->data);
        if (isset($_POST['add_post'])) {
            if (is_uploaded_file($_FILES["prod_photo_1"]["tmp_name"])) {
                $this->data['name'] = $this->input->post('name');
                move_uploaded_file($_FILES["prod_photo_1"]["tmp_name"], "./upload/blog/" . $_FILES["prod_photo_1"]["name"]);
                $this->data['image_path'] = "../../../upload/blog/" . $_FILES["prod_photo_1"]["name"];
                $this->data['name'] = $this->input->post('name');
                $this->data['article_description'] = $this->input->post('article_description');
                $this->data['status'] = $this->input->post('status');
                $this->data['date'] = date('Y-m-d H:i:s');
                $this->data['blog_page'] = $this->input->post('blog_page');
                if ($this->admin_m->add_blog($this->data) == true) {
                    redirect(base_url('admin/blog_article'));
                }
            } else {
                $this->data['error'] = 'Ошибка ввода данных';
                $this->load->view('admin/error', $this->data);
                $this->load->view('admin/footer');
            }
        }
        unset($this->data);
    }

    /*
     *  FUNCTION ADD POST END 
     */


    /*
     *  FUNCTION GET POST START 
     */

    function get_post($id) {
        $this->data['post_edit'] = $this->admin_m->get_blog_by_id($id);
        $this->load->view('admin/blog_article_edit', $this->data);
        $this->load->view('admin/footer');
    }

    /*
     *  FUNCTION GET POST END
     */


    /*
     *  FUNCTION EDIT POST START 
     */

    function edit_post() {
        if (isset($_POST['edit_article'])) {
            unset($this->data);
            $id = $this->input->post('id');
            $old_image_path = $this->input->post('image_path');
            if (is_uploaded_file($_FILES["prod_photo_1"]["tmp_name"])) {
                move_uploaded_file($_FILES["prod_photo_1"]["tmp_name"], "./upload/blog/" . $_FILES["prod_photo_1"]["name"]);
                $this->data['image_path'] = "../../../upload/blog/" . $_FILES["prod_photo_1"]["name"];
                if (!empty($this->data['image_path']))
                    unlink(substr($old_image_path, 7));
            }
            $this->data['name'] = $this->input->post('name');
            $this->data['article_description'] = $this->input->post('article_description');
            $this->data['status'] = $this->input->post('status');
            $this->data['date'] = date('Y-m-d H:i:s');
            $this->data['blog_page'] = $this->input->post('blog_page');
            $this->admin_m->update_data($id, $this->data, 'id', 'blog');
        }
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('blog');
            }
        }
        if (isset($_POST['status'])) {
            unset($this->data);
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'blog');
                } else {
                    $this->data['status'] = 'enable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'blog');
                }
            }
        }
        redirect(base_url('admin/blog_article'));
    }

    /*
     *  FUNCTION EDIT POST END 
     */



    /*
     * FUNCTION ADD News START 
     */

    function add_new() {
        unset($this->data);
        if (isset($_POST['add_news'])) {
            if (is_uploaded_file($_FILES["prod_photo_1"]["tmp_name"])) {
                $this->data['name'] = $this->input->post('name');
                move_uploaded_file($_FILES["prod_photo_1"]["tmp_name"], "./upload/news/" . $_FILES["prod_photo_1"]["name"]);
                $this->data['image_path'] = "../../../upload/news/" . $_FILES["prod_photo_1"]["name"];
                $this->data['name'] = $this->input->post('name');
                $this->data['article_description'] = $this->input->post('article_description');
                $this->data['status'] = $this->input->post('status');
                $this->data['date'] = date('Y-m-d H:i:s');
                $this->data['news_page'] = $this->input->post('blog_page');
                if ($this->admin_m->add_news($this->data) == true) {
                    redirect(base_url('admin/news_article'));
                }
            } else {
                $this->data['error'] = 'Ошибка ввода данных';
                $this->load->view('admin/error', $this->data);
                $this->load->view('admin/footer');
            }
        }
        unset($this->data);
    }

    /*
     *  FUNCTION ADD NEWS END 
     */


    /*
     *  FUNCTION GET NEWS START 
     */

    function get_news($id) {
        $this->data['post_edit'] = $this->admin_m->get_news_by_id($id);
        $this->load->view('admin/news_article_edit', $this->data);
        $this->load->view('admin/footer');
    }

    /*
     *  FUNCTION GET NEWS END
     */


    /*
     *  FUNCTION EDIT NEWS START 
     */

    function edit_news() {
        if (isset($_POST['edit_article_news'])) {
            unset($this->data);
            $id = $this->input->post('id');
            $old_image_path = $this->input->post('image_path');
            if (is_uploaded_file($_FILES["prod_photo_1"]["tmp_name"])) {
                move_uploaded_file($_FILES["prod_photo_1"]["tmp_name"], "./upload/news/" . $_FILES["prod_photo_1"]["name"]);
                $this->data['image_path'] = "../../../upload/news/" . $_FILES["prod_photo_1"]["name"];
                if (!empty($this->data['image_path']))
                    unlink(substr($old_image_path, 7));
            }
            $this->data['name'] = $this->input->post('name');
            $this->data['article_description'] = $this->input->post('article_description');
            $this->data['status'] = $this->input->post('status');
            $this->data['date'] = date('Y-m-d H:i:s');
            $this->data['news_page'] = $this->input->post('news_page');
            $this->admin_m->update_data($id, $this->data, 'id', 'news');
        }
        if (isset($_POST['delete_news'])) {
            foreach ($this->input->post('delete_news') as $id) {
                $this->db->where('id', $id)->delete('news');
            }
        }
        if (isset($_POST['status_news'])) {
            unset($this->data);
            foreach ($this->input->post('status_news') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'news');
                } else {
                    $this->data['status'] = 'enable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'news');
                }
            }
        }
        redirect(base_url('admin/news_article'));
    }

    /*
     *  FUNCTION EDIT NEWS END 
     */
}
