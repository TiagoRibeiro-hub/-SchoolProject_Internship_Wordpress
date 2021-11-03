<?php

function search_form( $form ) { 
    $form = '
        <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
            <div class="search-div">
                <label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
                <input class="search-input-text" type="text" value="' . get_search_query() . '" name="s" id="s" />
                <input class="search-input-btn" type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
            </div>
        </form>';
    return $form;
}
 
add_shortcode('sc_search', 'search_form');