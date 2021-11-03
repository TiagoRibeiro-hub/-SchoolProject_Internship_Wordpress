<?php
include_once('funcs.php');

function multimedia_posts(){
    return random_area_of_work_posts('multimedia');
}

add_shortcode('multimedia-posts', 'multimedia_posts');