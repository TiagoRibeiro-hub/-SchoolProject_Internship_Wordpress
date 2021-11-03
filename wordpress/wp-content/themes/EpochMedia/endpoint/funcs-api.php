<?php
//
// ALL-POSTS
//
// SELECT * 
// FROM (SELECT `wp_users`.display_name, `wp_users`.user_login, `wp_posts`.post_content, `wp_posts`.post_title
//       		FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
//       						INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author` 
//       		WHERE `wp_postmeta`.`meta_key`= 'user_submit_name') AS A 
// INNER JOIN 
// 	(SELECT DISTINCT `wp_posts`.post_title, `wp_postmeta`.`meta_value` 
//      		FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
//      						INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author` 
//      		WHERE `wp_postmeta`.`meta_key`='user_submit_image' AND `wp_users`.display_name != '' 
//      		GROUP BY `wp_posts`.post_title) AS B
// ON `A`.`post_title` = `B`.`post_title`
// GROUP BY `A`.`post_title` ASC
function get_db_user_all_posts(){
    global $wpdb;
 
    $k = $wpdb->get_results(
        "
            SELECT `wp_posts`.post_title , `wp_postmeta`.`meta_value`, `wp_users`.display_name, `wp_users`.user_login, `wp_posts`.post_content 
            FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
                            INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author` 
            WHERE `wp_postmeta`.`meta_key`= 'user_submit_name' 
        UNION DISTINCT 
            SELECT DISTINCT `wp_posts`.post_title , `wp_postmeta`.`meta_value`, `wp_users`.display_name, `wp_users`.user_login, `wp_posts`.post_content 
            FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
                            INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author` 
            WHERE `wp_postmeta`.`meta_key`='user_submit_image' AND `wp_users`.display_name != '' 
            GROUP BY `wp_posts`.post_title;
            "
    );
    return $k;
}
//
// MY-POSTS
//
function get_db_user_submit_name() {
    global $wpdb;
 
    $k = $wpdb->get_results(
        "
        SELECT `wp_users`.display_name, `wp_users`.user_login, `wp_users`.user_nicename, `wp_posts`.`post_author`, `wp_posts`.post_title, `wp_posts`.post_content 
        FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
                        INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author` 
        WHERE `wp_postmeta`.`meta_key`= 'user_submit_name';
        "
    );
    return $k;
}

//
// ALL Videos
//
function get_db_user_submit_url_video() {
    global $wpdb;
 
    $k = $wpdb->get_results(
        "
        SELECT `wp_users`.display_name, `wp_users`.user_login, `wp_posts`.post_title, `wp_posts`.post_content, `wp_postmeta`.meta_value
        FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
        				INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author`
        WHERE `wp_postmeta`.`meta_key`= 'user_submit_url'
        "
    );
    return $k;
}