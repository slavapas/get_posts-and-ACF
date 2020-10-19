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

                $faqs = getFAQ();

                foreach ($faqs as $faq) {
                    echo '</br>';
                    echo $faq->post_title;
                    echo '</br>';
                    echo $faq->post_content;
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
            <div class="col-xl-12">
                <hr>
                <?php
                //----Querying Custom Post Types
                // параметры по умолчанию

                $reviews = getReviews();
                ?>
                <?php foreach ($reviews as $review) : ?>
                    <div class="col-md-1">
                        <?php echo $review['name']; ?>
                    </div>
                    <div class="col-md-11">
                        <?php echo $review['description']; ?>
                    </div>
                    <div class="col-md-1">
                        <?php echo $review['job']; ?>
                    </div>
                    <div class="col-md-11">
                        <?php echo '<img src="' . $review['img'] . '">'; ?>
                    </div>
                    <div class="col-md-12">
                        <?php echo $review['text']; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>
<?php
echo '<hr><strong>Number of queries on this page - ' . get_num_queries() . '</strong>';
?>