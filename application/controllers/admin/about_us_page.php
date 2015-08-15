<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class About_us_page extends CI_Controller {

    public $data;
    public $data_db;
    public $data_admin;

    function __construct() {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            /* load header */
            $this->data['admin'] = @$this->session->userdata('admin');
            $this->data_admin['admin'] = $this->session->userdata('admin');
            $this->load->view("admin/header", $this->data);
            /* load models */
            $this->load->model('about_us_m');
            
//            $this->data['about_uploaded_images'] = $this->about_us_m->get_uploaded_images();
        } else {
            redirect(base_url('admin'));
        }
    }

    function get_about_us_info() {
        $this->load->view('admin/about_us', $this->data);
        $this->load->view('admin/footer');
    }

    /* function edit_category */

    public function edit_about_us_data() {
        if (isset($_POST['save_about_us_page'])) {
            $id = "1";
            $about_data = array('data' => $_POST['about_us_editor']);

            $this->db->where('id', $id);
            $this->db->update('about_us_data', $about_data);
            redirect(base_url('admin/about_us'));
        }
        unset($this->data, $about_data);
    }

    /* END  function edit_category */
    
    
    /* function upload images library */

    public function about_us_images_library() {
        if (isset($_POST['save_about_us_page'])) {
            $id = "1";
            $about_data = array('data' => $_POST['about_us_editor']);

            $this->db->where('id', $id);
            $this->db->update('about_us_data', $about_data);
            redirect(base_url('admin/about_us'));
        }
        unset($this->data, $about_data);
    }

    /* END function upload images library */
}
