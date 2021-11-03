<?php
//
// UM-INTERNSHIPS-{MEMBERS}
//
function arrayToString($array, $index){
    foreach($array as $k => $v){
        $array[$k] = (array)$v;
    }
            
    foreach($array as $v){
        $ID = $v[$index];
    }
    return $ID;
}

function last_id(){
    global $wpdb;
    $res =  $wpdb ->get_results("SELECT ID FROM wp_users ORDER BY ID DESC LIMIT 1") ;
    return $lastID = arrayToString($res, 'ID');
}

function um_internships_users($lastID){

    $internshipIDs = array();

    for ($j = 1; $j <= $lastID ; $j++ ) {    
        um_fetch_user( $j );
        if(um_user('um_internships') == 'Internships'){    
            // Coloca os IDs dos Interships no novo array
            array_push($internshipIDs, $j);     
        }
    }
    um_reset_user();

    // baralhar array
    shuffle($internshipIDs);
    // escolher os 3 primeiros valores
    return $choosenId = array_slice($internshipIDs, 0, 3);
}

function if_job_empty($area_Of_Work){
    if(is_array(um_user('area_of_work'))){
        $job = arrayToString(um_user('area_of_work'), 0);
    }else{
        $job = '';
    }
    return $job;
}

function str_um_internship($str, $link, $first_name, $last_name, $job, $user_email, $phone_number){
    return $str .='
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
                    <div class="elementor-column-wrap">
                        <div class="elementor-widget-wrap">
                            <div class="image-wrapper">
                                <a href="'.$link.'"><img src="'.um_get_avatar(um_profile('profile_photo'), 32).'</a>
                            </div>        
                            <div class="team-member-info">
                                <h2><a href="'.$link.'">'.$first_name.' '.$last_name.'</a></h2>
                                <h3>'.$job.'</h3>
                                <a class="acf-team" href="mailto:'.$user_email.'">'. $user_email .'</a><br>
                                <a class="acf-team" href="tel:'.$phone_number.'">'.$phone_number.'</a>               
                            </div>
                        </div>
                    </div>
                </div>
            ';
}

function str_um_internship_area_of_work($str, $link, $first_name, $last_name, $user_email, $phone_number){
    return $str .='
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
                    <div class="elementor-column-wrap">
                        <div class="elementor-widget-wrap">
                            <div class="team-member-info">
                                <a class="image-wrapper" href="'.$link.'"><img src="'.um_get_avatar(um_profile('profile_photo'), 32).'</a>
                                <h2><a href="'.$link.'">'.$first_name.' '.$last_name.'</a></h2>
                                <a class="acf-team-jobs" href="mailto:'.$user_email.'">'. $user_email .'</a><br>
                                <a class="acf-team-jobs" href="tel:'.$phone_number.'">'.$phone_number.'</a>               
                            </div>
                        </div>
                    </div>
                </div>
            '; 
}

function end_str($i, $str){

    if($i % 3 == 0):
        $str .= '</div>';
        $str .= '<div class="elementor-row staff">';
    endif;
    return $str;
}

//
// {AREA OF WORK}-POSTS
//
function random_area_of_work_posts($area){
    $query = new WP_Query(
        array(
            'post_type' => 'post',
            'category_name' => $area,
            'post_status' => 'publish',
            'post_per_page' => -1,
            'orderby' => 'rand',
        )
    );
    $i=1;
    $str = '<div class="elementor-row staff random">';

    if ( $query->have_posts() ) :
        while($query -> have_posts()):
            $query -> the_post();
            $link = get_permalink();
            $linkUser = get_author_posts_url(get_the_author_meta( 'ID' ));
            $str .='
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
                    <div class="elementor-column-wrap">
                        <div class="elementor-widget-wrap">         
                            <div class="team-member-info">
                                <h2><a href="'.$linkUser.'">'.get_the_author().'</a></h2> 
                                <h4>'.get_the_title().'</h4>
                                <p>'.get_the_excerpt().'</p>
                                <h6><a href="'.$link.'">Read it</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            if($i % 3 == 0):
                $str .= '</div>';
                break;
            endif;
            $i++;
        endwhile;
        wp_reset_postdata();
    endif;

    return $str;
}

//
// ALL-VIDEOS
//
function get_db_user_submit_url_video1() {
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

//
// MY-POSTS
//
function get_db_user_submit_name1() {
    global $wpdb;
 
    $k = $wpdb->get_results(
        "
        SELECT `wp_users`.display_name, `wp_users`.user_login, `wp_users`.user_nicename, `wp_posts`.`post_author`, `wp_posts`.post_title, `wp_posts`.post_content, `wp_postmeta`.meta_value 
        FROM `wp_posts` INNER JOIN `wp_postmeta` ON `wp_posts`.ID = `wp_postmeta`.post_id 
                        INNER JOIN `wp_users` ON `wp_users`.ID = `wp_posts`.`post_author` 
        WHERE `wp_postmeta`.`meta_key`= 'user_submit_name';
        "
    );
    return $k;
}
