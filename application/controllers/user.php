<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public $data;
    public $script;

    function __construct() {
        parent::__construct();
        if (!file_exists(APPPATH . 'controllers/mailer/PHPMailerAutoload.php')) {
            echo "lalka";
        } else {
            require_once 'application/controllers/mailer/PHPMailerAutoload.php';
        }
        $this->load->model('user_model');
        $this->load->model('product_m');
        $this->load->model('main_m');
        $this->load->model('settings_m');
         $this->data['prep_popular'] = $this->product_m->get_popular();
        foreach ($this->data['prep_popular'] as $k => $v) {
            foreach ($v as $key => $val) {
                if ($key == 'name') {
                    $this->data['popular'][$k]['trans'] = $this->translit($val);
                }
                $this->data['popular'][$k][$key] = $val;
            }
        }
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
        $this->script['location'] = $this->main_m->get_location();
        $this->data['location'] = $this->main_m->get_location();
        $this->data['city'] = $this->main_m->get_city();
        $this->data_user['user'] = @$this->session->userdata('user');
        $session = $this->session->userdata('user');
    }

    /* function Add user to database */

    function add_user() {
        unset($this->data);
        if (isset($_POST)) {
            $this->data['usercat'] = $this->input->post('usercat');
            $this->data['user_type'] = 'user';
            $this->data['name'] = $this->input->post('name');
            $this->data['surname'] = $this->input->post('surname');
            $this->data['patronymic'] = $this->input->post('patronymic');
            $this->data['password'] = $this->input->post('password');
            if ($this->data['usercat'] == 'buyer') {
                $this->data['company'] = "NULL";
                $this->data['email'] = $this->input->post('email');
                $this->data['phone'] = $this->input->post('phone');
                $this->data['country'] = $this->input->post('country');
                $location_id = $this->input->post('location');
                $this->data['location'] = $this->user_model->get_location($location_id);
                $city = $this->input->post('city');
                $this->data['city'] = $this->user_model->get_city($city);
                $this->data['street'] = $this->input->post('street');
                $this->data['building'] = $this->input->post('building');
                $email = $this->input->post('email');
            } else {
                $email = $this->input->post('company_email');
                $this->data['company'] = $this->input->post('company');
                $this->data['email'] = $this->input->post('company_email');
                $this->data['phone'] = $this->input->post('company_phone');
                $this->data['phone_more'] = $this->input->post('company_phone_more');
                $this->data['country'] = $this->input->post('company_country');
                $location_id = $this->input->post('company_location');
                $this->data['location'] = $this->user_model->get_location($location_id);
                $city = $this->input->post('company_city');
                $this->data['city'] = $this->user_model->get_city($city);
                $this->data['street'] = $this->input->post('company_street');
                $this->data['building'] = $this->input->post('company_building');
            }
            if (!empty($this->data)) {
//                    date_default_timezone_set('Etc/UTC');
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Encoding = '7bit';
                $mail->CharSet = 'utf-8';
                $mail->setLanguage('ru', 'mailer/language');
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = 'illiquid.siteandseo@gmail.com';
                $mail->Password = 'illiquid2015';
                $mail->FromName = "PROM_ILLIQUID";
                $mail->setFrom('PROM_ILLIQUID', '');
                $mail->addReplyTo('PROM_ILLIQUID', '');
                $mail->addAddress($email, '');
                $mail->Subject = 'Данные для входа';
                $mail->Body = 'Ваш логин: ' . $email . '<br/> Ваш Пароль: ' . $this->input->post('password');
                $mail->AltBody = 'Ваш логин: ' . $email . ' <br/> Ваш Пароль: ' . $this->input->post('password');
                $mail->addAttachment('img/logo-regular.png');
                if ($mail->send()) {
                    
                }
                $response = $this->user_model->add_user($this->data, $email);
            } else {
                $response = '400';
            }
            echo json_encode($response);
            unset($response, $this->data, $city, $email, $location_id);
        }
    }

    /* END function Add user to database */


    /* function login user from database */

    function get_user() {
        $this->data['slider'] = $this->main_m->get_slider_item();
        if (!empty($session)) {
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['user_category'] = $this->user_model->get_usercat_byID($this->data['user']['id']);
            if ($this->data['user']['usercat'] == "seller") {
                $num = 1;
            } else {
                $num = 2;
            }
            $this->data['menu'] = $this->main_m->get_menu_front($num);
            $this->load->view("templates/header_user", $this->data);
        } else {
            $this->load->view("templates/header", $this->data);
        }
        $this->script['script'] = "<script src='../../../js/validation.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                . "<script src='../../../js/autoComplete.js'></script>"
                . "<script src='../../../js/main.js'></script>"
                . "<script src='../../../js/cart.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/bootstrap-switch.js'></script>"
                . "<script src='../../../js/main_nav.js'></script>"
                . "<script src='../../../js/switcher.js'></script>"
                . "<script src='../../../js/product_settings.js'></script>";
        $this->load->view('pages/login');
        $this->load->view('templates/footer', $this->script);
        if (isset($_POST['login'])) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('user_model');
            $this->data['user'] = $this->user_model->login_user($email, $password);
            if (!empty($this->data['user'])) {
                foreach ($this->data['user'] as $item) {
                    $session_data['id'] = $item['id'];
                    $session_data['name'] = $item['name'];
                    $session_data['surname'] = $item['surname'];
                    $session_data['patronymic'] = $item['patronymic'];
                    $session_data['email'] = $item['email'];
                    $session_data['phone'] = $item['phone'];
                    $session_data['usercat'] = $item['usercat'];
                    $session_data['company'] = $item['company'];
                    $session_data['password'] = $item['user_type'];
                    $session_data['country'] = $item['country'];
                    $session_data['location'] = $item['location'];
                    $session_data['city'] = $item['city'];
                }
                $this->session->set_userdata(array('user' => $session_data));
                redirect(base_url('cabinet'));
            }
        }
        unset($session_data, $password, $email, $this->data, $this->script);
    }

    /* END function login user from database  */


    /*  function exit user  */

    function exit_user() {

        if (isset($_POST['logout'])) {
            $this->session->unset_userdata('user');
            $this->session->unset_userdata('data_view');
            redirect(base_url());
        }
    }

    /* END function exit user  */

    function add_product() {
        if (isset($_POST)) {
            unset($this->data);
            if (is_uploaded_file($_FILES["prod_photo_1"]["tmp_name"])) {
                move_uploaded_file($_FILES["prod_photo_1"]["tmp_name"], "./uploads/products/" . $this->data_user['user']['id'] . '_' . $_FILES["prod_photo_1"]["name"]);
                if (move_uploaded_file($_FILES["prod_photo_2"]["tmp_name"], "./uploads/products/" . $this->data_user['user']['id'] . '_min' . $_FILES["prod_photo_2"]["name"]))
                    $this->data['min_img1'] = '../../../uploads/products/' . $this->data_user['user']['id'] . '_min' . $_FILES["prod_photo_2"]["name"];
                if (move_uploaded_file($_FILES["prod_photo_3"]["tmp_name"], "./uploads/products/" . $this->data_user['user']['id'] . '_min' . $_FILES["prod_photo_3"]["name"]))
                    $this->data['min_img2'] = '../../../uploads/products/' . $this->data_user['user']['id'] . '_min' . $_FILES["prod_photo_3"]["name"];
                if (move_uploaded_file($_FILES["prod_photo_4"]["tmp_name"], "./uploads/products/" . $this->data_user['user']['id'] . '_min' . $_FILES["prod_photo_4"]["name"]))
                    $this->data['min_img3'] = '../../../uploads/products/' . $this->data_user['user']['id'] . '_min' . $_FILES["prod_photo_4"]["name"];
                $this->data['name'] = $this->input->post('prod_name');
                $this->data['image_path'] = '../../../uploads/products/' . $this->data_user['user']['id'] . '_' . $_FILES["prod_photo_1"]["name"];
                $this->data['price'] = $this->input->post('prod_price');
                $this->data['subcat_id'] = $this->input->post('prod_subcat');
                $this->data['status'] = 'enable';
                $this->data['description'] = $this->input->post('prod_description');
                $this->data['prod_min_order'] = $this->input->post('prod_min_order');
                $this->data['currency'] = $this->input->post('prod_currency');
                $this->data['prod_code'] = $this->input->post('prod_code');
                $this->data['condition'] = $this->input->post('prod_condition');
                $this->data['ball'] = $this->input->post('ball');
                $this->data['prod_quantity'] = $this->input->post('prod_quantity');
                $this->data['id_user'] = $this->data_user['user']['id'];
                $this->data['views'] = 0;
                $this->data['date'] = date('Y-m-d H:i:s');
                if ($this->product_m->add_product($this->data) == true) {
                    redirect(base_url('default'));
                } else {
                    redirect(base_url('add_product'));
                }
            }
            unset($this->data);
        }
    }

    function account_user($id) {
        $session = $this->session->userdata('user');
        if (!empty($session)) {
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['user_category'] = $this->user_model->get_usercat_byID($this->data['user']['id']);
            if ($this->data['user']['usercat'] == "seller") {
                $num = 1;
            } else {
                $num = 2;
            }
            $this->data['menu'] = $this->main_m->get_menu_front($num);
            $this->load->view("templates/header_user", $this->data);
        } else {
            $this->load->view("templates/header", $this->data);
        }
        $this->script['script'] = "<script src='../../../js/validation.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                . "<script src='../../../js/autoComplete.js'></script>"
                . "<script src='../../../js/main.js'></script>"
                . "<script src='../../../js/cart.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/bootstrap-switch.js'></script>"
                . "<script src='../../../js/main_nav.js'></script>"
                . "<script src='../../../js/switcher.js'></script>"
                . "<script src='../../../js/xml2json.js'></script>"
                . "<script src='../../../js/maps.js'></script>"
                . "<script src='../../../js/product_settings.js'></script>";

        unset($this->data);
        $this->data['user'] = $this->session->userdata('user');
        $this->data['location'] = $this->main_m->get_location();
        $session = $this->session->userdata('user');
        if (!empty($session)) {
            $this->data['user_data2'] = $this->user_model->get_user_by_id($id);
            if ($this->data['user_data2'] == true) {
                foreach ($this->data['user_data2'] as $key => $val) {
                    foreach ($val as $k => $v) {
                        $this->data['user_data'][$k] = $v;
                    }
                }
                if ($this->data['user']['id'] == $id) {
                    $this->load->view('pages/account', $this->data);
                    $this->load->view('templates/footer', $this->script);
                } else {
                    redirect(base_url('account') . '/' . $this->data['user']['id']);
                }
            } else {
                redirect(base_url('account') . '/' . $this->data['user']['id']);
            }
        } else {
            redirect(base_url());
        }
        unset($this->data, $this->script, $key, $val, $k, $v);
    }

    function company_info($id) {
        $session = $this->session->userdata('user');
        if (!empty($session)) {
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['user_category'] = $this->user_model->get_usercat_byID($this->data['user']['id']);
            if ($this->data['user']['usercat'] == "seller") {
                $num = 1;
            } else {
                $num = 2;
            }
            $this->data['menu'] = $this->main_m->get_menu_front($num);
            $this->load->view("templates/header_user", $this->data);
        } else {
            $this->load->view("templates/header", $this->data);
        }
        $this->script['script'] = "<script src='../../../js/validation.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                . "<script src='../../../js/autoComplete.js'></script>"
                . "<script src='../../../js/main.js'></script>"
                . "<script src='../../../js/cart.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/bootstrap-switch.js'></script>"
                . "<script src='../../../js/main_nav.js'></script>"
                . "<script src='../../../js/switcher.js'></script>"
                . "<script src='../../../js/xml2json.js'></script>"
                . "<script src='../../../js/maps.js'></script>"
                . "<script src='../../../js/product_settings.js'></script>";
        $session = $this->session->userdata('user');
        if (empty($session)) {
            redirect(base_url());
        }
        unset($this->data);
        $this->data['user'] = $this->session->userdata('user');
        $this->data['location'] = $this->main_m->get_location();
        if ($this->data['user']['id'] == $id && $this->data['user']['usercat'] == 'buyer') {
            redirect(base_url('account'));
        }
        $this->data['user_data2'] = $this->user_model->get_user_by_id($id);
        if ($this->data['user_data2'] == true) {
            foreach ($this->data['user_data2'] as $key => $val) {
                foreach ($val as $k => $v) {
                    $this->data['user_data'][$k] = $v;
                }
            }
            if ($this->data['user']['id'] == $id && $this->data['user']['usercat'] == 'seller') {
                $this->load->view('pages/company_info', $this->data);
            } else {
                redirect('view_company/' . $id);
            }
        } else {
            redirect('company_info/' . $this->data['user']['id']);
        }
        $this->load->view('templates/footer', $this->script);
        unset($this->data, $this->script, $key, $val, $k, $v);
    }

    function view_company($id) {
        if (!empty($session)) {
            $this->data['user'] = @$this->session->userdata('user');
            $this->data['user_category'] = $this->user_model->get_usercat_byID($this->data['user']['id']);
            if ($this->data['user']['usercat'] == "seller") {
                $num = 1;
            } else {
                $num = 2;
            }
            $this->data['menu'] = $this->main_m->get_menu_front($num);
            $this->load->view("templates/header_user", $this->data);
        } else {
            $this->load->view("templates/header", $this->data);
        }

        $this->script['script'] = "<script src='../../../js/validation.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/perfect-scrollbar.jquery.js'></script>"
                . "<script src='../../../js/autoComplete.js'></script>"
                . "<script src='../../../js/main.js'></script>"
                . "<script src='../../../js/cart.js'></script>"
                . "<script src='../../../js/ajax_select.js'></script>"
                . "<script src='../../../js/bootstrap-switch.js'></script>"
                . "<script src='../../../js/main_nav.js'></script>"
                . "<script src='../../../js/switcher.js'></script>"
                . "<script src='../../../js/xml2json.js'></script>"
                . "<script src='../../../js/maps.js'></script>"
                . "<script src='../../../js/product_settings.js'></script>";
        $this->data['user'] = $this->session->userdata('user');
        $this->data['location'] = $this->main_m->get_location();
        $this->data['user_data2'] = $this->user_model->get_user_by_id($id);
        $this->data['ident'] = $id;
        $this->data['rating'] = $this->user_model->get_rate($id);
        if ($this->data['user_data2'] == true) {
            foreach ($this->data['user_data2'] as $key => $val) {
                foreach ($val as $k => $v) {
                    $this->data['user_data'][$k] = $v;
                }
            }
        }
        $this->data['prep_other'] = $this->product_m->get_item_by_userid($this->data['ident'], 0);
//        print_r( $this->data['prep_other'] );
        foreach ($this->data['prep_other'] as $k => $v) {
            foreach ($v as $key => $val) {
                if ($key == 'name') {
                    $this->data['other'][$k]['trans'] = $this->translit($val);
                }
                $this->data['other'][$k][$key] = $val;
            }
        }
        $this->data['comment'] = $this->user_model->get_comment($id);
        $this->load->view('pages/view_company', $this->data);
        $this->load->view('templates/footer', $this->script);
        unset($this->data, $this->script, $key, $val, $k, $v);
    }

    function translit($str) {
        $str = trim($str);
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', '.', ',', '>', '<', ';', ')', '(', '*', '}', '', ', ');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '-', '_', '_', '', '', '', '', '', '', '', '', '_');
        return str_replace($rus, $lat, $str);
    }

    function add_commit() {

        if (isset($_POST['add_commit'])) {
            unset($this->data);
            $this->data['author'] = $this->input->post('author');
            $this->data['email'] = $this->input->post('author');
            $this->data['commit'] = $this->input->post('comment');
            $this->data['company_id'] = $this->input->post('company');
            $this->data['stars'] = $this->input->post('star_rating');
            $this->data['date'] = date('Y-m-d H:i:s');
            $id = $this->input->post('company');
            $this->data['error'] = '';
            if (empty($this->data['author'])) {
                $this->data['error'] .= '<h4 style="color: red;">Ошибка заполните поле Имя</h4>';
            }
            if (empty($this->data['email'])) {
                $this->data['error'] .= '<h4 style="color: red;">Ошибка заполните поле Email</h4>';
            }
            if (empty($this->data['commit'])) {
                $this->data['error'] .= '<h4 style="color: red;">Ошибка заполните поле Ваш комментарий</h4>';
            }
            if (empty($this->data['stars'])) {
                $this->data['error'] .= '<h4 style="color: red;">Ошибка заполните поле Ваш рейтинг</h4>';
            }
            if (empty($this->data['error'])) {
                unset($this->data['error']);
                $this->user_model->add_commit($this->data);
                redirect(base_url() . 'view_company/' . $id);
            } else {
                $this->view_company($id);
            }
        }
        unset($this->data, $this->script);
    }

    function edit_user_data() {
        if (isset($_POST['account_submit'])) {
            unset($this->data);
            $id = $this->input->post('id');
            $this->data['name'] = $this->input->post('account_name');
            $this->data['surname'] = $this->input->post('account_surname');
            $this->data['patronymic'] = $this->input->post('account_patronymic');
            $this->data['email'] = $this->input->post('account_email');
            $this->data['phone'] = $this->input->post('account_phone');
            $this->data['country'] = $this->input->post('account_country');
            $location = $this->input->post('location');
            $this->data['location'] = $this->user_model->get_location($location);
            $city = $this->input->post('city');
            if (!(int) $city) {
                $this->data['city'] = $city;
            } else {
                $this->data['city'] = $this->user_model->get_city($city);
            }
            $this->data['street'] = $this->input->post('account_street');
            $this->data['building'] = $this->input->post('account_building');
            $this->db->where('id', $id)->update('user', $this->data);
            redirect(base_url() . 'account');
        }
        unset($this->data);
    }

    function edit_company_data() {
        if (isset($_POST['company_submit'])) {
            unset($this->data);
            $id = $this->input->post('company_id');
            $this->data['company'] = $this->input->post('company_name');
            $this->data['phone_more'] = $this->input->post('company_phone_more');
            $this->data['email'] = $this->input->post('company_email');
            $this->data['phone'] = $this->input->post('company_phone');
            $this->data['country'] = $this->input->post('company_country');
            $location = $this->input->post('location');
            $this->data['location'] = $this->user_model->get_location($location);
            $city = $this->input->post('city');
            if (!(int) $city) {
                $this->data['city'] = $city;
            } else {
                $this->data['city'] = $this->user_model->get_city($city);
            }
            $this->data['street'] = $this->input->post('company_street');
            $this->data['building'] = $this->input->post('company_building');
            $this->db->where('id', $id)->update('user', $this->data);
            redirect(base_url() . 'company_info/' . $id);
        }
        unset($id, $location, $city, $this->data);
    }

}
