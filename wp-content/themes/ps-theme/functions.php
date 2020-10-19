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
    register_post_type('faqs', [
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
        'menu_position'       => null,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'        
    ]);

    // CPT reviews
    register_post_type('reviews', [
        'label'  => null,
        'labels' => [
            'name'               => 'review', // основное название для типа записи
            'singular_name'      => 'review', // название для одной записи этого типа
            'add_new'            => 'Добавить review', // для добавления новой записи
            'add_new_item'       => 'Добавление review', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование review', // для редактирования типа записи
            'new_item'           => 'Новое review', // текст новой записи
            'view_item'          => 'Смотреть reviews', // для просмотра записи этого типа.
            'search_items'       => 'Искать reviews', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине            
            'menu_name'          => 'REVIEWS', // название меню
        ],

        'public'              => false,
        'show_ui'             => true, // зависит от public        
        'menu_position'       => null,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'        
    ]);
}

function getFAQ()
{
    $args = [
        'orderby'     => 'date',
        'order'       => 'ASC',
        // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        'post_type'   => 'faqs'
    ];

    return get_posts($args);
};

function getReviews()
{
    $args = [
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'reviews'
    ];
    $reviews = []; // this is the empty array for our reviews

    foreach (get_posts($args) as $post) {
        //   - to obtian the ID use the next function
        // $id = $post->ID;
        // echo $id;
        //   - to get the array of all elements specific for every ID us the next function 
        // get_fields($id);
        //   - fill our $review array with the reviews
        $review = get_fields($post->ID);  // obtain the IDs
        $review['name'] = $post->post_title;   // we added it intentionaly
        // $reviewed['content'] = $post->post_content;  // if needed
        $reviews = $review;

        // var_dump($reviews);
        //   - to get them on the screen you have to create a foreach cicle and write the next in the file where you want them
        //    foreach (getREVIEWS() as $review){
        //       echo $review['name'];
        //       echo $review['authours'];
        //       echo $review['opinions'];
        //    }
        // end foreach
    }
    //var_dump($reviews);
    return $reviews;
}

//print_r(getReviews());
