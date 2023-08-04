<?php
get_header();

$add_numbers = apply_filters('add',"10","20");
echo"Add 10 + 20 :" . $add_numbers;
get_footer();
?>