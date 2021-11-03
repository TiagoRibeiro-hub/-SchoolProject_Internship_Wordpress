<?php 

function all_posts() {
	$str='<div class="row" id="all-posts"></div>';
    $str.='<div id="pagination"></div>';
    return $str; 
}
add_shortcode( 'all-posts', 'all_posts');





