<div class="entry__text">
                        <div class="entry__header">
                            
                            <div class="entry__date">
                                <a href="single-video.html"><?php echo get_the_date("M d , Y") ?></a>
                            </div>
                            <h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                            
                                <?php echo wp_trim_words( get_the_content(), 30, ' ' ); ?>
                            
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="category.html"><?php echo get_the_tag_list(" "); ?></a>
                            </span>
                        </div>
                    </div>