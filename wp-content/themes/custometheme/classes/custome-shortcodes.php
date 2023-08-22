<?php
class CustomeShortCode{
    public function __construct(){
        add_action('wp_enqueue_scripts',array(get_called_class(), 'externalcss'));
        add_shortcode("recentPosts",array(get_called_class(),"recent_posts"));
        add_shortcode("clothesPosts",array(get_called_class(),"clothes_posts"));
        add_shortcode("newsPosts",array(get_called_class(),"news_post"));
    }
    public static function externalcss(){
        wp_enqueue_style( 'shortcodes.css', get_stylesheet_directory_uri() . '/assets/css/shortcodes.css', array(), time(), false );
    }
    public static function recent_posts(){
        query_posts(array(
            "post_type"=>"post"
        ));
        
    ?>
        <div class="heading">
            <h1>Recent Posts</h1>
            <p> We discuss interesting things that happen all the time.</p>
        </div>
        <div class="container">
            <div class="wrapper">
                <?php
                if (have_posts() ) : 
                    while (have_posts() ) : the_post();
                ?>
                     <div class="card">
                        <div class="img">
                        <img src="<?php echo get_the_post_thumbnail_url('','large')?>" width="446px" height="327px"/>
                        </div>
                        <div class="tags">
                            <div class="trends">
                                <h4>//Trends</h4>
                            </div >
                            <div class="date">
                                <h4><?php echo get_the_date() ?></h4>
                            </div>
                        </div>
                        <div class="title">
                            <h5><?php the_title() ?></h5>
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
    public static function clothes_posts(){
        $args = array(
        'post_type' => 'clothes',
        'post_status' => 'publish',
        'posts_per_page' => -1);
        $clothes = new WP_Query($args);
            
    ?>
        <div class="container">
            <div class="wrapper">
                <?php
                if ($clothes->have_posts() ) : 
                    while ($clothes->have_posts() ) : $clothes->the_post();
                ?>
                     <div class="card-clothes"> 
                        <div>
                            <h4><img src="<?php echo get_the_post_thumbnail_url('','large')?>" width="915px" height="686px"/> </h4>
                        </div>
                        <div class="title">
                            <h2><?php the_title() ?></h2>
                        </div> 
                        <div class="cloths-tags">
                            <div class="avatar">
                                <img src="http://localhost/wordpress/wp-content/uploads/2023/08/s1-1.jpg">
                            </div>
                            <div class="bywho">
                                <h4>By Mela Hunter</h4>
                            </div>
                            <div class="tag">
                                <h4><a href="#">//Lifestyle</a></h4>
                            </div>
                            <div class="date">
                                <h4><?php echo get_the_date() ?></h4>
                            </div>
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
    public static function news_post(){
        $args = array(
            'post_type' => 'wp_news',
            'post_status' => 'publish',
            'posts_per_page' => 1);
            $news = new WP_Query($args);
    
    ?>
     <div class="heading">
            <h2>Latest Breaking News Posts</h2>
            <p> Let us share some wonderful news with the readers..</p>
    </div>
    <div class="container">
            <div class="wrapper">
                <?php
                if ($news->have_posts() ) : 
                    while ($news->have_posts() ) : $news->the_post();
                ?>
                     <div class="bigcard">
                        <div class="bigimg">
                            <p><?php the_content() ?></p>
                        </div>
                        <div class="title">
                            <h2><?php the_title() ?></h2>
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
}
$shortcode = new CustomeShortCode();
?>