<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php /*wp_enqueue_style( 'customeheader', get_stylesheet_uri().'/customeheader.css' );*/
        
    ?>
    <link rel="stylesheet" href="customeheader.css">
</head>
<body>
    <div class="header_container">
        <div class="nav">
            <a  href="#home">Home</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </div>
</body>