<?php

class Category extends CI_Controller {

    public $data;
    public $data_db;

    function __construct($page = 'index') {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            $this->load->model('admin_m');
//            $this->load->model('category_m');
            $this->data['admin'] = @$this->session->userdata('admin');
            if ($this->data['admin']['user_type'] == 'admin') {
                $this->load->view("admin/header", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'bloger') {
                redirect(base_url('admin'));
            } elseif ($this->data['admin']['user_type'] == 'cm') {
                $this->load->view("admin/header_cm", $this->data);
            }

            /* load categories */

//            $this->load->model('category_m');
//            $this->load->model('subcategories_m');
            $this->data['cat_list'] = $this->admin_m->category_list();

            /* load focus product */

            $this->data['fpl'] = $this->admin_m->focus_product_list();
        } else {
            redirect(base_url('admin'));
        }
    }

    /* START METHOD's for categories
     *
     * 
     * function edit_category */

    public function edit_category($id) {
        if (isset($_POST['edit'])) {
            $name = $this->input->post('name');
            $link = $this->input->post('link');
            $description = $this->input->post('description');
            $old_image = $this->input->post('path');
            if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                if (!empty($link)) {
                    move_uploaded_file($_FILES["prod_photo"]["tmp_name"], "./upload/cat_image/" . $link . $_FILES["prod_photo"]["name"]);
                    $image_path = "../../../upload/cat_image/" . $link . $_FILES["prod_photo"]["name"];
                    $path = substr($old_image, 7);
                    unlink($path);
                }
            } else {
                $image_path = $old_image;
            }
            if (!empty($name)) {
                $this->db->query("UPDATE categories SET name='$name'  WHERE id='$id'");
            }
            if (!empty($link)) {
                $this->db->query("UPDATE categories SET link='$link'  WHERE id='$id'");
                $this->db->query("UPDATE categories SET image_path='$image_path'  WHERE id='$id'");
            }
            if (!empty($description)) {
                $this->db->query("UPDATE categories SET description='$description' WHERE id='$id'");
            }
            redirect(base_url('admin/category'));
        } else {
            $this->data['category'] = $this->admin_m->category_by_id($id);
            $this->load->view('admin/edit_category', $this->data);
            $this->load->view('admin/footer');
        }
        unset($id, $link, $name, $this->data);
    }

    /* END  function edit_category */


    /* function change_type */

    public function change_type() {
        if (isset($_POST['status'])) {
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $id = $this->admin_m->get_subcategories_by_('cat_id', $key);
                    $this->db->query("UPDATE categories SET status='disable' WHERE id='$key'");
                    $this->db->query("UPDATE subcategories SET status='disable' WHERE cat_id='$key'");
                    $this->db->query("UPDATE product SET status='disable' WHERE subcat_id='$id'");
                } else {
                    $this->db->query("UPDATE categories SET status='enable' WHERE id='$key'");
                    $this->db->query("UPDATE subcategories SET status='enable' WHERE cat_id='$key'");
                }
            }

            redirect(base_url('admin/category'));
        }
        unset($this->data, $id);
    }

    /* END function change_type */

    /* function delete_category */

    public function delete_category() {
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('categories');
            }
            redirect(base_url('admin/category'));
        }
        unset($this->data, $id);
    }

    /* END function delete_category */

    /* function get_category */

    function get_category() {
        $this->load->view("admin/category", $this->data);
        $this->change_type();
        $this->delete_category();

        $this->load->view("admin/footer");
        unset($this->data);
    }

    /* END function get_category */
    /* function add_category */

    function add_category() {
        if (isset($_POST['add_category'])) {
            if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                $this->data_db['link'] = strtolower($this->input->post('link'));
                move_uploaded_file($_FILES["prod_photo"]["tmp_name"], "./upload/cat_image/" . $this->data_db['link'] . $_FILES["prod_photo"]["name"]);
                $this->data_db['name'] = $this->input->post('name');
                $this->data_db['link'] = strtolower($this->input->post('link'));
                $this->data_db['fp_id'] = strtolower($this->input->post('focus_product'));
                $this->data_db['status'] = strtolower($this->input->post('status'));
                $this->data_db['description'] = strtolower($this->input->post('description'));
                $this->data_db['image_path'] = "../../../upload/cat_image/" . $this->data_db['link'] . $_FILES["prod_photo"]["name"];
                $this->admin_m->add_category($this->data_db);
            }
        }
        unset($this->data_db);
        redirect(base_url('admin/category'));
        unset($this->data);
    }

    /* END function add_category */


    /* START METHOD's for focus_Product
     *
     * 
     *  function add_focus_product  */

    function add_focus_product() {
        if (isset($_POST['add_focus_product'])) {
            $this->data_db['name'] = $this->input->post('name');
            $this->data_db['status'] = strtolower($this->input->post('status'));
            $this->category_m->add_focus_product($this->data_db);
        }
        redirect(base_url('admin/focus_product'));
        unset($this->data, $this->data_db);
    }

    /* END  function add_focus_product */


    /* function edit_focus_product */

    public function edit_focus_product() {
        if (isset($_POST['edit_fp'])) {
            foreach ($this->input->post('edit_fp') as $val) {
                $id = $val;
            }
            foreach ($this->input->post('fp') as $key => $value) {
                if ($id == $key)
                    $name = $value;
            }
            $this->db->query("UPDATE focus_products SET name='$name' WHERE id='$id'");
            redirect(base_url('admin/focus_product'));
        }
        unset($this->data, $this->data_db);
    }

    /* END function edit_focus_product */


    /* function change_focus_product */

    public function change_focus_product() {
        if (isset($_POST['status'])) {
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->db->query("UPDATE focus_products SET status='disable' WHERE id='$key'");
                } else {
                    $this->db->query("UPDATE focus_products SET status='enable' WHERE id='$key'");
                }
            }

            redirect(base_url('admin/focus_product'));
        }
        unset($this->data, $val, $key);
    }

    /* END function change_focus_product */


    /* function delete_focus_product */

    public function delete_focus_product() {
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('focus_products');
            }

            redirect(base_url('admin/focus_product'));
        }
        unset($this->data, $id);
    }

    /* END function delete_focus_product */


    /* function focus_product */

    function focus_product() {
        $this->load->view("admin/focus_product", $this->data);
        $this->delete_focus_product();
        $this->change_focus_product();
        $this->edit_focus_product();
        $this->load->view("admin/footer");
        unset($this->data);
    }

    /* END  function focus_product */
}
