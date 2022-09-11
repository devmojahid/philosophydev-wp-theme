<div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
					<?php
						comments_popup_link( '0 comment', '1 comment', '% comments');
					?>
					</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        <?php wp_list_comments(); ?>

                    </ol> <!-- end commentlist -->
					
					<?php 
						the_comments_pagination(array(
							'screen_reader_text'=>__("pagination",'philosofydev'),
							'prev_text'	=>'<'.__('previous_comments',"philosofydev"),
							'next_text'	=>'>'.__('next_comments',"philosofydev"),
						));
					?>


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2"><?php _e("Add Comment","philosofydev"); ?></h3>

                        <?php comment_form() ?> <!-- end form -->

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->