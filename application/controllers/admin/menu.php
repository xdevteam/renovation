<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edit_menu
 *
 * @author baccardi
 */
class Menu extends CI_Controller {

    public $data;
    public $data_menu;

    function __construct() {
        parent::__construct();
        $session = $this->session->userdata('admin');
        if (!empty($session)) {
            $this->data['admin'] = $this->session->userdata('admin');
            if ($this->data['admin']['user_type'] == 'admin') {
                $this->load->view("admin/header", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'bloger') {
                $this->load->view("admin/header_bloger", $this->data);
            } elseif ($this->data['admin']['user_type'] == 'cm') {
                $this->load->view("admin/header_cm", $this->data);
            }
        } else {
            redirect(base_url('admin'));
        }
        /*
         *  load menu 
         */
        $this->load->model('admin_m');
        $this->data['fst_level'] = $this->admin_m->get_fst_l();
        /*
         *  load users 
         */
        $this->load->model('user_model');
        $this->data['user'] = $this->user_model->get_user();
    }

    public function edit_menu() {
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
            foreach ($this->input->post('parent') as $key => $value) {
                if ($id == $key)
                    $this->data['p_id'] = $value;
            }
            foreach ($this->input->post('parent2') as $key => $value) {
                if ($id == $key)
                    $this->data['p_id2'] = $value;
            }
            $this->admin_m->update_data($id, $this->data, 'id', 'menu');
            redirect(base_url('admin/menu'));
        }
        unset($id, $key, $value, $this->data);
    }

    /* END  function edit_menu */


    /* function change_type */

    public function change_type() {
        if (isset($_POST['status'])) {
            unset($this->data);
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'menu');
                    $this->admin_m->update_data($key, $this->data, 'p_id', 'menu');
                    $a = $this->db->query("SELECT id FROM menu  WHERE p_id='$key'");
                    foreach ($a->result() as $items) {
                        $this->admin_m->update_data($items->id, $this->data, 'p_id2', 'menu');
                    }
                } else {
                    $this->data['status'] = 'enable';
                    $a = $this->db->query("SELECT id FROM menu  WHERE p_id='$key'");
                    foreach ($a->result() as $items) {
                        $this->admin_m->update_data($items->id, $this->data, 'p_id2', 'menu');
                    }
                    $this->admin_m->update_data($key, $this->data, 'id', 'menu');
                    $this->admin_m->update_data($key, $this->data, 'p_id', 'menu');
                }
            }
            redirect(base_url('admin/menu'));
//        } if (isset($_POST['status2'])) {
//            foreach ($this->input->post('status2') as $key => $val) {
//                if ($val == 'enable') {
//                    $this->db->query("UPDATE menu SET status='disable' WHERE id='$key'");
//                    $this->db->query("UPDATE menu SET status='disable' WHERE p_id2='$key'");
//                } else {
//                    $a = $this->db->query("SELECT p_id FROM menu  WHERE id='$key'");
//                    foreach ($a->result() as $items) {
//                        $this->db->query("UPDATE menu SET status='enable' WHERE id='$items->p_id'");
//                    }
//                    $this->db->query("UPDATE menu SET status='enable' WHERE id='$key'");
//                    $this->db->query("UPDATE menu SET status='enable' WHERE p_id2='$key'");
//                }
//            }
//            redirect(base_url('admin/menu'));
//        }
//        if (isset($_POST['status3'])) {
//            foreach ($this->input->post('status3') as $key => $val) {
//                if ($val == 'enable') {
//                    $this->db->query("UPDATE menu SET status='disable' WHERE id='$key'");
//                } else {
//                    $a = $this->db->query("SELECT p_id2 FROM menu  WHERE id='$key'");
//                    foreach ($a->result() as $items) {
//                        $this->db->query("UPDATE menu SET status='enable' WHERE id='$items->p_id2'");
//                        $b = $this->db->query("SELECT p_id FROM menu  WHERE id='$items->p_id2'");
//                        foreach ($b->result() as $it) {
//                            $this->db->query("UPDATE menu SET status='enable' WHERE id='$it->p_id'");
//                        }
//                    }
//                    $this->db->query("UPDATE menu SET status='enable' WHERE id='$key'");
//                }
//            }
//            redirect(base_url('admin/menu'));
        }
//        unset($a, $b, $key, $items, $val, $this->data);
    }

    /* END function change_type */

    /* function delete_menu */

    public function delete_menu() {
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $a = $this->db->where('p_id', $id)->select("id")->get('menu');
                foreach ($a->result() as $items) {
                    $this->db->where('p_id2', $items->id)->delete('menu');
                }
                $this->db->where('id', $id)->delete('menu');
                $this->db->where('p_id', $id)->delete('menu');
                $this->db->where('p_id2', $id)->delete('menu');
            }
            foreach ($this->input->post('link') as $key => $value) {
                if ($id == $key)
                    $link = $value;
            }
            if (file_exists(APPPATH . '/views/userpages/' . $link . '.php')) {
                $fp = unlink('./application/views/userpages/' . $link . '.php');
                if ($fp) {
                    echo 'ok';
                }
            }
            echo $link;
            redirect(base_url('admin/menu'));
        }
        unset($fp, $link, $value, $id, $this->data, $a, $items);
    }

    /* END  function delete_menu  */

    public function get_menu_list() {
        $this->load->view('admin/menu', $this->data);
        $this->delete_menu();
        $this->change_type();
        $this->edit_menu();
        $this->load->view('admin/footer');
        unset($this->data);
    }

    function add_menu() {
        if (isset($_POST['add_item_menu'])) {
            $this->data_menu['owner'] = $this->input->post('owner');
            if ($this->input->post('group') == 'r') {
                $this->data_menu['type'] = 'd';
                $this->data_menu['p_id'] = $this->input->post('parent');
                $this->data_menu['p_id2'] = '0';
            }
            if ($this->input->post('group') == 'd') {
                $this->data_menu['type'] = 'dd';
                $this->data_menu['p_id'] = '0';
                $this->data_menu['p_id2'] = $this->input->post('parent');
            }
            if ($this->input->post('group') == 'default') {
                $this->data_menu['type'] = 'r';
                $this->data_menu['p_id'] = '0';
                $this->data_menu['p_id2'] = '0';
            }
            $this->data_menu['name'] = $this->input->post('name');
            $this->data_menu['status'] = $this->input->post('status');
            $link = $this->input->post('link');
            if (!empty($link)) {
                $this->data_menu['link'] = $this->input->post('link');
                $this->data_menu['main_link'] = $this->input->post('link');
                if ($this->input->post('owner') == 'user') {
                    if (!file_exists(APPPATH . '/views/userpages/' . $this->input->post('link') . '.php')) {
                        $fp = fopen('application/views/userpages/' . $this->input->post('link') . '.php', 'a');
                        $filepath = "application/views/userpages/" . $this->input->post('link') . ".php";
                        chmod($filepath, 0777);
                        fclose($fp);
                        $this->admin_m->insert_item($this->data_menu);
                        redirect(base_url('admin/menu'));
                    } else {
                        $this->data['error'] = 'Cтраница с таким именем уже существует!';
                        $this->load->view('admin/error', $this->data);
                        $this->load->view('admin/footer');
                    }
                }
                if ($this->input->post('owner') == 'admin') {
                    if (!file_exists(APPPATH . '/views/pages/' . $this->input->post('link') . '.php')) {
                        $fp = fopen('application/views/pages/' . $this->input->post('link') . '.php', 'a');
                        $filepath = "application/views/pages/" . $this->input->post('link') . " .php";
                        chmod($filepath, 0777);
                        fclose($fp);
                        $this->admin_m->insert_item($this->data_menu);
                        redirect(base_url('admin/menu'));
                    } else {
                        $this->data['error'] = 'Cтраница с таким именем уже существует!';
                        $this->load->view('admin/error', $this->data);
                        $this->load->view('admin/footer');
                    }
                }
            } else {
                $this->data_menu['link'] = '#';
                $this->admin_m->insert_item($this->data_menu);
                redirect(base_url('admin/menu'));
            }
        }
        unset($fp, $link, $this->data, $this->data_menu);
    }

}
