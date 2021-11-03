<?php
include_once('funcs.php');

function software_developer_posts(){
    return random_area_of_work_posts('software-developer');
}

add_shortcode('software-developer-posts', 'software_developer_posts');