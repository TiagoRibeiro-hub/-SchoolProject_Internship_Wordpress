<?php
include_once('funcs.php');

function um_internship(){

    $lastID = last_id();
    
    $i=1;
    $str = '<div class="elementor-row staff">';
      
        for ($j = 1; $j <= $lastID ; $j++ ) {        
            um_fetch_user( $j );
        
            if(um_user('um_internships') == 'Internships'){
                    
                $first_name = um_user('first_name');
                $last_name = um_user('last_name');
                $user_email = um_user('user_email');
                $phone_number = um_user('phone_number');            
                
                $job = if_job_empty(um_user('area_of_work'));
                $link = um_user_profile_url();
                
                $str = str_um_internship($str, $link, $first_name, $last_name, $job, $user_email, $phone_number);
                
                // put 3 in a row
                $str = end_str($i, $str);
                $i++; 
            }
        }
    um_reset_user();
    return $str;
}

add_shortcode('um-internship', 'um_internship');
