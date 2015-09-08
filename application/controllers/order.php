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
        $this->data['slider'] = $this->main_m->get_slider_item();
        $this->data['menu'] = $this->main_m->get_menu_item();
        $this->data['recent_news']=$this->main_m->get_recent_news(); 
        $this->load->view("templates/header",  $this->data);
        
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
            if(!empty($this->input->post('street'))){ $this->prep['adr']['street'] = $this->input->post('street'); }  else{ $err+=1; } 
            if(!empty($this->input->post('home'))){ $this->prep['adr']['home'] = $this->input->post('home'); }  else{ $err+=1; } 
            if(!empty($this->input->post('flat'))){ $this->prep['adr']['flat'] = $this->input->post('flat'); }  else{ $err+=1; } 
            if(!empty($this->input->post('commit'))){ $this->prep['adr']['commit'] = $this->input->post('commit'); }  else{ $err+=1; } 
            if($err==0){
                

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
