<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slider
 *
 * @author baccardi
 */
class Slider extends CI_Controller {

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
     *  FUNCTION  EDIT SLIDER 
     */

    function edit_slider() {
        unset($this->data);
        if (isset($_POST['edit'])) {
            unset($this->data);
            foreach ($this->input->post('edit') as $val) {
                $id = $val;
            }
            foreach ($this->input->post('name') as $key => $value) {
                if ($id == $key)
                    $this->data['header1'] = $value;
            }
            foreach ($this->input->post('name2') as $key => $value) {
                if ($id == $key)
                    $this->data['header2'] = $value;
            }
            foreach ($this->input->post('text') as $key => $value) {
                if ($id == $key)
                    $this->data['text'] = $value;
            }
            foreach ($this->input->post('position') as $key => $value) {
                if ($id == $key)
                    $this->data['position'] = $value;
            }
            $this->admin_m->update_data($id, $this->data, 'id', 'slider');
        }
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('slider');
            }
        }
        if (isset($_POST['status'])) {
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'slider');
                } else {
                    $this->data['status'] = 'enable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'slider');
                }
            }
        }
        if (isset($_POST['first'])) {
            $id = $this->input->post('act');
            $this->data['act'] = '0';
            $this->db->update('slider', $this->data);
            unset($this->data);
            $this->data['act'] = '1';
            $this->admin_m->update_data($id, $this->data, 'id', 'slider');
        }
        $this->data['slider'] = $this->admin_m->get_slider_item();
        $this->load->view("admin/slider", $this->data);
        $this->load->view("admin/footer", $this->data);
        unset($this->data, $id, $key, $value, $name);
    }

    /*
     *  END
     */


    /*
     *  ADD SLIDE START 
     */

    function slide_add() {
        if (isset($_POST['slide_add'])) {
            unset($this->data);
            $header = $this->input->post('text');
            $text = $this->input->post('header1');
            if (!empty($header) && !empty($text)) {
                if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                    $this->data = $this->input->post();
                    $this->data['path'] = '../../../upload/slide/' . $_FILES["prod_photo"]["name"];
                    unset($this->data['slide_add']);
                    move_uploaded_file($_FILES["prod_photo"]["tmp_name"], "./upload/slide/" . $_FILES["prod_photo"]["name"]);
                    $this->admin_m->get_slider_insert($this->data);
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
        unset($this->data, $header, $text);
    }

    /*
     *  ADD SLIDE END
     */
}
