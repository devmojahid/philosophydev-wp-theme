<?php
	$get_field = "";
	if(function_exists("the_field")){
		$get_field = get_field("video");
	}
?>


 <article class="masonry__brick entry format-video" data-aos="fade-up">
                        
                    <div class="entry__thumb video-image">
                        <a href="<?php echo wp_kses_post($get_field); ?>color=01aef0&title=0&byline=0&portrait=0" data-lity>
                            <?php the_post_thumbnail("philosophydev_home_squere") ?>
                        </a>
                    </div>
    
                    <?php get_template_part("template-parts/post-formet/common-post"); ?>
    
                </article> <!-- end article -->

