<?php get_header(); ?>
    <?php while(have_posts()): the_post(); ?>
        <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed content" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row div-center">
                    <div class="elementor-column elementor-col-30 elementor-top-column elementor-element" data-element_type="column">
                        <div class="elementor-column-wrap">
                            <div class="elementor-widget-wrap text-center">
                                <?php echo the_post_thumbnail('large', array('class'=>'img-fluid')); ?>
                                <h1><?php echo get_the_title();?></h1> 
                                <h2 class="job-h2"><?php echo do_shortcode('[acf field="job"]');?></h2>
                                <h4><?php echo do_shortcode('[acf field="email_address"]');?></h4>
                                <?php
                                    $phone_number = get_field("phone_number");
                                    if ($phone_number != ''):
                                        echo '<h4>'.$phone_number.'</h4>';
                                    endif;
                                ?>                       
                            </div>
                        </div> 
                    </div>
                    <div class="elementor-column elementor-col-70 elementor-top-column elementor-element content" data-element_type="column">
                        <div class="elementor-column-wrap">
                            <div class="elementor-widget-wrap">
                                <h2 class="text-center title-field">About Me</h2>
                                <div class="text-center text-color"><?php echo do_shortcode('[acf field="about_me"]');?></div>
                                <h2 class="text-center title-field">Areas of Interest</h2>
                                <div class="text-center text-color"><?php echo do_shortcode('[acf field="areas_of_interest"]');?></div>
                                <a class="text-center"><h1>Portfolio</h1></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php get_footer(); ?>