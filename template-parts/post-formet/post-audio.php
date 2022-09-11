<?php
	$get_field = "";
	if(function_exists("the_field")){
		$get_field = get_field("audio");
	}
?>

<article class="masonry__brick entry format-audio" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="single-audio.html" class="entry__thumb-link">
                            <?php the_post_thumbnail("philosophydev_home_squere") ?>
                        </a>
                        <div class="audio-wrap">
                            <audio id="player" src="<?php echo wp_kses_post($get_field) ?>" width="100%" height="42" controls="controls"></audio>
                        </div>
                    </div>

                    <?php get_template_part("template-parts/post-formet/common-post"); ?>

                </article> <!-- end article -->
