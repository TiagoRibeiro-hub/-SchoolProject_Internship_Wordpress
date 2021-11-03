<?php
/*
* Search Result
*/
?>
<?php get_header(); 
global $wp_query; 
?>

<div id="primary" class="content-area-single-post">
    <main id="main" class="single-post-main" role="main">
        <header class="search-card">
			<h1 class="page-title"> <?php echo $wp_query->found_posts; ?>
				<?php _e( 'Search Results Found For'); ?>: "<?php the_search_query(); ?>"
			</h1>
		</header>
        <?php
        if(have_posts()): ?>
            <div class="row"><?php
                while ( have_posts() ) : 
                    the_post(); ?>
                        <div class="col-md-6">
                            <div class="card search-card">
                                <div class="card-search-title-div">
                                    <h3>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            << <?php the_title(); ?> >>
                                        </a>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php the_excerpt(); ?>       
                                </div>          
                            </div>
                        </div><?php
                endwhile; ?>
            </div>
            <div class="search-paginate-links">
                <p>
                    <?php echo paginate_links(); ?>
                </p>
            </div><?php
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
