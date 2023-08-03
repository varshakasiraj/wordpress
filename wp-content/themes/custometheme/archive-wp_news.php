<?php
if ( have_posts() ) {
?>
    <h3 style="color:red ;">
            <?php 
                $get_meta_breaking_news_title = get_post_meta(7,"breaking_news");
                foreach ($get_meta_breaking_news_title as $get_meta_post_value){
                    echo $get_meta_post_value;
               }
            ?>
         </h3>
        <h4>
            <?php 
                $get_meta_breaking_news_description = get_post_meta(7,"description");
                foreach ($get_meta_breaking_news_description as $get_meta_post_value){
                    echo $get_meta_post_value;
               }
             ?>
        </h4>
<?php
	while ( have_posts() )
    {
        the_post();
?>

        <h2><?php the_title() ?></h2>
		<h4><?php the_content() ?></h4>
        
<?php
    
    } 
}
else {
    echo '<p>There are no posts!</p>';
}
	
?>