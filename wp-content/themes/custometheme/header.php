<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php
       wp_head();
    ?>
    <link rel="stylesheet" href="customeheader.css">
    
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap');
    .header_container{
        background-color: #FFFFFF;
        height: 60px;
    }
    .header_container .nav a{
        
        color: #494D76;
        text-decoration: none;
        
    }
    .header_container .nav ul{
        
    }
    .header_container .nav li{
        list-style-type: none;
        display:inline; 
        word-spacing: 2px;
    }
    .nav{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        
    }
    .header_container .nav .logo{
        font-size: 25px;
        font-family: 'Vina Sans', cursive;
    }
    .header_container .nav .logo span{
        color: #FF3F3E;
    }
    .header_container .nav .title{
        font-size: 25px;
        color: #494D76;
    }
</style>
<body class="header">
    <div class="header_container">
        <div class="nav">
            <div class="logo">
                <p>Sha<span>Shop</span></p>
            </div>
            <div class="title">
                <ul>
                    <li><a  href="#home">Home</a></li>
                    <li><a href="http://localhost/wordpress/news/">News</a></li>
                    <li><a href="#">Dress</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About us</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>