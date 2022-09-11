<?php
// active modules
    define( 'CS_ACTIVE_FRAMEWORK',   false  );
    define( 'CS_ACTIVE_METABOX',     true  );
    define( 'CS_ACTIVE_TAXONOMY',    false  );
    define( 'CS_ACTIVE_SHORTCODE',   false  );
    define( 'CS_ACTIVE_CUSTOMIZE',   false  );
    define( 'CS_ACTIVE_LIGHT_THEME', true );
	
function initalize_metabox(){
		CSFramework_Metabox::instance(array());
	}
	
add_action("init","initalize_metabox");
	
function philosofy_metabox($options){
		$options[]=array(
			"id"	=>"metabox_option",
			"title"	=>__("THis Is Our MEtabox","philosofydev"),
			"post_type"	=>"page",
			"context"	=>"normal",
			"priority"	=>"default",
			"section"	=>array(
				"name"	=>"test_section",
				"title"	=>"This Is Test Section",
				"icon"	=>"fa fa-facebok",
				"fields"=>array(
				array(
					"id"	=>"text_box",
					"type"	=>"text",
					"title"	=>__("upload Your Title","philosofy"),
					"default"=>__("this Is Default Text","philosofy")
				),
				array(
					"id"	=>"textarea_box",
					"type"	=>"textarea",
					"title"	=>__("upload Your textarea","philosofy"),
					"default"=>__("this Is Default textarea","philosofy")
				)
					
					
				)
			)
		);
			
		return $options;
	}
	
add_filter("cs_metabox_options",'philosofy_metabox');