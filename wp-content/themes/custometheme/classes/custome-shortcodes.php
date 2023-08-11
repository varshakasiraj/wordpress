<?php
class CustomeShortCode{
    public function __construct(){
        add_action('wp_enqueue_scripts',array(get_called_class(), 'externalcss'));
        add_shortcode("recentPosts",array(get_called_class(),"recent_posts"));
        add_shortcode("clothesPosts",array(get_called_class(),"clothes_posts"));
    }
    public function externalcss(){
        wp_enqueue_style( 'shortcodes.css', get_stylesheet_directory_uri() . '/assets/css/shortcodes.css', array(), time(), false );
    }
    public function recent_posts(){
        query_posts(array(
            "post_type"=>"post"
        ));
        
    ?>
        <h1>Recent</h1>
        <div class="container">
            <div class="wrapper">
                <?php
                if (have_posts() ) : 
                    while (have_posts() ) : the_post();
                ?>
                     <div class="card">
                        <div class="title">
                            <h2><?php the_title() ?></h2>
                        </div>
                        <div>
                            <h4><?php the_content() ?></h4>
                        </div> 
                     </div> 
                <?php
                endwhile;
                endif;
                ?>
            </div>
        </div>
    <?php
    }
    public function clothes_posts(){
        $args = array(
        'post_type' => 'clothes',
        'post_status' => 'publish',
        'posts_per_page' => -1);
        $clothes = new WP_Query($args);
            
    ?>
        <h1>Clothes</h1>
        <div class="container">
            <div class="wrapper">
        
                <?php
                if ($clothes->have_posts() ) : 
                    while ($clothes->have_posts() ) : $clothes->the_post();
                ?>
                     <div class="card">
                        <div class="title">
                            <h2><?php the_title() ?></h2>
                        </div>
                        <div>
                            <h4><?php the_content() ?></h4>
                        </div> 
                     </div> 
                <?php
                endwhile;
                endif;
                ?>
            </div>
        </div>
    <?php
    }
    public function news_post(){
        var_dump(get_post_meta());
    }
}
$shortcode = new CustomeShortCode();
?>