<?php

function customeHook(){
    ?>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" href="customeheader.css" type="text/css"/>
      <?php
}
add_action("wp_head","customeHook");
function add_numbers($num1,$num2){
  $result = $num1+$num2;
  return $result;
}
add_filter("add","add_numbers",10,2);
function add_post( $post_id, $meta_key, $meta_value, $unique = false ){
  return add_post_meta( $post_id, $meta_key, $meta_value, $unique = false );
}
add_filter("add_meta_post","add_post",3,4);
function get_meta_post($post_id,$meta_key){
  return get_post_meta($post_id,$meta_key);
}
$meta_key = "hello_post_description";
$get_post = apply_filters('get_meta_post',1,$meta_key);
//var_dump($get_post);
if(empty($get_post)){
	$add_meta_post = apply_filters('add_meta_post',1,'hello_post_description','A meta description in
 WordPress is a short text that describes the content and the purpose of a page.',true);
}
/*foreach ($get_post as $get_meta_post_value){
     echo $get_meta_post_value;
}
add_filter("get_meta_post","get_meta_post",4,2);*/


function wp_custom_post_news() {
	register_post_type('wp_news',
		array(
			'labels'      => array(
				'name'          => 'News',
				'singular_name' =>'News',
        'edit_item' =>'Edit',
        'view_item'=>'View',
			),
				'public'      => true,
				'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
		)
	);
}
add_action('init', 'wp_custom_post_news');

?>