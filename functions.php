<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

require get_stylesheet_directory() . '/inc/function-admin.php';
require get_stylesheet_directory() . '/enqueue.php';
// require get_stylesheet_directory() . '/inc/theme-supports.php';
require get_stylesheet_directory() . '/inc/custom-post-type.php';
require get_stylesheet_directory() .'/inc/function-front.php';
require get_stylesheet_directory() .'/inc/shortcodes.php';


?>
