<?php

// my videos
// $profile_id = um_profile_id();
// $array = get_db_user_submit_name($profile_id);

// $str='<div class="row">';

// foreach($array as $v){

//     $post_author = $v->post_author;
    
//     if($profile_id == $post_author) :
//         $display_name = $v->display_name;
//         $post_title = $v->post_title;
//         $post_content = $v->post_content;
//         $user_login = $v->user_login;
        
//         $profile_url = 'http://localhost/wordpress/user/'.$user_login;
//         $post_url = 'http://localhost/wordpress/lorem-ipsum-v-02/'.$post_title;

//         $lenght = strlen($post_content)/2;
//         $post_content = substr($post_content, 0, $lenght);

//         $str.='
//             <div class="col-md-4 all-video-div"> 
//                 <div class="author-name">
//                     <h2 class="text-center"><a href="'.$profile_url.'" target="_blank">'.$display_name.'</a></h3> 
//                 </div>
//                 <div class="all-video-content">
//                     <h5 class="text-center my-post-title">'.$post_title.'</h5>
//                     <p>'.$post_content.'[...]</p>
//                 </div>
//                 <div>
//                     <h6 class="post-title-video"><a class="post-title-video-a" href="'.$post_url.'" target="_blank">Read it</a></h6> 
//                 </div>
//             </div>
//         ';
//     endif;
// }                       
// $str.='</div>';

// return $str;


//all videos

// $array = get_db_user_submit_url_video();

// foreach($array as $k => $x){
//     $array[$k] = (array)$x;
// }

// $str='<div class="row">';

// foreach($array as $v){
//     $display_name = $v['display_name'];
//     $post_title = $v['post_title'];
//     $video_url = $v['meta_value'];
//     $post_content = $v['post_content'];
//     $user_login = $v['user_login'];
//     $profile_url = 'http://localhost/wordpress/user/'.$user_login;

//     $str.='
//         <div class="col-md-4 all-video-div"> 
//             <div class="author-name">
//                 <h2 class="text-center"><a href="'.$profile_url.'" target="_blank">'.$display_name.'</a></h3> 
//             </div>
//             <div class="all-video-content">
//                 <h3 class="text-center post-title-video"><a class="post-title-video-a" href="'.$video_url.'" target="_blank">'.$post_title.'</a></h3> 
//                 <h6 class="post-description-video">Description:</h6>
//                 <p>'.$post_content.'</p>
//             </div>
//         </div>
//     ';
// }                       
// $str.='</div>';

// return $str;

// all posts

// static $all_posts; // static page
    
// if ( ! isset ( $all_posts ) ) {
//     $all_posts = 1;
// } else {
//     $all_posts ++;
// } // se all_posts estiver vazio recebe 1 se nao ++

// $attrs = shortcode_atts( array(
//     'paging'         => 'pg'. $all_posts,
//     'post_type'      => 'post',
//     'posts_per_page' => '4',
//     'post_status'    => 'publish'
// ), $attrs );

// $paging = $attrs['paging'];
// unset( $attrs['paging'] );

// if ( isset( $_GET[ $paging ] ) ) {
//     $attrs['paged'] = $_GET[ $paging ];
// } else {
//     $attrs['paged'] = 1;
// }// o atributo 'paged' recebe o nr da pagina se nao recebe 1ªpag

// $str  = '<div class="row d-flex justify-content-center align-items-center">';
// $query = new WP_Query( $attrs );
// $pagination_base = add_query_arg( $paging, '%#%' );

// if ( $query->have_posts() ) :
//     while( $query->have_posts()) : 
//         $query->the_post();
//         $link = get_permalink();
//         $linkUser = get_author_posts_url(get_the_author_meta( 'ID' ));
//         $flag = true; 

//         if (function_exists('usp_get_images')) $images = usp_get_images();
//         if(count($images) > 0):
//             foreach ($images as $image){
//                 $images = $image;
//             }// so vai buscar a primeira
//         else: $images = '';
//         endif;

//         $str .='       
//                 <div class="col-md-6 read-all-posts-content">
//                     <div class="author-name">
//                         <h2 class="text-center"><a href="'.$linkUser.'">'.get_the_author().'</a></h2> 
//                     </div>
//                     <div class="post-content">
//                         <h4 class="text-center">'.get_the_title().'</h4>
//                         <p>'.get_the_excerpt().'</p>
//                     </div>
//                     <div class="read-it-link">
//                         <h6><a href="'.$link.'">Read it</a></h6>
//                     </div>
//                     <div class="img-post">
//                         '.$images.'
//                     </div>
//                 </div> 
//             ';
//     endwhile;
//     $str .='</div>';
//     $str .= paginate_links( array(
//         'type'    => '',
//         'base'    => $pagination_base,
//         'format'  => '?'. $paging .'=%#%',
//         'current' => max( 1, $query->get('paged') ),
//         'total'   => $query->max_num_pages
//     ));
// endif;
// return $str;