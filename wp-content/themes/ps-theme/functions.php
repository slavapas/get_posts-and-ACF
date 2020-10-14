<?php
// правильный способ подключить стили и скрипты
add_action('wp_enqueue_scripts', 'theme_name_scripts');

// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function theme_name_scripts()
{
    wp_enqueue_style('style-name', get_stylesheet_uri());
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/examplejs$', array(DEPENDENCY$), '1.0.0', TRUE_or_FAULSE$ );
}
