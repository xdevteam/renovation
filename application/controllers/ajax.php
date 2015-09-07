<?php

class Ajax extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->load->model('category_m');
        $this->load->model('subcategories_m');
        $this->load->model('product_m');
        $this->load->model('main_m');
        $this->load->model('user_model');
        $this->load->model('settings_m');
        $this->script['location'] = $this->main_m->get_location();
        $this->data['location'] = $this->main_m->get_location();
        $this->data['city'] = $this->main_m->get_city();
    }

    public function change_tabs($tab = '1') {
        $categories = $this->category_m->get_category_list($tab);
        $json = array();
        foreach ($categories as $num => $column) {
            foreach ($column as $name => $value) {
                $json[$name][$num] = $value;
            }
        }
        echo json_encode($json);
        unset($categories, $json, $num, $column, $name, $value);
    }

    public function filter_by_category() {
        $id = $_POST['id'];
        $subcat_list = $this->subcategories_m->get_subcategories_by_category($id);
        $json = array();
        foreach ($subcat_list as $num => $column) {
            foreach ($column as $name => $value) {
                if ($name == 'id') {
                    $name = 'link';
                }
                $json[$name][$num] = $value;
            }
        }
        echo json_encode($json);
        unset($subcat_list, $json, $num, $column, $name, $value);
    }

    public function filter_by_group() {
        $id = $_POST['id'];
        $cat_list = $this->category_m->get_category_listby_id($id);
        $json = array();
        foreach ($cat_list as $num => $column) {
            foreach ($column as $name => $value) {
                $json[$name][$num] = $value;
            }
        }
        echo json_encode($json);
        unset($cat_list, $json, $num, $column, $name, $value, $id);
    }

    public function filter_by_categories() {
        $id = $_POST['id'];
        $cat_list = $this->subcategories_m->get_subcategories_by_cat_id($id);
        $json = array();
        foreach ($cat_list as $num => $column) {
            foreach ($column as $name => $value) {
                $json[$name][$num] = $value;
            }
        }
        echo json_encode($json);
        unset($cat_list, $json, $num, $column, $name, $value, $id);
    }

    public function change_item_menu() {
        $type = $_POST['id'];
        $menu_list = $this->main_m->get_parent($type);
        $json = array();
        foreach ($menu_list as $num => $column) {
            foreach ($column as $name => $value) {
                if ($name == 'id') {
                    $name = 'link';
                }
                $json[$name][$num] = $value;
            }
        }
        echo json_encode($json);
        unset($menu_list, $json, $num, $column, $name, $value, $type);
    }

    public function change_location() {
        $id = $_POST['id'];
        $menu_list = $this->main_m->get_city_by_id($id);
        $json = array();
        foreach ($menu_list as $num => $column) {
            foreach ($column as $name => $value) {
                $json[$name][$num] = $value;
            }
        }
        echo json_encode($json);
//        unset($menu_list, $json, $num, $column, $name, $value, $id);
    }

    function change_role() {
        if (isset($_GET['id'])) {
            if ($_GET['id'] == "1") {
                $num = 1;
                $type = 'seller';
            }
            if ($_GET['id'] == "0") {
                $num = 2;
                $type = 'buyer';
            }
            $this->data['user'] = $this->session->userdata('user');

            $session_data['id'] = $this->data['user']['id'];
            $session_data['name'] = $this->data['user']['name'];
            $session_data['surname'] = $this->data['user']['surname'];
            $session_data['patronymic'] = $this->data['user']['patronymic'];
            $session_data['email'] = $this->data['user']['email'];
            $session_data['phone'] = $this->data['user']['phone'];
            $session_data['company'] = $this->data['user']['company'];
            $session_data['password'] = $this->data['user']['password'];
            $session_data['country'] = $this->data['user']['country'];
            $session_data['city'] = $this->data['user']['city'];
            $this->data['user_category'] = 'seller';
            unset($this->data['user']);

            $session_data['usercat'] = $type;

            $this->session->set_userdata(array('user' => $session_data));
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['menu'] = $this->main_m->get_menu_front($num);
            $this->data['tw_link'] = $this->settings_m->get_set('tw_link');
            $this->data['inst_link'] = $this->settings_m->get_set('inst_link');
            $this->data['fb_link'] = $this->settings_m->get_set('fb_link');
            $this->data['vk_link'] = $this->settings_m->get_set('vk_link');
            $this->load->view("templates/header_ajax", $this->data);
            unset($session_data, $type, $num);
        }
    }
    public function main_page_content() {
        $link = $_POST['id'];
        $id = $this->category_m->get_category_id_by_link($link);
        $description = $this->category_m->get_category_description($id);
        $this->data['subcategories_img']=$this->subcategories_m->get_subcategories_list_by_category($id);
        ?>
        <div id="category_content" style="opacity:0;">
            <?php foreach ($this->data['subcategories_img'] as $item) {
            ?>
            <!-- 1st row -->
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6 tabs-grid-item">
                <div class="inner-item">
                    <a href="<?= base_url(); ?>products/<?= $item['link'] ?>" class="item-link">
                        <div class="photo-frame">
                            <img src="<?= $item['image_path'] ?>" alt="<?= $item['name'] ?>">
                        </div>
                        <div class="item-title">
                            <span><?= $item['name'] ?></span>
                        </div>
                    </a>
                </div>
            </div>
            <?php }
            ?>
            <!-- Category  descrition -->
                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 clearfix">
                        <?=$description?>
                    </div>
                    <!-- Category Description END --> 
        </div>

        <?php
        
    }
    function stock_widget(){
        unset($this->data);
        $this->data['stock']=$this->main_m->get_stock();
        if(!empty($this->data['stock'])){
            $stock=array_rand($this->data['stock'], 1);                
            echo json_encode($this->data['stock'][$stock]);
        }
        else{
            echo "empty";
        }
    }
    function recomend(){
        unset($this->data);
        $this->data['stock']=$this->main_m->get_recomend();
        if(!empty($this->data['stock'])){
            $stock=array_rand($this->data['stock'], 1);                
            echo json_encode($this->data['stock'][$stock]);
        }
        else{
            echo "empty";
        }
    }
    function add_message(){

        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['mail'])){
            $email=$_POST['mail'];
        }
        if(isset($_POST['theme'])){
            $theme=$_POST['theme'];
        }
        if(isset($_POST['phone'])){
            $phone=$_POST['phone'];
        }
        if(isset($_POST['message'])){
            $message=$_POST['message'];
        }
        if (!file_exists(APPPATH . 'controllers/mailer/PHPMailerAutoload.php')) {
            echo "ERROR MAIL LIBRARY";
        } else {
            require_once 'application/controllers/mailer/PHPMailerAutoload.php';
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Encoding = '7bit';
        $mail->CharSet = 'utf-8';
        $mail->setLanguage('ru', 'mailer/language');
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'messengerrenovation@gmail.com';
        $mail->Password = 'messengerRenovation_2015';
        $mail->FromName = "САЙТ ЕВРОРЕМОНТ";
        $mail->setFrom("САЙТ ЕВРОРЕМОНТ", "САЙТ ЕВРОРЕМОНТ");
        $mail->addReplyTo('PROM_ILLIQUID', '');
        $mail->addAddress("mprihodko92@gmail.com", '');
        $mail->Subject = $theme;
        $mail->Body = $message."<br> <strong>Контакты: </strong><br> <b>Email:</b>".$email."<br> <b>Телефон:</b>".$phone." <br><strong>Прислал: </strong> ".$name." ";
        $mail->AltBody = $message;
        $mail->addAttachment('fgd');
        if($mail->send()) {
          echo "success";
        }
        }
  
}