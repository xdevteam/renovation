<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partner
 *
 * @author baccardi
 */
class Partner extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->load->model('admin_m');
        $this->load->model('main_m');
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
     * FUNCTION PARTNER START
     */

    function partners() {
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
            $this->admin_m->update_data($id, $this->data, 'id', 'partners');
        }
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('partners');
            }
        }
        if (isset($_POST['status'])) {
            unset($this->data);
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'partners');
                } else {
                    $this->data['status'] = 'enable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'partners');
                }
            }
        }
        $this->data['partner'] = $this->admin_m->get_table('partners');
        $this->load->view("admin/partners", $this->data);
        $this->load->view("admin/footer", $this->data);
        unset($this->data, $id, $key, $value);
    }

   /* 
     * FUNCTION PARTNER END
     */

    /* 
     * FUNCTION ADD PARTNER START 
     */

    function add_partner() {
        if (isset($_POST['add_partner'])) {
            $name = $this->input->post('name');
            if (!empty($name)) {
                if (is_uploaded_file($_FILES["logo"]["tmp_name"])) {
                    unset($this->data);
                    $this->data['link'] = $this->input->post('link');
                    $this->data['name'] = $this->input->post('name');
                    $this->data['status'] = $this->input->post('status');
                    $this->data['logo'] = '../../../upload/partner/' . $_FILES["logo"]["name"];
                    move_uploaded_file($_FILES["logo"]["tmp_name"], "./upload/partner/" . $_FILES["logo"]["name"]);
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
        unset($this->data, $name);
    }

   /* 
     * FUNCTION ADD PARTNER END
     */
}
