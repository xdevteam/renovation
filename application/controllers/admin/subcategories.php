<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subcategories
 *
 * @author baccardi
 */
class Subcategories extends CI_Controller {

    public $data;
    public $data_db;

    function __construct() {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            $this->data['admin'] = @$this->session->userdata('admin');
            if ($this->data['admin']['user_type'] == 'admin') {
                $this->load->view("admin/header", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'bloger') {
                redirect(base_url('admin'));
            } elseif ($this->data['admin']['user_type'] == 'cm') {
                $this->load->view("admin/header_cm", $this->data);
            }
            /* load data */
            $this->load->model('admin_m');
            $this->data['cat_list'] = $this->admin_m->category_list();
            $this->data['subcategories_list'] = $this->admin_m->get_subcategories_list();
        } else {
            redirect(base_url('admin'));
        }
    }

    /*
     * FUNCTION EDIT SUBCATEGORY  START
     */

    public function edit_subcat() {
        if (isset($_POST['edit'])) {
            unset($this->data);
            foreach ($this->input->post('edit') as $val) {
                $id = $val;
            }
            foreach ($this->input->post('name') as $key => $value) {
                if ($id == $key)
                    $this->data['name'] = $value;
            }
            foreach ($this->input->post('link') as $key => $value) {
                if ($id == $key)
                    $this->data['link'] = $value;
            }
            foreach ($this->input->post('cat_product') as $key => $value) {
                if ($id == $key)
                    $this->data['cat_id'] = $value;
            }
            if (is_uploaded_file($_FILES["prod_photo$id"]["tmp_name"])) {
                move_uploaded_file($_FILES["prod_photo$id"]["tmp_name"], "./upload/subcat_image/" . $link . $_FILES["prod_photo$id"]["name"]);
                $this->data['image_path'] = '../../../upload/subcat_image/' . $link . $_FILES["prod_photo$id"]["name"];
                foreach ($this->input->post('old_path') as $key => $value) {
                    if ($id == $key)
                        $old_path = $value;
                }
                $path = substr($old_path, 7);
                unlink($path);
            }else {
                foreach ($this->input->post('old_path') as $key => $value) {
                    if ($id == $key)
                        $this->data['image_path'] = $value;
                }
            }
            $this->admin_m->update_data($id, $this->data, 'id', 'subcategories');
            redirect(base_url('admin/subcategories'));
            unset($this->data, $id, $key, $value);
        }
    }

    /*
     * FUNCTION EDIT SUBCATEGORY  END
     */


    /*
     * FUNCTION CHANGE TYPE SUBCATEGORY  START
     */

    public function change_type() {
        if (isset($_POST['status'])) {
            unset($this->data);
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'subcategories');
                    $this->admin_m->update_data($key, $this->data, 'subcat_id', 'product');
                } else {
                    $this->data['status'] = 'enable';
                    $cat_id = $this->admin_m->get_subcat_element_by('id', $key, 'cat_id');
                    $this->admin_m->update_data($key, $this->data, 'id', 'subcategories');
                    $this->admin_m->update_data($cat_id, $this->data, 'id', 'categories');
                }
            }

            redirect(base_url('admin/subcategories'));
            unset($this->data, $cat_id, $key, $val);
        }
    }

    /*
     * FUNCTION CHANGE TYPE SUBCATEGORY  END
     */


    /*
     * FUNCTION DELETE SUBCATEGORY  START
     */

    public function delete_subcat() {
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('subcategories');
            }
            redirect(base_url('admin/subcategories'));
            unset($this->data, $id);
        }
    }

    /*
     * FUNCTION DELETE SUBCATEGORY  END
     */


    /*
     * FUNCTION GET SUBCATEGORY  LIST START
     */

    public function get_subcat_list() {
        $this->load->view('admin/subcategories', $this->data);
        $this->delete_subcat();
        $this->change_type();
        $this->edit_subcat();
        $this->load->view('admin/footer');
        unset($this->data);
    }

    /*
     * FUNCTION GET SUBCATEGORY  LIST END
     */

    
    /*
     * FUNCTION ADD SUBCATEGORY  START
     */

    public function add_subcategory() {
        if (isset($_POST['add_subcategory'])) {
            unset($this->data);
            if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                $this->data = $this->input->post();
                $this->data['cat_id']=$this->input->post('category');
                unset($this->data['add_subcategory'], $this->data['category'], $this->data['link'],$this->data['group']);
                $this->data['link'] = strtolower($this->input->post('link'));
                move_uploaded_file($_FILES["prod_photo"]["tmp_name"], "./upload/subcat_image/" . $this->data['link'] . $_FILES["prod_photo"]["name"]);
                $this->data['image_path'] = '../../../upload/subcat_image/' . $this->data['link'] . $_FILES["prod_photo"]["name"];                
                $this->admin_m->add_subcategory($this->data);
                redirect(base_url('admin/subcategories'));
            } else {
                redirect(base_url('admin/subcategories_add'));
            }
            unset($this->data);
        }
    }

    /*
     * FUNCTION ADD SUBCATEGORY  END
     */

    
    /*
     * FUNCTION FILTER SUBCATEGORY  START
     */

    function filter_cat() {
        if (isset($_POST['filter'])) {
            $id = $this->input->post('data_cat');
            $this->data['subcategories_list'] = $this->admin_m->get_subcategories_by_('cat_id', $id);
            $this->load->view('admin/subcategories', $this->data);
            $this->load->view('admin/footer');
        }
        unset($this->data);
    }

    /*
     * FUNCTION FILTER SUBCATEGORY  END
     */
}
