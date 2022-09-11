<?php
//Vertion Defain

if(site_url()=="http://localhost/complete"){
	define("VERSION",time());
}else{
	define("VERSION",wp_get_theme()->get('Version'));
}


//  After Setup Theme
function philosophydev_theme_setup(){
	// Load Text Domai
	load_theme_textdomain("philosophydev");
	/** tag-title **/
    add_theme_support( 'title-tag' );
	
	/** post formats */
    $post_formats = array('image','gallery','video','audio','link','quote');
    add_theme_support( 'post-formats', $post_formats);
	
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
 
    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
 
	 /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
	
	//image size 
	add_image_size("philosophydev_home_squere",400,400,true);
	//editor style
	add_editor_style("/assets/css/editor-style.css");
	
	// nav menu
	register_nav_menu("parimary_menu",__("paimary menu","philosophydev"));
	
	register_nav_menus(array(
	  "footer_left"	=> "Footer Left",
	  "footer_middel"	=>"Footer Middel",
	  "footer_right"	=>"Footer Right",
	));
	
	
	
}
add_action("after_setup_theme","philosophydev_theme_setup");

// Assets Adding

function philosophydev_scripts_add(){
	wp_enqueue_style("font-awesome",get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.min.css"),null,"1.0.0");
	wp_enqueue_style("fonts-css",get_theme_file_uri("/assets/css/fonts.css"),null,"1.0.0");
	wp_enqueue_style("base-css",get_theme_file_uri("/assets/css/base.css"),null,"1.0.0");
	wp_enqueue_style("vendor-css",get_theme_file_uri("/assets/css/vendor.css"),null,"1.0.0");
	wp_enqueue_style("main-css",get_theme_file_uri("/assets/css/main.css"),null,"1.0.0");
	wp_enqueue_style("philosophydev-css",get_theme_file_uri("/assets/css/philosophydev.css"),null,"1.0.0");
	wp_enqueue_style("stylsheet",get_stylesheet_uri(),null,VERSION);
	
	wp_enqueue_script("modernizr-js",get_theme_file_uri("/assets/js/modernizr.js"),null,"1.0.0");
	wp_enqueue_script("pace.min-js",get_theme_file_uri("/assets/js/pace.min.js"),null,"1.0.0");
	wp_enqueue_script("plugins-js",get_theme_file_uri("/assets/js/plugins.js"),array("jquery"),"1.0.0",true);
	wp_enqueue_script("main-js",get_theme_file_uri("/assets/js/main.js"),array("jquery"),"1.0.0",true);
}
add_action("wp_enqueue_scripts","philosophydev_scripts_add");


//  Requeire ss ;;

require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/liv/csfrem/cs-framework.php"));
require_once(get_theme_file_path("/inc/csfrem-write.php"));
// paginate links

function philosophydev_paginate_links(){
	global $wp_query;
	$links = paginate_links(array(
		"type"=>"list",
		"mid_size"=>3,
		'current'=>max(1,get_query_var('paged')),
		'total'=>$wp_query->max_num_pages
	));
	$links = str_replace("page-numbers",'pgn__num ',$links);
	$links = str_replace("ul class='pgn__num '",'ul',$links);
	$links = str_replace("next pgn__num ",'pgn__next',$links);
	$links = str_replace("prev pgn__num ",'pgn__prev',$links);
	echo wp_kses_post($links);
}
function change_para_tag(){
	
}

remove_action("term_description","wpautop");


function philosophydev_widgets(){
	register_sidebar(array(
		"name"	=>__("About Sidebar","philosophydev"),		
		"id"	=>"about_sidebar",
		"desc"	=>__("THis Is About Page Sidebar Please Fulfil It For Better Experiance","philosophydev"),
		"before_widget"	=>'<div id="%2$s" class="col-block %2$s">',
		"after_widget"	=>'</div>',
		"before_title"	=>'<h3 class="quarter-top-margin">',
		"after_title"	=>'</h3>'
	));
	register_sidebar(array(
		'name'	=>__('Contact Maps','philosophydev'),
		'id'	=>('contact_maps'),
		"before_widget"	=>'<div id="%2$s" class="%2$s">',
		"after_widget"	=>'</div>',
	));
	register_sidebar(array(
		'name'	=>__('Contact Bottom','philosophydev'),
		'id'	=>('contact_bottom'),
		"before_widget"	=>'<div id="%2$s" class="col-six tab-full %2$s">',
		"after_widget"	=>'</div>',
		"before_title"	=>'<h3>',
		"after_title"	=>'</h3>',
	));
	
	register_sidebar(array(
		'name'	=>__('Footer Top Right','philosophydev'),
		'id'	=>'footer_top_right'
	));
}
add_action("widgets_init","philosophydev_widgets");

function philosophydev_search_form(){
	$homeAction = home_url('/');
	$searchFor = __("Search for:",'philosophydev');
	$searchFor = __("Search for:",'philosophydev');
	$home_custom_search= <<<PT
	<input type="hidden" name="post_type" value="post">';	
PT;
		
	if(is_post_type_archive("slider")){
		$home_custom_search= <<<PT
	<input type="hidden" name="post_type" value="slider">';	
PT;
	}
	$newform = <<<FORM
	
	<form role="search" method="get" class="header__search-form" action="{$homeAction}">
                        <label>
                            <span class="hide-content">{$searchFor}</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$searchFor}" autocomplete="off">
                        </label>
						
                        <input type="submit" class="search-submit" value="Search">
						
                    </form>
					
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>	
FORM;
return $newform;
}

add_filter("get_search_form","philosophydev_search_form");

function before_title_action(){
	echo "<h3>My Name Is Mojahid</h3>";
}
add_action("before_title","before_title_action");

function call_after_title(){
	echo "<br>this is action hook"; 
}

add_action("after_title","call_after_title");

function change_this_filter($prec,$test){
	return strtoupper($prec)." ".$test;
}

add_filter("first_filter","change_this_filter",5,2);

function change_filter($headerclass){
	if(is_home()){
		return $headerclass;
	}else{
		return " ";
	}
}
add_filter("header_top_class","change_filter");




























