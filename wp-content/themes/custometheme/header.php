<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php
       wp_head();
    ?>
    <link rel="stylesheet" href="customeheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        padding: 10px;
    }
    .header_container .nav .firstli{
        color: red;
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
    .header_container .nav .icons{
        
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
                    <li class="firstli"><a  href="#home">Home</a></li>
                    <li><a href="http://localhost/wordpress/news/">News</a></li>
                    <li><a href="http://localhost/wordpress/clothes/">Dress</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About us</a></li>
                </ul>
            </div>
            <div class="icons">
                <ul>
                    <li><i class="fa-brands fa-facebook"></i></li>
                    <li><i class="fa-brands fa-twitter"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                    <li><i class="fa-brands fa-dribbble"></i></li>
                </ul>
            </div>
            <div>
                   <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
    </div>
</body>