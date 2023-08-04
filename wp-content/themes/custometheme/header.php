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
    .header_container{
        background-color: black;
        height: 60px;
    }
</style>
<body class="header">
    <div class="header_container">
        <div class="nav">
            <a  href="#home">Home</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </div>
</body>