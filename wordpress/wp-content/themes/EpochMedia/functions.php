<?php

//Menu
function register_nav(){
    register_nav_menus(
        array(
            'header' => 'Header'
        )
    );

    register_nav_menus(
        array(
            'footer' => 'Footer'
        )
    );

    register_nav_menus(
        array(
            '404' => '404'
        )
    );
}

// Stylesheets & JS
function load_stylesheets(){
    wp_register_style('fontawesome', get_template_directory_uri().'/fontawesome/css/all.css', array(), false, 'all');
    wp_enqueue_style('fontawesome');

    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('stylesheets', get_template_directory_uri().'/css/my-css.css', array(), false, 'all');
    wp_enqueue_style('stylesheets');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_jquery(){
    
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-3.1.3.min.js', '', 1, true);
}
add_action('wp_enqueue_scripts', 'load_jquery');

function load_js(){

    wp_register_script('bootstrap_Js', get_template_directory_uri().'/js/bootstrap.bundle.min.js', '', 1, true);
    wp_enqueue_script('bootstrap_Js');

    wp_register_script('scripts-my-posts_Js', get_template_directory_uri().'/js/scripts-my-posts.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts-my-posts_Js');

	wp_register_script('funcs_Js', get_template_directory_uri().'/js/funcs-js.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('funcs_Js');

	wp_register_script('scripts-all-videos_Js', get_template_directory_uri().'/js/scripts-all-videos.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts-all-videos_Js');

	wp_register_script('scripts-all-posts_Js', get_template_directory_uri().'/js/scripts-all-posts.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts-all-posts_Js');

}
add_action('wp_enqueue_scripts', 'load_js');


// Theme Options 
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');


// Size Images
@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '400' );

add_image_size('_smallest', 475, 475, array('center', 'center'));
add_image_size('_largest', 800, 800, array('center', 'center'));

// Register Sidebars
function my_sidebars(){
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title>',
            'after_title' => '</h4',

        )
    );
}
add_action('widgets_init', 'my_sidebars');

// ENDPOINTS
require_once('endpoint/my-posts_get.php');
require_once('endpoint/all-posts_get.php');
require_once('endpoint/all-videos_get.php');

// POSTS
require_once('shortcodes/my-posts.php');
require_once('shortcodes/all-posts.php');
require_once('shortcodes/software-developer-posts.php');
require_once('shortcodes/network-posts.php');
require_once('shortcodes/multimedia-posts.php');

// VIDEOS
require_once('shortcodes/all-videos.php');

// UM-INTERNSHIP
require_once('shortcodes/um-internship-software.php');
require_once('shortcodes/um-internship-multimedia.php');
require_once('shortcodes/um-internship-network.php');
require_once('shortcodes/um-internship-random.php');
require_once('shortcodes/um-internship.php');

// SEARCH
require_once('shortcodes/sc_search.php');

// ACTION FIELD TEAM
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_6114ef9ba0b1f',
		'title' => 'Team',
		'fields' => array(
			array(
				'key' => 'field_6115247ccba99',
				'label' => 'Job',
				'name' => 'job',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6114efb7bee8d',
				'label' => 'Email Address',
				'name' => 'email_address',
				'type' => 'email',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_6114efeabee8e',
				'label' => 'Phone Number',
				'name' => 'phone_number',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6115007b5650a',
				'label' => 'About Me',
				'name' => 'about_me',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			),
			array(
				'key' => 'field_6114f00abee8f',
				'label' => 'Areas of Interest',
				'name' => 'areas_of_interest',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
endif;

require_once('shortcodes/team.php');
require_once('shortcodes/random-team-member.php');

/**
 * This example shows how to add several tabs with custom shortcodes into the Profile page of the Ultimate Member.
 * You can add custom code to the end of the file functions.php in the active theme directory.
 * Important! Each tab must have a unique key.
 * 
 * Ultimate Member documentation: https://docs.ultimatemember.com/
 * Ultimate Member support (for customers): https://ultimatemember.com/support/ticket/
 * 
 * ICONS -> https://gist.github.com/plusplugins/b504b6851cb3a8a6166585073f3110dd
 */
 

/**
 * Add new profile tabs
 * @param  array $tabs
 * @return array
 */
function um_mycustomtab_add_tab( $tabs ) {

	/* My posts */

	$tabs['my_post'] = array(
		'name'            => 'My posts',
		'icon'            => 'um-faicon-pencil',
		'custom'          => true
	);

	if ( !isset( UM()->options()->options['profile_tab_' . 'my_post'] ) ) {
		UM()->options()->update( 'profile_tab_' . 'my_post', true );
	}

	/* Create a post */

	$tabs['create_a_post'] = array(
		'name'            => 'Create a Post',
		'icon'            => 'um-faicon-pencil',
		'custom'          => true
	);

	if ( !isset( UM()->options()->options['profile_tab_' . 'create_a_post'] ) ) {
		UM()->options()->update( 'profile_tab_' . 'create_a_post', true );
	}

	/* Read All Post */

	$tabs['read_all_post'] = array(
		'name'            => 'Read All Post',
		'icon'            => 'um-icon-android-folder-open',
		'custom'          => true
	);

	if ( !isset( UM()->options()->options['profile_tab_' . 'read_all_post'] ) ) {
		UM()->options()->update( 'profile_tab_' . 'read_all_post', true );
	}

	/* Video */

	$tabs['video'] = array(
		'name'            => 'Video',
		'icon'            => 'um-icon-ios-videocam',
		'custom'          => true
	);

	if ( !isset( UM()->options()->options['profile_tab_' . 'video'] ) ) {
		UM()->options()->update( 'profile_tab_' . 'video', true );
	}

	return $tabs;
}
add_filter( 'um_profile_tabs', 'um_mycustomtab_add_tab', 1000 );

/**
 * Render the tab 'My post'
 * @param array $args
 */
function um_profile_content_my_post( $args ) {
	echo do_shortcode('[my-posts]');
}
add_action( 'um_profile_content_my_post', 'um_profile_content_my_post' );

/**
 * Render the tab 'Create a post'
 * @param array $args
 */
function um_profile_content_create_a_post( $args ) {
	if (function_exists('user_submitted_posts')) user_submitted_posts();
}
add_action( 'um_profile_content_create_a_post', 'um_profile_content_create_a_post' );

/**
 * Render the tab 'Read All Post'
 * @param array $args
 */
function um_profile_content_read_all_post( $args ) {
	echo do_shortcode('[all-posts]');
}
add_action( 'um_profile_content_read_all_post', 'um_profile_content_read_all_post' );

/**
 * Render the tab 'Video'
 * @param array $args
 */
function um_profile_content_video( $args ) {
	echo do_shortcode('[all-videos]');
}
add_action( 'um_profile_content_video', 'um_profile_content_video' );


// TOTAL USERS
function wpb_user_count() { 
	$usercount = count_users();
	$result = $usercount['total_users']; 
	return $result; 
} 

add_shortcode('user_count', 'wpb_user_count');

// REPLACE CLASS CONTENT SINGLE.PHP
function replace_class_content( $text_content ) {
    if ( is_single() ) {
        $text = array(
            '<p>' => '<p class="the-content-single-post">',
        );
 
        $text_content = str_ireplace( array_keys( $text ), $text, $text_content );
    }
 
    return $text_content;
}
add_filter( 'the_content', 'replace_class_content' );

