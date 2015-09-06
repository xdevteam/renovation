<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order
 *
 * @author baccardi
 */
class Order extends CI_Controller {

    public $data_db;
    public $data;
    public $prep;

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_m');
        $this->load->model('main_m');
                $this->load->model('settings_m');
        $this->script['city'] = $this->settings_m->get_set('city');
        $this->script['street_build'] = $this->settings_m->get_set('street/build');
        $this->script['phone1'] = $this->settings_m->get_set('phone1');
        $this->script['phone2'] = $this->settings_m->get_set('phone2');
        $this->script['email'] = $this->settings_m->get_set('email');
        $this->script['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->script['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->script['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->script['vk_link'] = $this->settings_m->get_set('vk_link');
               $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
        $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
        $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
        $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
        $this->data_user['user'] = @$this->session->userdata('user');
        $session = $this->session->userdata('user');
        $this->data['recent_post']=$this->main_m->get_recent_post();
        $this->data['slider'] = $this->main_m->get_slider_item();
        $this->data['menu'] = $this->main_m->get_menu_item();
        $this->data['recent_news']=$this->main_m->get_recent_news(); 
        if (!empty($session)) {
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['user_category'] = $this->user_model->get_usercat_byID($this->data['user']['id']);
            if ($this->data['user']['usercat'] == "seller") {
                $num = 1;
            } else {
                $num = 2;
            }
            $this->script['location'] = $this->main_m->get_location();
            $this->data['location'] = $this->main_m->get_location();
            $this->data['city'] = $this->main_m->get_city();
            $this->data['menu'] = $this->main_m->get_menu_front($num);            
            $this->load->view("templates/header_user", $this->data);
        } else {
            $this->load->view("templates/header",  $this->data);
        }
    }

    function add_order() {
        if (isset($_POST['send'])) {

            $this->data_db['name'] = $this->input->post('h_name');
            $this->data_db['price'] = $this->input->post('h_price');
            $this->data_db['currency'] = $this->input->post('h_currency');
            $this->data_db['quantity'] = $this->input->post('quantity');
            $this->data_db['item_id'] = $this->input->post('h_id');
            $err=0;
            if(!empty($this->input->post('name'))){ $this->prep['buyer']['name'] = $this->input->post('name'); }else{ $err=1; }
            if(!empty($this->input->post('surname'))){ $this->prep['buyer']['surname'] = $this->input->post('surname'); } else{ $err+=1; }           
            if(!empty($this->input->post('email'))){ $this->prep['buyer']['email'] = $this->input->post('email'); } else{ $err+=1; }   
            if(!empty($this->input->post('phone'))){ $this->prep['buyer']['phone'] = $this->input->post('phone'); } else{ $err+=1; }   
            if(!empty($this->input->post('location'))){ $this->prep['adr']['location'] = $this->input->post('location'); } else{ $err+=1; }   
            if(!empty($this->input->post('city'))){ $this->prep['adr']['city'] = $this->input->post('city'); }  else{ $err+=1; } 
            if($err==0){
                foreach ($this->data_db['item_id'] as $id) {
                    $a[] = $this->user_model->get_user_by_id($this->product_m->get_user_by_product($id));
                    foreach ($a as $num => $column) {
                        foreach ($column as $name => $value) {
                            $this->data_db['type_of_deliverance'][$id] = $this->input->post('type_of_deliverance');
                            $this->data_db['type_of_order'][$id] = $this->input->post('type_of_order');
                            $this->data_db['status'][$id] = 'Новый';
                            $this->data_db['a_status'][$id] = 'new';
                            $this->data_db['seller_data'][$id] = serialize($value);
                            $this->data_db['adress'][$id] = serialize($this->prep['adr']);
                            $this->data_db['buyer_data'][$id] = serialize($this->prep['buyer']);
                            $this->data_db['date'][$id] = date('Y-m-d H:i:s');
                        }
                    }
                }

                foreach ($this->data_db as $num => $column) {
                    foreach ($column as $name => $value) {
                        $json[$name][$num] = $value;
                    }
                }

                foreach ($json as $num => $value) {
                    $this->product_m->add_order($value);
                }
               redirect(base_url('default'));
            }else{
            $this->data['error']='Заполните Все поля!';
            $this->load->view('pages/error',  $this->data );
            $this->load->view("templates/footer",  $this->data);

        }
         unset($json, $this->data_db, $this->prep, $value, $column, $num, $this->data);
        }
    }
}
