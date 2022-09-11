<?php
/*
*Template Name: Contact Page
*
*/
 get_header(); ?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php the_title(); ?>
                </h1>
                
            </div> <!-- end s-content__header -->
			<div class="s-content__media col-full">
                <!--<div id="map-wrap">
                    <div id="map-container"></div>
                    <div id="map-zoom-in"></div>
                    <div id="map-zoom-out"></div>
                </div> -->
				<?php if(is_active_sidebar("contact_maps")): ?>
				<?php dynamic_sidebar("contact_maps")?>
				<?php endif;?>
            </div>
    
           

            <div class="col-full s-content__main">
			<?php the_content(); ?>
               <div class="row">
                    <?php if(is_active_sidebar("contact_bottom")): ?>
					<?php dynamic_sidebar('contact_bottom'); ?>
					<?php endif; ?>
                </div> 
            </div> <!-- end s-content__main -->
			
			<?php 
			?>
				<h3><?php  _e("Say Hello.","philosophydev"); ?></h3>
			<?php
			
				$get_googlemap_field = get_field("google_map");
				if($get_googlemap_field){
					echo do_shortcode($get_googlemap_field);
				}
			 ?>

        </article>

		
        

    </section>


    <?php get_footer(); ?>