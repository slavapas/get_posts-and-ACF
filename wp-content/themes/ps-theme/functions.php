<?php
// // правильный способ подключить стили и скрипты
// add_action('wp_enqueue_scripts', 'theme_name_scripts');

// // add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
// function theme_name_scripts()
// {
//     wp_enqueue_style('style-name', get_stylesheet_uri());
//     wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap-main/css/bootstrap.min.css');
//     wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap-main/js/bootstrap.min.js', array(), '1.0.0', TRUE);
// }


add_action('init', 'my_first_post_type');
function my_first_post_type()
{
    // for thumbnails to be recognised
    add_theme_support('post-thumbnails');
    // CPT faqs
    register_post_type('faq', [
        'label'  => null,
        'labels' => [
            'name'               => 'FAQ', // основное название для типа записи
            'singular_name'      => 'faq', // название для одной записи этого типа
            'add_new'            => 'Добавить FAQ', // для добавления новой записи
            'add_new_item'       => 'Добавление FAQ', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование FAQ', // для редактирования типа записи
            'new_item'           => 'Новое FAQ', // текст новой записи
            'view_item'          => 'Смотреть FAQs', // для просмотра записи этого типа.
            'search_items'       => 'Искать FAQs', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине            
            'menu_name'          => 'FAQs', // название меню
        ],

        'public'              => true,
        'show_ui'             => null, // зависит от public                
        'menu_icon'           => null,
        'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'        
    ]);

    // CPT reviews
    register_post_type('reviews', [
        'label'  => null,
        'labels' => [
            'name'               => 'отзыв', // основное название для типа записи
            'singular_name'      => 'отзыв', // название для одной записи этого типа
            'add_new'            => 'Добавить отзыв', // для добавления новой записи
            'add_new_item'       => 'Добавление отзыв', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование отзыв', // для редактирования типа записи
            'new_item'           => 'Новое отзыв', // текст новой записи
            'view_item'          => 'Смотреть отзывы', // для просмотра записи этого типа.
            'search_items'       => 'Искать отзывы', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине            
            'menu_name'          => 'REVIEWS', // название меню
        ],

        'public'              => false,
        'show_ui'             => true, // зависит от public                
        'menu_icon'           => 'dashicons-sticky',
        'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'        
    ]);
}

// getFAQ function
function getFAQ()
{
    $args = [
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'faq'
    ];

    return get_posts($args);
};


//getReviews function
function getReviews()
{
    $args = [
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'reviews'
    ];

    $reviews = [];
    foreach (get_posts($args) as $post) {
        $postID = $post->ID;
        $review = get_fields($postID);
        // print_r(get_fields($postID));
        $review['name'] = $post->post_title;
        $review['description'] = $post->post_content;
        $reviews[] = $review;
        //print_r($reviews);
    }
    return $reviews;
};



// print_r(getReviews());
