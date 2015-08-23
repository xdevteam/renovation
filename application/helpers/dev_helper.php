<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	// Переназначение первичных ключей массива на произвольный ассоциативный
	function foreachByKey($data=array(), $key='id')
	{
		$rtrn = array();
		foreach($data as $kv){
			$rtrn[$kv[$key]] = $kv;
		}
		
		return $rtrn;
	}
	
	// Переназначение первичных ключей массива на произвольный многомерный ассоциативный
	function foreachByKeyToKey($data=array(), $key='id', $key2='cat_id')
	{
		$rtrn = array();
		foreach($data as $kv){
			$rtrn[$kv[$key]][$kv[$key2]] = $kv;
		}
		
		return $rtrn;
	}


	// АНОНСЫ СТАТЕЙ, НОВОСТЕЙ
	// ------------------------------------------------------------------------------
	 function cut_str($str, $lenght) { 
		if(empty($lenght)) $lenght = 320; 
		$str=strip_tags($str);
		if (strlen($str) >= $lenght) { 
			$wrap = wordwrap($str, $lenght, "~"); 
			$str_cut = substr($wrap, 0, strpos($wrap, "~")); 
			$str_cut .= ' ...'; 
			return $str_cut; 
		} else { 
			$str_cut = $str.''; 
			return $str_cut; 
		} 
	 }
	
	function count_tree($category_id, $lang)
	{
		$CI->db->where('lang',$lang); // Берем только русские
		$CI->db->where('cat_id',$category_id);
		$count = $CI->db->from('categories')->count_all_results();
		return $count;
	}
	
	function build_tree($category_id, $lang, $addon) // SQL результат, ID с которого начинаем, имя модуля, префикс категории
	{
			$CI = &get_instance();
			
			$rtrn = '<ul id="cat_'.$category_id.'" style="display:none;">';
			$CI->db->order_by('name','asc'); // Сортируем названию
			$CI->db->order_by('pos','asc'); // Сортируем по позиции
            $CI->db->where('lang',$lang); // Берем только русские
			$CI->db->where('cat_id',$category_id);
            $data = $CI->db->get('categories')->result_array();
			foreach($data as $item)
			{
				$rtrn .= '<li '.$addon.'><a href="'.base_url().'ru/catalog/'.$item['url'].'"  title="'.$item['meta_title'].'"> <i class="fa fa-angle-right" style="margin-right: 17px; color: c8c8c8; display: inline;"></i> '.$item['name'].'</a>';
				if(count($CI->db->where('cat_id', $item['id'])->get('categories')->result()) > 0) { $rtrn .= '<span style="position:absolute; right:0px; top:7px; display:block; float:right; clear:none; z-index:1; width:27px; height:27px; cursor:pointer; font-weight:bold; color:#bcbcbc; font-size:12px;"><i class="fa fa-plus-circle"></i></span>'; }
				$rtrn .= ''.build_tree($item['id'], $lang, "style=\"padding-left:10px;\"").'
				</li>'; 
			}
			return $rtrn.'</ul>';
	}
	
	function dashboard_counter()
    {
        $CI = &get_instance();
		$data = array();
		
		//$this->db->like('title', 'match');
		
		// Товары
		$CI->db->from('products');
		$data['products_num'] = round($CI->db->count_all_results() / 2, 0);
		// Категории
		$CI->db->from('categories');
		$data['categories_num'] = round($CI->db->count_all_results() / 2, 0);
		// Заказы
		$CI->db->from('orders');
		$data['orders_num'] = $CI->db->count_all_results();
		// Страницы
		$CI->db->from('pages');
		$data['pages_num'] = round($CI->db->count_all_results() / 2, 0);
		// Пользователи
		$CI->db->from('users');
		$data['users_num'] = $CI->db->count_all_results();
		
		$data['files_size'] = foldersize('files') / 1024 / 1024;
		$data['files_size'] = round($data['files_size'], 1);
		
		$data['cache_size'] = foldersize('application/cache') / 1024 / 1024;
		$data['cache_size'] = round($data['cache_size'], 1);
		
		return $data;
    }
	
	function foldersize($path) {
	  $total_size = 0;
	  $files = scandir($path);

	  foreach($files as $t) {
		if (is_dir(rtrim($path, '/') . '/' . $t)) {
		  if ($t<>"." && $t<>"..") {
			  $size = foldersize(rtrim($path, '/') . '/' . $t);

			  $total_size += $size;
		  }
		} else {
		  $size = filesize(rtrim($path, '/') . '/' . $t);
		  $total_size += $size;
		}
	  }
	  return $total_size;
	}
  
	function pre($var)
    {
        if(is_array($var))
        {
            echo "<pre>";
            print_r($var);
            echo "</pre>";
        }
        else
        {
            echo "<br> NOT AN ARRAY! <br>";
        }
    }
	
	 
	 // Получение реального IP-адреса
	 // ------------------------------------------------------------------------------
	 function GetRealIp()
	 {
	  if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip=$_SERVER['HTTP_CLIENT_IP']; }
	  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }
	  else { $ip=$_SERVER['REMOTE_ADDR']; }
	 return $ip;
	 }
    
    function redir($url)
    {
        return '<html><head><meta http-equiv="refresh" content="0;URL='.$url.'"></head><body><center><h1>Now will be redirect...</h1></center></body></html>';
    }
    
    function get_values($array = array(), $key = '')
    {
        if(!is_array($array) || empty($array) || empty($key))
            return array();
        
        $result = array();
        foreach($array as $item)
            if(!in_array($item[$key],$result))
                $result[] = $item[$key];
        
        return $result;
    }
    
    function make_dir($path = '')
    {
        if(empty($path))
            return FALSE;
        
        $curr_path = "";
        $path_array = explode("/",$path);
        foreach($path_array as $dir)
        {
            $curr_path .= $dir.'/';
            if (!file_exists($curr_path) && !is_dir($curr_path))
                mkdir($curr_path,0755);
        }
        
        return TRUE;
    }
    
    function get_admin_pagination($total_rows = 0, $base_url = '', $uri_segment = 4)
    {
        $pagination['base_url'] = $base_url;
        $pagination['total_rows'] = $total_rows;
        $pagination['uri_segment'] = $uri_segment;            
        $pagination['per_page'] = 1;
        $pagination['num_links'] = 2;
        $pagination['full_tag_open'] = '<ul class="pagination">';
        $pagination['full_tag_close'] = '</ul>';
        $pagination['next_link'] = '&raquo;';
        $pagination['prev_link'] = '&laquo;';
        $pagination['next_tag_open'] = '<li>';
        $pagination['next_tag_close'] = '</li>';
        $pagination['prev_tag_open'] = '<li>';
        $pagination['prev_tag_close'] = '</li>';
        $pagination['cur_tag_open'] = '<li class="active"><a>';
        $pagination['cur_tag_close'] = '</a></li>';
        $pagination['num_tag_open'] = '<li>';
        $pagination['num_tag_close'] = '</li>';
        $pagination['first_tag_open'] = '<li>';
        $pagination['first_tag_close'] = '</li>';
        $pagination['last_tag_open'] = '<li>';
        $pagination['last_tag_close'] = '</li>';
        $pagination['last_link'] = 'Последняя';
        $pagination['first_link'] = 'Первая';
        $pagination['use_page_numbers'] = TRUE;
        
        return $pagination;
    }

    function get_public_pagination($total_rows = 0, $base_url = '', $uri_segment = 4)
    {
        $pagination['base_url'] = $base_url;
        $pagination['total_rows'] = $total_rows;
        $pagination['uri_segment'] = $uri_segment;            
        $pagination['per_page'] = 1;
        $pagination['num_links'] = 2;
        $pagination['full_tag_open'] = '<ul class="pagination">';
        $pagination['full_tag_close'] = '</ul>';
        $pagination['next_link'] = '&raquo;';
        $pagination['prev_link'] = '&laquo;';
        $pagination['next_tag_open'] = '<li id="pagination_next">';
        $pagination['next_tag_close'] = '</li>';
        $pagination['prev_tag_open'] = '<li id="pagination_previous">';
        $pagination['prev_tag_close'] = '</li>';
        $pagination['cur_tag_open'] = '<li class="current pag-top"><a>';
        $pagination['cur_tag_close'] = '</a></li>';
        $pagination['num_tag_open'] = '<li>';
        $pagination['num_tag_close'] = '</li>';
        $pagination['first_tag_open'] = '<li>';
        $pagination['first_tag_close'] = '</li>';
        $pagination['last_tag_open'] = '<li>';
        $pagination['last_tag_close'] = '</li>';
        $pagination['last_link'] = 'Последняя';
        $pagination['first_link'] = 'Первая';
        $pagination['use_page_numbers'] = TRUE;
        
        return $pagination;
    }
	
?>