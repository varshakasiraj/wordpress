<style>
body{
    background-color: #CACAC8;
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
	background-color:#FFFFFF;
	width:230px;
	height:450px;
	border-radius:15px;
    padding:5px 15px 10px;
	margin-bottom:40px;
}
.container .wrapper .singleview{
    margin: 5px 0;
    width:90px;
	height:30px;
    background-color:#EFC4C3;
    
}
.container .wrapper .singleview a{
    text-decoration: none;
    padding: 5px;
}
.container .wrapper .card .title{
    margin: 40px 10px;
    text-align:center;
	width:200px;
	height:60px;
}
.card:nth-child(even){
	margin-left:10px;
	margin-right:10px;
}
</style>
<?php get_header(); ?>
<body>
<h1>Breaking News</h1>
<div class="container">
    <div class="wrapper">

        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
            $breaking_title = get_field('breaking_news');
            $breaking_description = get_field('description'); 
            $breaking_image=wp_get_attachment_image(get_field('breakingnews_image')); 
        ?>
            <div class="card">
                       <div class="singleview">
                            <a href="single-wp_news.php">Single View</a>
                        </div>
                        <div class="title">
                            <h4><?php echo $breaking_title ?></h4>
                        </div>
                        <div>
                            <?php echo  $breaking_image ?>
                        </div>
                        <div>
                            <h6><?php echo $breaking_description ?></h6>
                        </div>
            </div>
        <?php
        endwhile;
        endif;
        ?>
    </div>
</div>
</body>