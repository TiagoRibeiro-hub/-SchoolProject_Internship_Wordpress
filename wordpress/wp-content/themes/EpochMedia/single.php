<?php get_header();  ?>

<div id="primary" class="content-area-single-post">
    <main id="main" class="single-post-main" role="main">
        <?php
        if(have_posts()):
            while ( have_posts() ) : the_post();
                
        	    $linkUser = get_author_posts_url(get_the_author_meta( 'ID' ));

                ?>
                    <div class="single-post-div">
                        <h1 class="post-title-single-post"><?php the_title();?></a></h1>
                    </div>
                        <small class="date-by-single-post"><?php the_time('F jS, Y') ?> by</small>
                    <div class="content-single-post">
                        <?php the_content(); ?>                 
                    </div>
                    <div class="single-post-div">
                        <a class="author-profile-single-post" href="<?php echo esc_url($linkUser); ?>">Go to Author Profile</a>
                    </div>
                <?php
                if(comments_open()):
                    comments_template();
                endif;
            endwhile; 
            ?>
                <div class="next-prev-single-post">
                    <div class="prev-single-post">
                        <?php previous_post_link(); ?>
                    </div>
                    <div class="next-single-post">
                        <?php next_post_link(); ?>
                    </div>
                </div>
            <?php
        endif; ?>
    </main>
</div>

<?php get_footer();  ?>
