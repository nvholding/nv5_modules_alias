<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}
$link_true = true;
$get_url = $_SERVER['REQUEST_URI'];
$get_url = str_replace('.html','',$get_url);
 if (defined('NV_IS_SPADMIN')) {
                    $drag_block = $nv_Request->get_int('drag_block', 'session', 0);
                    if ($nv_Request->isset_request('drag_block', 'get')) {
                        $drag_block = $nv_Request->get_int('drag_block', 'get', 0);
                        $nv_Request->set_Session('drag_block', $drag_block);

                        $nv_redirect = nv_get_redirect('get', true);

                        if (empty($nv_redirect)) {
                            $nv_redirect = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name;
                        }
                        nv_redirect_location($nv_redirect);
                    }
                    if ($drag_block) {
                        define('NV_IS_DRAG_BLOCK', true);
                        $adm_int_lang = $nv_Request->get_string('int_lang', 'cookie');
                        if ($adm_int_lang != NV_LANG_DATA) {
                            $nv_Request->set_Cookie('int_lang', NV_LANG_DATA, NV_LIVE_COOKIE_TIME);
                        }
                    }
                }
if(strpos($get_url,'sitemap-')){
	$array_url = explode('/',$get_url);
	$sitemap  = explode('.',$array_url[1]);
	$_GET[NV_NAME_VARIABLE] = $sitemap[1];
	$_GET[NV_OP_VARIABLE] = 'sitemap';
}elseif(strpos($get_url,'index.php?') && strpos($get_url,'admin/index.php?') != true){
	$array_url = explode('?',$get_url);
	//print_r($_SERVER['REDIRECT_QUERY_STRING']);
	if($array_url[1] == $_SERVER['REDIRECT_QUERY_STRING']){
		if(strpos($get_url,'language=')){
			$request= explode('&',$_SERVER['REDIRECT_QUERY_STRING']);
			$_GET[NV_NAME_VARIABLE] = str_replace('nv=','',$request[1]);	
			if(!empty($request[1])){
				$_GET[NV_OP_VARIABLE] = str_replace('op=','',$request[2]);
			}
		}else{
			$request= explode('&',$_SERVER['REDIRECT_QUERY_STRING']);
			$_GET[NV_NAME_VARIABLE] = str_replace('nv=','',$request[0]);	
			if(!empty($request[1])){
				$_GET[NV_OP_VARIABLE] = str_replace('op=','',$request[1]);
			}
		}
			
	}
	//phpinfo();
	
}else{
	$array_url = explode('/',$get_url);
	if(end($array_url)==''){array_pop($array_url);}
	$page = 1;
	$id_alias = 0;
	$mod = '';
	if($array_url[1] != 'admin'){
		if($array_url[0] == NV_LANG_DATA && !empty($array_url[2])){
	
		$alias_mod = str_replace('/','',$array_url[2]);
	}elseif($array_url[1] == 'sitemap.xml'){
		$alias_mod = SitemapIndex;
		nv_xmlSitemapIndex_generate();
    	die();
	}else{
		$alias_mod = str_replace('/','',$array_url[1]); 
		
	}
	$site_module = nv_site_mods();
	
	if(isset($site_module[$alias_mod])){
		$_GET[NV_NAME_VARIABLE] = $alias_mod;
		if(!empty($array_url[2]))
		{
			if((substr($array_url[2], 0, 5) == 'page-') == true){
				$_GET[NV_OP_VARIABLE] = 'main';
				$page = intval(substr($array_url[2], 5));
			}else{
				$_GET[NV_OP_VARIABLE] = $array_url[2];
				$page = 1;
			}
			
			
		}else{
			$_GET[NV_OP_VARIABLE] = 'main';
			$page=1;
		}
		
	}else{
		$page = 1;
		$array_alias = $db->query(" SELECT * FROM " . NV_PREFIXLANG . "_alias_rows WHERE alias like '". $alias_mod ."'")->fetch();
		if($array_alias['id'])
		{
			$_GET[NV_NAME_VARIABLE] = $array_alias['module'];
			$_GET[NV_OP_VARIABLE] = $array_alias['op'];
			if($array_alias['id_alias'] > 0){
				$id = $array_alias['id_alias'];
				$array_alias_cat = $db->query(" SELECT * FROM " . NV_PREFIXLANG . "_alias_rows WHERE module like '". $array_alias['module'] ."' && catid_alias =" . $array_alias['catid_alias'])->fetch();
				//print_r($array_alias_cat);
				if($array_alias_cat['catid_alias'] > 0)
				{
					$_GET[NV_OP_VARIABLE] =  $array_alias_cat['alias'].'/'.$alias_mod;
					$alias_url = $array_alias_cat['alias'].'/'.$alias_mod;
					$catid = $array_alias['catid_alias'];
				}
			}else{
				if(!empty($array_url[2]))
				{
				
					$string = str_replace('/','',$array_url[2]);
					if (substr($string, 0, 5) == 'page-') 
					{
						$_GET[NV_OP_VARIABLE] =  $alias_mod . '/' . $array_url[2];
					}
				}
				else
				{
					$_GET[NV_OP_VARIABLE] =  $alias_mod;
				
				}
			}
			
			
			
			
			$alias = $array_alias['alias'];
			
			$link_true = false;
		}
	}
}


//print_r($alias);
//print_r($array_url);
/*  */
//print_r($alias_mod);die;

		

//print_r($alias_url );die;
 //print_r(NV_NAME_VARIABLE);die;
 /* 
// XỬ LÝ ĐIỀU HƯỚNG LINK
	
	$get_url = $_SERVER['REQUEST_URI'];
	$array_url = explode('/',$get_url);
	
	$alias_mod = str_replace('/','',$array_url[1]);
	$alias_mod = str_replace('.html','',$alias_mod);
	$page = 1;
	if(!empty($array_url[2]))
	{
	
		$string = str_replace('.html','',$array_url[2]);
		if (substr($string, 0, 5) == 'page-') 
		{
			$page = intval(substr($array_url[2], 5));
		}
		
	}
	
	// XỬ LÝ URL MODULE
	$link_true = true;
	if (!isset($site_mods[$module_name]) and !empty($alias_mod))
	{
		//print_r($alias_mod);die;
		
		// LẤY MODULE, OP, ID, CATID CỦA ALIAS 
		$array_alias = $db->query(" SELECT * FROM " . NV_PREFIXLANG . "_alias_rows WHERE alias like '". $alias_mod ."'")->fetch();
		
		if($array_alias['id'])
		{
			$module_name = $array_alias['module'];
			$op = $array_alias['op'];
			
			if($array_alias['id_alias'] > 0)
			$id = $array_alias['id_alias'];
			
			if($array_alias['catid_alias'] > 0)
			$catid = $array_alias['catid_alias'];
			
			$alias_url = $array_alias['alias'];
			$alias = $array_alias['alias'];
			
			$link_true = false;
			
		}
		else
		{
			nv_redirect_location(NV_BASE_SITEURL);
		}
		
		
	}
	
	//print_r($array_alias);die;
	// KẾT THÚC XỬ LÝ URL MODULE */
	
}
