<?php
get_header();


$meta_key = "hello_post_description";

if(empty($get_post)){
	$add_meta_post = apply_filters('add_meta_post',1,'hello_post_description','A meta description in
 WordPress is a short text that describes the content and the purpose of a page.',true);
}
foreach ($get_post as $get_meta_post_value){
     echo $get_meta_post_value;
}
$add_numbers = apply_filters('add',"10","20");
echo"Add 10 + 20 :" . $add_numbers;
get_footer();
?>