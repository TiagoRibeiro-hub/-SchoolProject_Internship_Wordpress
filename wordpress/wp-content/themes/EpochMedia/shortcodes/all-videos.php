<?php
include_once('funcs.php');

function all_videos(){

    $str='<div class="row" id="all-videos"></div>';
    $str.='<div id="pagination"></div>';
    return $str; 
}

add_shortcode('all-videos', 'all_videos');