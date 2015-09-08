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
        $this->data['admin'] = $this->session->userdata('admin');
        $this->load->model('user_model');
        $this->load->model('admin_m');

        /* load menu */
        $this->data['fst_level'] = $this->admin_m->get_fst_l();
        /* load users */
        $this->data['user'] = $this->admin_m->get_user();
        /* load focus product */
        $this->data['fpl'] = $this->admin_m->focus_product_list();
        /* load categories */
        $this->data['cat_list'] = $this->admin_m->category_list();
        /* load subcategories list */
        $this->data['list'] = $this->admin_m->get_subcategories_list();
        /* load product_m */
        $this->data['count_order'] = $this->admin_m->get_new_order();
        /* load main_m */
        /* load settings */
        $this->data['settings'] = $this->admin_m->get_setlist();
        /* load pages */
        $this->data['pages'] = $this->admin_m->get_pages();
        /* load commit */
        $this->data['count_commit'] = $this->admin_m->get_commit_num();
        /* load blog */
        $this->data['post'] = $this->admin_m->get_blog_back();
        /* load about_us_m */
        $this->data['news'] = $this->admin_m->get_news_back();
        $this->load->model('about_us_m');
        $this->data['about_us'] = $this->about_us_m->about_us_data();
        $session = $this->session->userdata('admin');
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
     *  function login admin 
     */

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
        unset($session_data, $email, $password, $this->data);
    }

    /* 
     * END function login admin  
     */

    /* 
     * Main Page ADMIN 
     */

    function admin_pages($page = 'index') {
        $session=$this->session->userdata('admin');
        if (!empty($session)) {
            if (!file_exists(APPPATH . '/views/admin/' . $page . '.php')) {
                show_404();
            } else {
                $this->load->view("admin/$page", $this->data);
                $this->load->view("admin/footer", $this->data);
            }
        } else {
            redirect(base_url('admin'));
        }
        unset($this->data);
    }

    /*
     *  END Main Page ADMIN 
     */

    /* 
     *  FUNCTION EXIT USER START'
     */

    function exit_user() {
        if (isset($_POST['logout'])) {
            $this->session->unset_userdata('admin');
            redirect(base_url());
        }
        unset($this->data);
    }

    /* 
     * FUNCTION EXIT USER END  
     */



    /*
     *  FUNCTION GET ORDER START 
     */

    function get_order() {
        $this->data['prepare'] = $this->admin_m->get_order();            
        foreach ($this->data['prepare'] as $k => $v) {            
            $this->data['order'][$v['id']] = $v;
            $geodata=unserialize($v['adress']);           
            $city=$this->admin_m->get_table_where('city', 'id', $geodata['location'], 'name');
            $location=$this->admin_m->get_table_where('locality', 'id', $geodata['city'], 'name');           
            $arr=$geodata;      
            $this->data['order'][$v['id']]['adress']=serialize($arr);
            $this->data['order'][$v['id']]['image'] = $this->admin_m->get_order_img($v['item_id']);
        }          
        $this->load->view("admin/new_orders", $this->data);
        $this->load->view("admin/footer", $this->data);
        unset($this->data, $k, $v);
    }

    /* get_order END */


    /* edit setting START */

    function edit_setting() {
        if (isset($_POST['edit'])) {
            foreach ($this->input->post('edit') as $val) {
                $id = $val;
            }
            foreach ($this->input->post('set') as $key => $value) {
                if ($id == $key)
                    $name = $value;
            }
            $this->db->query("UPDATE settings SET value='$name' WHERE id='$id'");
        }
        redirect(base_url('admin/settings'));
    }

    /* edit setting END */


    /* edit fake_comments START */

    function fake_comment() {
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
            foreach ($this->input->post('office') as $key => $value) {
                if ($id == $key)
                    $office = $value;
            }
            $this->db->query("UPDATE fake_comments SET user_name='$name' WHERE id='$id'");
            $this->db->query("UPDATE fake_comments SET text='$text' WHERE id='$id'");
            $this->db->query("UPDATE fake_comments SET office='$office' WHERE id='$id'");
        }
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {
                $this->db->where('id', $id)->delete('fake_comments');
            }
        }
        if (isset($_POST['status'])) {
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->db->query("UPDATE fake_comments SET status='disable' WHERE id='$key'");
                } else {
                    $this->db->query("UPDATE fake_comments SET status='enable' WHERE id='$key'");
                }
            }
        }
        redirect(base_url('admin/fake_comments'));
    }

    /* edit fake_comments END */

   

    function get_about_us_info() {
        $this->load->view('admin/about_us', $this->data);
        $this->load->view('admin/footer');
    }

    /* function edit_about_us_data */

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

    /* END  function edit_about_us_data */

    /* USER PAGE CONTENT START*/ 
    function user_page_content($id){
        $file ='application/views/userpages/'.$id.'.php';
        $this->data['page_inf']=$this->admin_m->get_page_item($id);
        $this->data['current'] = file_get_contents($file);
        $this->load->view('admin/edit_page', $this->data);
        $this->load->view('admin/footer');
    }
    /* USER PAGE CONTENT END*/

     /* USER PAGE CONTENT EDIT START*/ 
    function edit_user_page_content(){
        if(isset($_POST['save_user_page'])){
            $current=$this->input->post('page_editor');
            $id=$this->input->post('save_user_page');
            $file ='application/views/userpages/'.$id.'.php';
            file_put_contents($file, $current);
            redirect(base_url('admin/pages'));
        }
    }
    /* USER PAGE CONTENT EDIT END*/ 

     /* USER PAGE CONTENT DEL_HIDE START*/ 
    function del_hide_user_page_content(){
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
                $fp = unlink('application/views/userpages/' . $link . '.php');
                if ($fp) {
                    echo 'ok';
                }
            }
            echo $link;
            redirect(base_url('admin/pages'));
        }
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
            redirect(base_url('admin/pages'));   
        }
    }
    /* USER PAGE CONTENT DEL_HIDE END*/


    /* GALLERY PAGE  START*/
    function get_gallery_data(){
        $this->data['gallery']=$this->admin_m->get_table("gallery");
        $this->load->view('admin/gallery', $this->data);
        $this->load->view('admin/footer');
    }
    function add_gallery_img(){
        if(isset($_POST['save_gallery'])){
            unset( $this->data);
            if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["prod_photo"]["tmp_name"], './upload/gallery/' . $_FILES["prod_photo"]["name"])){
                    $this->data = $this->input->post();
                    $this->data['image_path'] = '../../../upload/gallery/' . $_FILES["prod_photo"]["name"];
                    // var_dump($this->data);
                    unset($this->data['save_gallery']);
                    if($this->admin_m->insert_table('gallery', $this->data)){
                        redirect(base_url('admin/gallery'));
                    }
                }
            }  
        }
    }
    function update_gallery_img(){
        if(isset($_POST['save_gallery'])){
            unset( $this->data);
            $id=$this->input->post('id');
            if (is_uploaded_file($_FILES["prod_photo"]["tmp_name"])) {
                unlink(substr($this->input->post('old_src'), 7));
                if (move_uploaded_file($_FILES["prod_photo"]["tmp_name"], './upload/gallery/' . $_FILES["prod_photo"]["name"])){
                    $this->data = $this->input->post();
                    $this->data['image_path'] = '../../../upload/gallery/' . $_FILES["prod_photo"]["name"];
                    //
                    unset($this->data['save_gallery'], $this->data['old_src'],$this->data['id']);
                   
                    
                }
            }else{
                $this->data = $this->input->post();
                $this->data['image_path'] = $this->input->post('old_src');
                unset($this->data['save_gallery'], $this->data['old_src'], $this->data['id']);
            }

           if($this->admin_m->update_data($id, $this->data, 'id', 'gallery')){
                redirect(base_url('admin/gallery'));
            }   
        }

    }
    function edit_gallery(){
        if (isset($_POST['delete'])) {
            foreach ($this->input->post('delete') as $id) {                
                $this->db->where('id', $id)->delete('gallery');                
            }
            
            redirect(base_url('admin/gallery'));
        }
        if (isset($_POST['status'])) {
            unset($this->data);
            foreach ($this->input->post('status') as $key => $val) {
                if ($val == 'enable') {
                    $this->data['status'] = 'disable';
                    $this->admin_m->update_data($key, $this->data, 'id', 'gallery');               
                   
                } else {
                    $this->data['status'] = 'enable';                  
                    $this->admin_m->update_data($key, $this->data, 'id', 'gallery');
              
                }
                redirect(base_url('admin/gallery'));   
            }
        }
    }
    function gallery_editor($id){
        if(isset($id)){
            $this->data['gallery_info']=$this->admin_m->get_data_where('gallery', 'id', $id);
       
        $this->load->view('admin/add_gallery', $this->data);
        $this->load->view('admin/footer');
         }
    }
    /* GALLERY PAGE  END*/


}
