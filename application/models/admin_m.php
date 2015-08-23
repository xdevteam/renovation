<?php

class Admin_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * GENERAL
     */

    function update_data($id, $data, $column, $table) {
        $this->db->where($column, $id);
        $this->db->update($table, $data);
    }

    function get_table($table) {
        $partner = $this->db->get($table);
        return $partner->result_array();
    }
     function get_table_where($table, $field, $search, $element) {
        $query = $this->db->select($element)->where($field, $search)->get($table);
        foreach ($query->result() as $row) {
            return $row->$element;
        }
    }
    /*
     * GENERAL END
     */


    /*
     *  ITEM GROUP
     */

    function focus_product_list() {
        $query = $this->db->get('focus_products');
        return $query->result_array();
    }

    /*
     *  ITEM GROUP END  
     */


    /*
     * CATEGORIES
     */

    function category_list() {
        $query = $this->db->get("categories");
        return $query->result_array();
    }

    function category_by_id($id) {
        $query = $this->db->where('id', $id)->get("categories");
        return $query->result_array();
    }

    function add_category($data) {
        $this->db->insert('categories', $data);
    }

    /*
     * CATEGORIES END
     */


    /*
     * SUBCATEGORIES 
     */

    function get_subcategories_list() {
        $query = $this->db->get('subcategories');
        return $query->result_array();
    }

    function get_subcategories_by_($column, $id) {
        $query = $this->db->where($column, $id)->get('subcategories');
        return $query->result_array();
    }

    function get_subcat_element_by($column, $id, $element) {
        $query = $this->db->where($column, $id)->select($element)->get('subcategories');
        foreach ($query->result() as $row) {
            return $row->$element;
        }
    }

    function add_subcategory($data) {
        $this->db->insert('subcategories', $data);
    }

    /*
     * SUBCATEGORIES END
     */


    /*
     * PRODUCT 
     */

    function get_product($id) {
        $query = $this->db->where('id', $id)->get('product');
        return $query->result_array();
    }

    function get_product_element_by($column, $id, $element) {
        $query = $this->db->where($column, $id)->select($element)->get('product');
        foreach ($query->result() as $row) {
            return $row->$element;
        }
    }

    function get_product_by_subcat_link($link) {
        $query = $this->db->where('link', $link)->select('id')->get('subcategories');
        foreach ($query->result() as $row) {
            $subcat_id = $row->id;
        }
        $query = $this->db->where('subcat_id', $subcat_id)->get('product');
        return $query->result_array();
    }

    function get_all_product($num, $offset) {
        $query = $this->db->get('product', $num, $offset);
        return $query->result_array();
    }

    function get_all_products() {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    function add_product($data) {
        if ($this->db->insert('product', $data)) {
            return TRUE;
        }
    }

    /*
     * PRODUCT END
     */

    /*
     * SETTINGS 
     */

    function get_setlist() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

    /*
     * SETTINGS END
     */


    /*
     * USERS
     */

    function get_user() {
        $query = $this->db->where('user_type', 'user')->get('user');
        return $query->result_array();
    }

    /*
     * USERS END 
     */

    /*
     * SLIDER
     */

    function get_slider_item() {
        $picture = $this->db->order_by("act", "desc")->get('slider');
        return $picture->result_array();
    }

    function get_slider_insert($data) {
        if ($this->db->insert('slider', $data)) {
            return true;
        }
    }

    /*
     * SLIDER END
     */

    /*
     * ORDERS START
     */
    function get_order() {
        $query = $this->db->get('orders');
        return $query->result_array();
    }

    function get_new_order() {
        $query = $this->db->where('a_status', 'new')->get('orders');
        return $query->result_array();
    }

    function get_order_img($id) {
        $query = $this->db->where('id', $id)->select('image_path')->get('product');
        foreach ($query->result() as $row) {
            return $row->image_path;
        }
    }
    /*
     * ORDERS END
     */

    /*
     * MENU
     */

    function get_fst_l() {
        $main = $this->db->where('type', 'r')->get('menu');
        return $main->result_array();
    }

    function insert_item($data) {
        $query = $this->db->insert('menu', $data);
    }

    function get_pages() {
        $partner = $this->db->where('link',!'#')->get('menu');
        return $partner->result_array();
    }

    /*
     * MENU END
     */


    /*
     * BLOG
     */

    function add_blog($data) {
        if ($this->db->insert('blog', $data)) {
            return TRUE;
        }
    }
  
    function get_blog_by_id($id) {
        $blog = $this->db->where('id', $id)->get('blog');
        return $blog->result_array();
    }

    function get_blog_back() {
        $blog = $this->db->get('blog');
        return $blog->result_array();
    }

    /*
     * BLOG END
     */


    /*
     * COMMENTS
     */

    function get_commit_num() {
        $query = $this->db->get('commit');
        return $query->num_rows();
    }

    /*
     * COMMENTS END
     */
}
