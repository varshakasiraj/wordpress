<style>
body{
    background-color: #F0F0F0;
}
.container{
	max-width:900px;
	height:100%;
	margin:0 auto;
}
.container .wrapper{
	
	display:flex;
	flex-wrap: wrap;
}
.container .wrapper .card{
	background-color:#ffff;
	width:230px;
	height:400px;
	border-radius:5px;
    padding:5px 15px 10px;
	margin-bottom:40px;
}
.container .wrapper .singleview{
    margin: 5px 0;
    width:90px;
	height:30px;
    background-color:#EFC4C3;
}
.container .wrapper .card .title{
    margin: 40px 10px;
    text-align:center;
	width:200px;
	height:60px;
    color: #E7346E;
}
.card:nth-child(even){
	margin-left:10px;
	margin-right:10px;
}
</style>
<?php
get_header();
?>
<body>
<marquee style="color:red ;"><h1>Breaking News</h1></marquee>

<?php
get_header();
if ( have_posts() ) {
?>
    <div class="container">
    <div class="wrapper">
<?php
   $meta_key ="breaking_news";
   $request= $wpdb->prepare("SELECT * FROM `wp_postmeta` WHERE `meta_key` ='" .$meta_key ."'");
   $result = $wpdb->get_results( $request); 
   //var_dump($result["0"]["post_id"]);
   if(get_post_meta(7))
   {
?>
        
                    <div class="card">
                        <div class="singleview">
                            <a href="single-wp_news.php">Single View</a>
                        </div>
                        <div class="title">
                            <h3>
                                <?php 
                                    $get_meta_breaking_news_title = get_post_meta(7,"breaking_news");
                                    foreach ($get_meta_breaking_news_title as $get_meta_post_value){
                                        echo $get_meta_post_value;
                                }
                                ?>
                            </h3>
                        </div>
                        <div>
                            <?php 
                                /*$get_meta_breaking_news_description = get_post_meta(7,"thumb_nail");
                                var_dump( get_post_meta(7,"thumb_nail"));
                                foreach ($get_meta_breaking_news_description as $get_meta_post_value)
                                {

                            ?>
                                       <img src="<?php $get_meta_post_value ?>"/>
                            <?php
                            }*/
                            $image = get_field('thumb_nail');
                            echo $image;
                            var_dump($image);
                            echo wp_get_attachment_image(get_field('thumb_nail'))
                            ?>
                                <img src="<?php echo $image ?>" />
                                <?php
                                
                                ?>
                        <h4 style="color:rgb(65,76,91);">
                            <?php 
                                $get_meta_breaking_news_description = get_post_meta(7,"description");
                                
                                foreach ($get_meta_breaking_news_description as $get_meta_post_value){
                                    echo $get_meta_post_value;
                            }
                            ?>
                        </h4>
                    </div>
           
                <?php
                
                ?>
          
<?php
    }
?>
    </div>
    </div>
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
</body>