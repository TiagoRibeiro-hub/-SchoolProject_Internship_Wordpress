<?php
include_once('funcs.php');

function random_um_internship(){

    $lastID = last_id();

    $choosenId = um_internships_users($lastID);
    
    $i=1;
    $str = '<div class="elementor-row staff">';
        
    foreach($choosenId as $s){
        um_fetch_user($s);

        $first_name = um_user('first_name');
        $last_name = um_user('last_name');
        $user_email = um_user('user_email');
        $phone_number = um_user('phone_number');

        $job = if_job_empty(um_user('area_of_work'));
        $link = um_user_profile_url();
                
        $str = str_um_internship($str, $link, $first_name, $last_name, $job, $user_email, $phone_number);
        
        if($i % 3 == 0):
            $str .= '</div>';
            return $str;
        endif;
        $i++;
    }
}

add_shortcode('um-internship-random', 'random_um_internship');