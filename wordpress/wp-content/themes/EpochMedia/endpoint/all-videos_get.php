<?php
include_once('funcs-api.php');

function register_api_all_videos_get(){
    register_rest_route('api', 'all_videos', array(
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'api_all_videos_get',
        ),
    ));
}

add_action('rest_api_init', 'register_api_all_videos_get');

function api_all_videos_get($response){

    $array = get_db_user_submit_url_video();
    $response = $array;
    return rest_ensure_response($response);
}