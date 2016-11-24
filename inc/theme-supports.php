<?php
//for post formats
$options = get_option( 'post_formats' );
$formats = array ('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();

if(!empty($options)){
foreach($formats as $format){
  $output[]=(@$options[$format]==1 ? $format :'' );
}
add_theme_support( 'post-formats', $output );
}
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );

 ?>
