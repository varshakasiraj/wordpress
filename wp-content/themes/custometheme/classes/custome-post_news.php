<?php
class CustomePostNews{
    public function __construct(){
        add_action('init', array(get_called_class(),'wp_custom_post_news'));
    }
    public function wp_custom_post_news() {
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
}
$CustomePostNews = new CustomePostNews();
?>