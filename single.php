<?php


 get_header(); ?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
				
					<?php echo apply_filters("first_filter","mojahid idlsm is good boy","langfulll"); ?>
					
				
					<?php do_action("before_title") ?>
                    <?php the_title(); ?>
					<?php do_action("after_title") ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php echo get_the_date("M d,Y") ?></li>
                    <li class="cat">
                        <?php echo get_the_category_list(" "); ?>
                       
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

               <?php the_content(); ?>

                <p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                        <?php echo get_the_tag_list(); ?>
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <?php 
						echo get_avatar(get_the_author_meta("ID"));
					?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="#0"><?php the_author(); ?></a>
                        </h4>
                    
                        <p><?php the_author_meta("description") ?>
                        </p>

							<?php 
							$philosofydev_facebook_field = get_field("facebook",'user_'.get_the_author_meta('ID')); 
							$philosofydev_twitter_field = get_field("twitter",'user_'.get_the_author_meta('ID')); 
							$philosofydev_instagram_field = get_field("instagram",'user_'.get_the_author_meta('ID')); 
							 ?>
                        <ul class="s-content__author-social">
						<?php if($philosofydev_facebook_field):?>
                           <li><a href="<?php echo esc_url($philosofydev_facebook_field); ?>">Facebook</a></li>
						   <?php endif; ?>
                           <li><a href="<?php echo esc_url($philosofydev_twitter_field); ?>">Twitter</a></li>
                           <li><a href="#0">Instagram</a></li>
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
					<?php 
						$philosofydev_prev_post = get_previous_post();
						if($philosofydev_prev_post):
					?>
                        <div class="s-content__prev">
                            <a href="<?php echo get_the_permalink($philosofydev_prev_post) ?>" rel="prev">
                                <span><?php _e("Previous Post",'philosofydev') ?></span>
                                <?php echo get_the_title($philosofydev_prev_post)?> 
                            </a>
                        </div>
						<?php endif; ?>
						
						<?php 
						$philosofydev_next_post = get_next_post();
						if($philosofydev_next_post):
					?>
						<div class="s-content__next">
                            <a href="<?php echo get_the_permalink($philosofydev_next_post) ?>" rel="prev">
                                <span><?php _e("Next Post",'philosofydev') ?></span>
                                <?php echo get_the_title($philosofydev_next_post)?> 
                            </a>
                        </div>
						<?php endif; ?>
						
                        
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
		<?php 
			if(!post_password_required()){
				comments_template();
			}
		?>

    </section> <!-- s-content -->


    <?php get_footer(); ?>