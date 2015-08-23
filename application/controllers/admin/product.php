<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product extends CI_Controller {

    public $data;
    public $data_db;
    public $data_admin;

    function __construct() {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            /*
             * load header 
             */
            $this->data['admin'] = @$this->session->userdata('admin');
            $this->data_admin['admin'] = $this->session->userdata('admin');
            if ($this->data['admin']['user_type'] == 'admin') {
                $this->load->view("admin/header", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'bloger') {
                redirect(base_url('admin'));
            } elseif ($this->data['admin']['user_type'] == 'cm') {
                $this->load->view("admin/header_cm", $this->data);
            }
            /*
             *  load models
             *   */
            $this->load->model('admin_m');
            $this->data['fpl'] = $this->admin_m->focus_product_list();
            $this->data['category'] = $this->admin_m->category_list();
            foreach ($this->admin_m->get_all_products() as $k => $v) {
                $this->data['list'][$v['id']] = $v;
            }
            if (!empty($this->data['list'])) {
                foreach ($this->data['list'] as $k => $v) {
                    $this->data['subcat'][$v['subcat_id']] = $this->admin_m->get_subcategories_by_('id', $v['subcat_id']);
                }
            }
            $this->data['all_subcat'] = $this->admin_m->get_subcategories_list();
        } else {
            redirect(base_url('admin'));
        }
    }

    /*
     *  RANDOM START
     */

    function random() {
        $letters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'm', 'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '2', '3', '4', '5', '6', '7', '9');
        $fon_let_amount = 12;
        $log = array();
        for ($i = 0; $i < $fon_let_amount; $i++) {
            $l = $letters[rand(0, sizeof($letters) - 1)];
            $log[] = $l;
        }
        return implode('', $log);
    }

    /*
     *  RANDOM END
     */


    /*
     * LOAD PRODUCT PAGE START
     */

    function products() {
        $this->load->view("admin/products", $this->data);
        $this->change_type();
        $this->delete_product();
        $this->load->view("admin/footer");
        unset($this->data);
    }

    /*
     * LOAD PRODUCT PAGE END
     */


    /*
     * EDIT PRODUCT START 
     */

    public function edit_product($id) {
        $this->data['all_subcat'] = $this->admin_m->get_subcategories_list();
        $this->data['prod'] = $this->admin_m->get_product($id);
        $this->load->view('admin/edit_product', $this->data);
        $this->load->view('admin/footer');
    }

    public function prod_edit() {
        unset($this->data);
        if (isset($_POST['del_min'])) {
            foreach ($this->input->post('del_min') as $val) {
                $min = $val;
            }
            $id = $this->input->post('id');
            $prod = $this->admin_m->get_product($id);
            $min_img = unserialize($prod[0]['min_img']);
            foreach ($min_img as $k => $v) {
                if ($k != $min) {
                    $new[] = $v;
                }
            }
            $this->data['min_img'] = serialize($new);
            $this->admin_m->update_data($id, $this->data, 'id', 'product');
            unset($this->data, $new, $v, $prod, $min, $k, $val);
            redirect(base_url('admin/edit_product/' . $id));
        }
        if (isset($_POST['del_pdf_path'])) {
            $id = $this->input->post('id');
            $this->data['pdf_path'] = '';
            $this->admin_m->update_data($id, $this->data, 'id', 'product');
            unset($this->data);
            redirect(base_url('admin/edit_product/' . $id));
        }
        if (isset($_POST['del_size_img'])) {
            $id = $this->input->post('id');
            $this->data['size_img'] = '';
            $this->admin_m->update_data($id, $this->data, 'id', 'product');
            unset($this->data);
            redirect(base_url('admin/edit_product/' . $id));
        }
        if (isset($_POST['del_image_path'])) {
            $id = $this->input->post('id');
            $this->data['image_path'] = '';
            $this->admin_m->update_data($id, $this->data, 'id', 'product');
            unset($this->data);
            redirect(base_url('admin/edit_product/' . $id));
        }
        if (isset($_POST['del_interior_img'])) {
            $id = $this->input->post('id');
            $this->data['interior_img'] = '';
            $this->admin_m->update_data($id, $this->data, 'id', 'product');
            unset($this->data);
            redirect(base_url('admin/edit_product/' . $id));
        }
        if (isset($_POST['edit_product'])) {
            unset($this->data);
            $id = $this->input->post('id');
            $this->data = $this->input->post();
            unset(
                    $this->data['param'], $this->data['id'], $this->data['old_pdf_path'], $this->data['old_image_path'], $this->data['old_size_img'], $this->data['old_interior_img'], $this->data['old_min_path'], $this->data['edit_product']
            );
            foreach ($this->input->post('param') as $k => $v) {
                $char[] = $v;
            }
            $this->data['parametr'] = serialize($char);
            unset($char, $k, $v);
            if (is_uploaded_file($_FILES["pdf"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["pdf"]["tmp_name"], "./upload/pdfdocs/doc" . $_FILES["pdf"]["name"]))
                    $this->data['pdf_path'] = '../../../upload/pdfdocs/doc' . $_FILES["pdf"]["name"];
                unlink(substr($this->input->post('old_pdf_path'), 7));
            }else {
                $this->data['pdf_path'] = $this->input->post('old_pdf_path');
            }
            if (is_uploaded_file($_FILES["size_img"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["size_img"]["tmp_name"], "./upload/products/size" . $_FILES["size_img"]["name"]))
                    $this->data['size_img'] = '../../../upload/products/size' . $_FILES["size_img"]["name"];
                unlink(substr($this->input->post('old_size_img'), 7));
            }else {
                $this->data['size_img'] = $this->input->post('old_size_img');
            }
            if (is_uploaded_file($_FILES["interior_img"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["interior_img"]["tmp_name"], "./upload/products/int" . $first . $_FILES["interior_img"]["name"]))
                    $this->data['interior_img'] = '../../../upload/products/int' . $first . $_FILES["interior_img"]["name"];
                unlink(substr($this->input->post('old_interior_img'), 7));
            }else {
                $this->data['interior_img'] = $this->input->post('old_interior_img');
            }
            if (is_uploaded_file($_FILES["main_photo"]["tmp_name"])) {
                $first = $this->random();
                if (move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload/products/" . $first . $_FILES["main_photo"]["name"]))
                    $this->data['image_path'] = '../../../upload/products/' . $first . $_FILES["main_photo"]["name"];
                unlink(substr($this->input->post('old_image_path'), 7));
            }else {
                $this->data['image_path'] = $this->input->post('old_image_path');
            }
            foreach ($_FILES["prod_photo"]["tmp_name"] as $key => $val) {
                if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"][$key])) {
                    move_uploaded_file($_FILES["prod_photo"]["tmp_name"][$key], "./upload/products/" . $_FILES["prod_photo"]["name"][$key]);
                    if (!empty($_FILES["prod_photo"]["tmp_name"][$key]))
                        $array[$key] = '../../../upload/products/' . $_FILES["prod_photo"]["name"][$key];
                }else {
                    if (!empty($_POST["old_min_path"][$key]))
                        $array[$key] = $_POST['old_min_path'][$key];
                }
            }
            $this->data['min_img'] = serialize($array);
            $this->admin_m->update_data($id, $this->data, 'id', 'product');
            unset($this->data, $id, $array, $first, $key, $val);
            redirect(base_url('admin/products'));
        }
    }

    /*
     * EDIT PRODUCT END  
     */


    /*
     *  CHANGE TYPE START
     */

    public function change_type() {
        if (isset($_POST['status'])) {
            unset($this->data);
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'product');
                } else {
                    $subcat_id = $this->admin_m->get_product_element_by('id', $key, 'subcat_id');
                    $cat_id = $this->admin_m->get_subcat_element_by('id', $subcat_id, 'cat_id');
                    $this->data['status'] = 'enable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'product');
                    $this->admin_m->update_data($subcat_id, $this->data, 'id', 'subcategories');
                    $this->admin_m->update_data($cat_id, $this->data, 'id', 'categories');
                }
            }
            redirect(base_url('admin/products'));
        }
        unset($this->data, $key, $cat_id, $subcat_id, $val);
    }

    /*
     * CHANGE TYPE END
     */

    /*
     * DELETE PRODUCT START 
     */

    public function delete_product() {
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('product');
            }
            redirect(base_url('admin/products'));
        }
        unset($this->data, $id);
    }

    /*
     * DELETE PRODUCT END 
     */


    /*
     * ADD PRODUCT
     */

    function add_product() {
        if (isset($_POST['add_product'])) {
            unset($this->data);
            if (is_uploaded_file($_FILES["main_photo"]["tmp_name"])) {
                $this->data = $this->input->post();
                unset($this->data['param'], $this->data['group'], $this->data['cat_id'], $this->data['add_product']);
                $first = $this->random();
                if (move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload/products/" . $first . $_FILES["main_photo"]["name"]))
                    $this->data['image_path'] = '../../../upload/products/' . $first . $_FILES["main_photo"]["name"];
                foreach ($_FILES["prod_photo"]["tmp_name"] as $key => $val) {
                    move_uploaded_file($_FILES["prod_photo"]["tmp_name"][$key], "./upload/products/" . $_FILES["prod_photo"]["name"][$key]);
                    if (!empty($_FILES["prod_photo"]["tmp_name"][$key]))
                        $array[] = '../../../upload/products/' . $_FILES["prod_photo"]["name"][$key];
                }
                $this->data['min_img'] = serialize($array);
                foreach ($this->input->post('param') as $k => $v) {
                    if (!empty($v)) {
                        $param[] = $v;
                    } else {
                        $param[] = '-';
                    }
                }
                $this->data['parametr'] = serialize($param);
                if (is_uploaded_file($_FILES["size_img"]["tmp_name"])) {
                    if (move_uploaded_file($_FILES["size_img"]["tmp_name"], "./upload/products/size" . $_FILES["size_img"]["name"]))
                        $this->data['size_img'] = '../../../upload/products/size' . $_FILES["size_img"]["name"];
                }
                $this->data['color'] = $this->input->post('color');
                if (is_uploaded_file($_FILES["pdf"]["tmp_name"])) {
                    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], "./upload/pdfdocs/doc" . $_FILES["pdf"]["name"]))
                        $this->data['pdf_path'] = '../../../upload/pdfdocs/doc' . $_FILES["pdf"]["name"];
                }
                $this->data['video_path'] = $this->input->post('video');
                if (is_uploaded_file($_FILES["interior_img"]["tmp_name"])) {
                    if (move_uploaded_file($_FILES["interior_img"]["tmp_name"], "./upload/products/int" . $first . $_FILES["interior_img"]["name"]))
                        $this->data['interior_img'] = '../../../upload/products/int' . $first . $_FILES["interior_img"]["name"];
                }
                if ($this->admin_m->add_product($this->data) == true) {
                    redirect(base_url('admin/products'));
                } else {
                    redirect(base_url('admin/product_add'));
                }
            }
        }
        unset($this->data);
    }

    /*
     * FILTER PRODUCT START
     */

    function filter_product() {
        if (isset($_POST['filter'])) {
            $id = strtolower($this->input->post('subcat_id'));
            if (!empty($id))
                $this->data['list'] = $this->admin_m->get_product_by_subcat_link($id);
            else
                foreach ($this->admin_m->get_all_product() as $k => $v) {
                    $this->data['list'][$v['id']] = $v;
                }
            $this->load->view("admin/products", $this->data);
            $this->load->view("admin/footer");
        }
        unset($this->data, $id);
    }

    /*
     * FILTER PRODUCT END
     */
}
