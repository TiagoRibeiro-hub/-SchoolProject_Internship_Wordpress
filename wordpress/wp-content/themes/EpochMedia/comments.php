<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area"> 
    <div class="row">
        <div class="col-md-6 comment-form-side">
            <?php comment_form(); ?>
        </div>
        <div class="col-md-6 comments-list-side">
            <?php if ( have_comments() ) : ?>
                <h2 class="comments-title">
                    <?php
                        printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title'),
                            number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
                    ?>
                </h2>
        
                <ol class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'       => 'ol',
                            'short_ping'  => true,
                            'avatar_size' => 74,
                        ) );
                    ?>
                </ol>
        
                <?php
                    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                        <nav class="navigation comment-navigation" role="navigation">
                            <h1 class="screen-reader-text section-heading">
                                <?php _e( 'Comment navigation'); ?>
                            </h1>
                            <div class="nav-previous">
                                <?php previous_comments_link( __( '&larr; Older Comments') ); ?>
                            </div>
                            <div class="nav-next">
                                <?php next_comments_link( __( 'Newer Comments &rarr;') ); ?>
                            </div>
                        </nav><?php
                    endif;?><?php
        
                    if ( ! comments_open() && get_comments_number() ) : ?>
                        <p class="no-comments">
                            <?php _e( 'Comments are closed.'); ?>
                        </p><?php
                    endif; ?>
            <?php endif; ?>
        </div> 
    </div>
</div>