<?php
class customeAddLibrarys{
    public static function add_library_action(){
        add_action( 'wp_enqueue_scripts',array(get_called_class(),'add_library_js'));
        add_action('wp_enqueue_scripts',array(get_called_class(), 'externalcss'));
    }
    public static function add_library_js() {
        wp_enqueue_script( 'jslibrary', get_stylesheet_directory_uri(). '/assets/js/jquery-3.7.0.min.js' );
        wp_enqueue_script( 'samplecustomejs', get_stylesheet_directory_uri(). '/assets/js/scripts.js', array(), '1.0', false );
    }  
    public static function externalcss(){
        wp_enqueue_style( 'admintablecss', get_stylesheet_directory_uri() . '/assets/css/admintable.css', array(), time(), false );
    }
}
customeAddLibrarys::add_library_action();
?>