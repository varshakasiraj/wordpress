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
<body>
<?php
die();
if ( have_posts() ) {
	while ( have_posts() )
    {
        the_post();
?>
   <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="title">
                    <h2><?php the_title() ?></h2>
                </div>
                <div>
                     <h4><?php the_content() ?></h4>
                </div> 
            </div> 
        </div> 
    </div> 
<?php
    
    } 
}
else {
    echo '<p>There are no posts!</p>';
}	
?>
</body>