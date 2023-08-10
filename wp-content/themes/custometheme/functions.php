<?php
include_once 'classes/custome-shortcodes.php';
include_once 'classes/custome-post_news.php';
function customeHook(){
    ?>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" href="customeheader.css" type="text/css"/>
      <?php
}
add_action("wp_head","customeHook");
?>