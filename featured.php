<?php
/*
*Template Name: Featured Custom Post
*/
 get_header() ?>
    <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <?php
				
				$featured_custopm_query_post = array(
					"meta_key"	=>'is_featured',
					"meta_value"=>true,
					"posts_per_page"=>3,
					"post_type"	=>"slider"
				);
				
				$run_code = new WP_Query($featured_custopm_query_post);
					while($run_code->have_posts()){
						$run_code->the_post();
						
						get_template_part("template-parts/post-formet/post",get_post_format()); 
					}
				?>

                    

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    
					
					<?php philosophydev_paginate_links(); ?>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->


    
  <?php get_footer(); ?>