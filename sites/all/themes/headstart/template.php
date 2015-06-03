<?php

function headstart_preprocess_page(&$vars) {

//code block from the Drupal handbook
    //the path module is required and must be activated
    
	if(drupal_match_path($_GET['q'],"app/announcements*")) {
		drupal_add_css(path_to_theme(). "/css/announcements.css", "theme",'all',false);
		// $vars['template_files'][] = 'page-home';
	}
    
	$testmatch = preg_match_all('/(\d+)/i',$template_filename,$matches,PREG_PATTERN_ORDER);
	if ( $testmatch !== FALSE ){//&& is_numeric(arg(1))) {
	  $nid = array_pop($matches[1]);
	  $node = node_load(array('nid' => $nid));
	  //print_r($node);
	  $type = $node->type;
	  if (strpos('policies',$type)!==FALSE) {
			$vars['template_files'][] = 'page-policies';	
	  }
	}
    
	if(module_exists('path')) {
		//gets the "clean" URL of the current page
		$alias = drupal_get_path_alias($_GET['q']);
		if ( $alias == "admin/user/permissions" ) $vars['template_files'][] = "page-permissions";
        //$suggestions = array();
        $template_filename = 'page';
        
        
       foreach(explode('/', $alias) as $path_part) {

        $template_filename = $template_filename.'-'.$path_part;
       $vars['template_files'][] = $template_filename;
	  }

	}
	
	

 
	if(!empty($vars['node']->type) && $vars['node']->type!="page")			$vars['template_files'][] = 'page-node-'.$vars['node']->type;
	if(!empty($vars['node']->type) && strpos($vars['node']->type,"policies")!==FALSE)
	$vars['template_files'][] = 'page-policies';
   //if(!empty($vars['node']->nid))  													$vars['template_files'][] = 'page-node-'.$vars['node']->nid;

	$masthead = $vars['node']->field_masthead_image_name[0]["value"];
	if(empty($masthead)) $masthead = "resources";
	if(strpos($alias,"announcements")!==FALSE) $masthead="about";
	$vars['masthead'] = $masthead;

  if (arg(2) == 'edit' && strpos($vars['node']->path,"policies")!==FALSE) {
		$vars['template_files'][] = 'page-policies';
		//echo "editing mode...";
  }
  
  $vars['styles'] = drupal_get_css();

$alias = drupal_get_path_alias($_GET['q']);
  if ($alias == 'hsolc-videos')
  {
//  	print "<h2>{$alias}</h2>";exit;
		$vars['template_files'][] = 'page-html5--videos';
		drupal_add_js(
			drupal_get_path('theme','headstart').'/js/youtube.js',
			'theme',
			'header',
			false,
			false,
			false
		);
  }

/*
	echo "<h1>{$vars['node']->type}</h1>";
 echo '<pre>';
      print_r($vars['template_files']);
	echo '</pre>';
*/ 
}


function headstart_preprocess_node( &$vars ) {
	$node = &$vars['node'];
	static $index = 0;
	if( $node->is_announcement ) {
		$vars['template_files'][] = 'node-announcement-custom';
	}
	if( /*++$index < 2 && $node->type == 'announcement' &&*/ $node->nid == 3126 ) {
//	tail( array_keys(get_object_vars($node)) );

	}
/*  	echo "<h1>{$vars['node']->type}</h1>";
 echo '<pre>';
      print_r($vars['template_files']);
	echo '</pre>';*/
}