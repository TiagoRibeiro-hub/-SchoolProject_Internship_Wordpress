<?php
include_once('funcs.php');

function network_posts(){
    return random_area_of_work_posts('network');
}

add_shortcode('network-posts', 'network_posts');