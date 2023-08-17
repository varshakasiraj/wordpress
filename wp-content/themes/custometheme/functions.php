<?php

include_once 'classes/custome-shortcodes.php';
include_once 'classes/custome-post_news.php';
include_once 'classes/postapi.php';
add_action( 'wp_enqueue_scripts', 'add_library_js',10);
function add_library_js() {
    wp_enqueue_script( 'jslibrary', get_stylesheet_directory_uri(). '/assets/js/jquery-3.7.0.min.js' );

}  

add_action( 'wp_enqueue_scripts', 'add_custom_js',20);

    function add_custom_js() {
        wp_enqueue_script( 'samplecustomejs', get_stylesheet_directory_uri(). '/assets/js/script.js', array('jQuery'), '1.0', false );

    }
    
?>