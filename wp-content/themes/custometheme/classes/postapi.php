<?php
class CustomeApi{
    public static function  register_api(){
        add_action('rest_api_init',array(get_called_class(),'register_api_routes'));
    }
    public static function register_api_routes(){
        register_rest_route( 'sb_clothes/v1' , '/clothes/', array(
            'methods' => 'GET',
            'callback' => array(get_called_class(),'clothes_posts'),
        ));
    }
    public static function clothes_posts(){
            $args = array(
                'post_type' => 'clothes',
                'post_status' => 'publish',
                'posts_per_page' => -1);
            $clothes = get_posts($args);
            foreach ($clothes as $row) {
                $dress[] = array(
                   "post_id" => $row->ID,
                   "post_title"=>$row->post_title,
                   "post_content" =>$row->post_content,
                   "post_date"=>$row->post_date,
                   "post_status"=>$row->post_status,
                );
            }
        return  json_encode($dress);
    }
}
CustomeApi::register_api();
?>
