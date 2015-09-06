<?php 
class Blog extends CI_Controller{
    public $data = '';
    public $script = '';

    function __construct() {
        parent::__construct();
        $this->load->model('category_m');
        $this->load->model('main_m');
        $this->load->model('settings_m');
        $this->load->model('product_m');
        $this->load->model('about_us_m');
        $this->load->model('subcategories_m');
        $this->data['subcat_side'] = $this->subcategories_m->get_subcategories_sidebar();
            $this->data['prepare'] = $this->category_m->get_category_sidebar();
            foreach ($this->data['prepare'] as $key => $value) {
                foreach ($this->data['subcat_side'] as $k => $v) {
                    if ($v['cat_id'] == $value['id']) {
                        $this->data['cat_list'][$value['name']][$value['link']][$v['link']][$v['name']] = $this->product_m->count_products($v['id']);
                    }
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
         $this->data['menu'] = $this->main_m->get_menu_item();
         $this->data['recent_post']=$this->main_m->get_recent_post();
         $this->data['recent_news']=$this->main_m->get_recent_news(); 
        $this->load->view("templates/header", $this->data);
    }
    /* get_blog START */

    public function get_blog() {
        
        $arr = $this->main_m->count_blog();
        $config['base_url'] = base_url() . 'blog/page';
        $config['total_rows'] = count($arr);
        $config['per_page'] = '2';
        $config['full_tag_open'] = '<ul class="pagination-list text-center">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><a  class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = 'Назад';
        $config['next_link'] = 'Вперед';
        $config['prev_tag_open'] = '<li><a class="prev-pag">';
        $config['prev_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li><a class="next-pag">';
        $config['next_tag_close'] = '</a></li>';
        $this->load->model('main_m');
        $this->data['post'] = $this->main_m->get_blog($config['per_page'], $this->uri->segment(3));
        $this->pagination->initialize($config);
        $this->data['recent_post']=$this->main_m->get_recent_post();
        $this->load->view("pages/blog", $this->data);
        $this->load->view("templates/footer", $this->data);

    }

    /* get_blog END */
    /* get_post START */

    function get_post($id) {
        $this->load->model('main_m');
        $this->data['recent_post']=$this->main_m->get_recent_post();
        $this->data['post_view'] = $this->main_m->get_blog_by_id($id);
        $this->load->view('pages/single-post', $this->data);
        $this->load->view('templates/footer');
//         
    }

    /* get_post END */


}