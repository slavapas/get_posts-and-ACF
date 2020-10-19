<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">FAQs
        <div class="row">
            <div class="col-md-12">
                <hr>
                <?php
                //----Querying Custom Post Types
                // параметры по умолчанию

                $posts = getFAQ();

                foreach ($posts as $post) {
                    setup_postdata($post);
                    // формат вывода the_title() ...
                    // setup_postdata($post);
                    echo '</br>';
                    echo $post->post_title;
                    echo '</br>';
                    echo $post->post_content;
                    echo '</br>';
                }


                ?>
            </div>
        </div>
    </div>
    <hr>
    <!-- Reviews Section -->
    <div class="container">REVIEWs
        <div class="row">
            <div class="col-md-12">
                <hr>
                <?php
                //----Querying Custom Post Types
                // параметры по умолчанию               
                // echo '<pre>';
                // var_dump($posts_reviews);
                // echo '</pre>';
                foreach (getReviews() as $review) {
                    // setup_postdata($post_rev);
                    // формат вывода the_title() ...
                    // setup_postdata($post);

                    // $id = $post_review->ID;
                    //var_dump($review);
                    echo $review['name'];
                    // echo '</br>' . $review['authors'] . '</br>';
                    // echo '</br>' . $review['opinions'] . '</br>';
                    // echo $post_review->post_content;
                    // echo get_the_post_thumbnail($id, 'thumbnail', array('class' => 'alignleft'));

                    // echo '</br>';
                }


                ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>