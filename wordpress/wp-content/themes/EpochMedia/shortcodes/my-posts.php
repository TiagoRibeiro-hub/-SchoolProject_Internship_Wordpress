<?php
include_once('funcs.php');


function my_posts(){

    $str='<div class="row" id="my-posts"></div>';
    $str.='<div id="pagination"></div>';
    return $str; 
}

add_shortcode('my-posts','my_posts');

