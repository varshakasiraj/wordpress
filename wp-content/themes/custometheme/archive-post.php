<?php
query_posts(
    array(
        'post_type'=>'news'
    )
    );
if ( have_posts() ) {
	while ( have_posts() )
    {
?>

        <h2><?php the_title() ?></h2>
		<h6><?php the_content() ?></h6>
<?php
    the_post();
    } 
}
else {
    echo '<p>There are no posts!</p>';
}
	
?>