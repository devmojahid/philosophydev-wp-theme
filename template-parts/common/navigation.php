<a class="header__toggle-menu" href="#0" title="Menu"><span><?php _e("Menu","philosophydev"); ?></span></a>
<nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6"><?php _e("Site Navigation","philosophydev"); ?></h2>

                
                       <?php 
					   $philosophydev_navigation=wp_nav_menu(array(
							"theme_location"	=>"parimary_menu",
							"menu_id"			=>"headermenu",
							"menu_class"		=>"header__nav",
							"echo"				=>false
					   ));
						$philosophydev_navigation = str_replace("menu-item-has-children","menu-item-has-children has-children",$philosophydev_navigation);
						echo wp_kses_post($philosophydev_navigation);
					   ?>
                    

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu"><?php _e("Close","philosophydev"); ?></a>

                </nav> <!-- end header__nav-wrap -->