<?php
function customeHook(){
    echo"<h1>welcome</h1>";
}
add_action("wp_head",customeHook())
?>