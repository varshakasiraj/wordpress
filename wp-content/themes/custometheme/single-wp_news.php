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
	background-color:teal;
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
}
.card:nth-child(even){
	margin-left:10px;
	margin-right:10px;
}
</style>
<body>
<div class="card">
                        <div class="singleview">
                            <a href="single-wp_news.php">Single View</a>
                        </div>
                        <div class="title">
                            <h3 style="color:white ;">
                                <?php 
                                    $get_meta_breaking_news_title = get_field('breaking_news');
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
                            ?>
                                <img src="<?php $image ?>" />
                        <h4>
                            <?php 
                                $get_meta_breaking_news_description = get_post_meta(7,"description");
                                
                                foreach ($get_meta_breaking_news_description as $get_meta_post_value){
                                    echo $get_meta_post_value;
                            }
                            ?>
                        </h4>
                    </div>
</body>