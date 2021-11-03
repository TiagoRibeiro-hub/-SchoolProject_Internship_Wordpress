<?php
/**
* Ver Posts Multimedia
*/
get_header(); ?> 
 
<section id="primary" class="site-content" style="margin-bottom:100px;">
    <div id="content" role="main">
        <?php
            $attrs = shortcode_atts( array(
                'paging'          => 'pg',
                'post_type'       => 'post',
                'category_name'   => 'multimedia',
                'posts_per_page'  => '9',
                'post_status'     => 'publish'
            ), '' );
        
            $paging = $attrs['paging'];
            unset( $attrs['paging'] );
        
            if ( isset( $_GET[ $paging ] ) ) {
                $attrs['paged'] = $_GET[ $paging ];
            } else {
                $attrs['paged'] = 1;
            }// o atributo 'paged' recebe o nr da pagina se nao recebe 1ªpag
            
            $query = new WP_Query( $attrs );

            $pag_link_array = array(
                'type'    => '',
                'base'    => add_query_arg( $paging, '%#%' ),
                'format'  => '?'. $paging .'=%#%',
                'current' => max( 1, $query->get('paged') ),
                'total'   => $query->max_num_pages
            );

            if ( $query->have_posts() ) :  ?>      
         
                <header class="archive-header">
                    <h1 class="archive-title"><?php single_cat_title( '', true ); ?></h1><?php
                // Display optional category description
                    if ( category_description() ) : ?>
                        <div class="archive-meta"><?php echo category_description(); ?></div><?php 
                    endif; ?>
                </header>          
                <div class="container">
                    <div class="row category-posts-content-div"><?php
                        while($query -> have_posts()):
                            $query -> the_post(); ?>         
                        <div class="col-md-4 category-posts-content-items">
                                <h2><?php the_author_posts_link() ?></h2> 
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_excerpt(); ?></p>   
                                <h6 class="categories-h6-link category-pag-link"><a class="category-posts-content-items" href="<?php  echo esc_url(get_permalink()); ?>">Read it... //</a></h6>
                                <h6 class="categories-h6-link category-pag-link">
                                    <?php
                                        comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
                                    ?>
                                </h6>                  
                        </div><?php    
                        endwhile; ?>
                    </div>
                    <div class="category-pag-link-div">
                        <h6 class="category-pag-link"><?php echo paginate_links($pag_link_array); ?></h6>
                    </div>
                </div><?php
            else: ?>
            <p>Sorry, no posts matched your criteria.</p><?php
            endif; ?>
    </div>
</section>
 
<?php get_footer(); ?>