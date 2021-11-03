<?php
include_once('funcs-api.php');

function register_api_all_posts_get(){
    register_rest_route('api', 'all_posts', array(
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'api_all_posts_get',
        ),
    ));
}

add_action('rest_api_init', 'register_api_all_posts_get');

function api_all_posts_get($response){

    $array = get_db_user_all_posts();
    $response = $array;
    return rest_ensure_response($response);
}