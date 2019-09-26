<div class="faq-ct">
    <?php
    global $post;
    $args = array(
        'post_type' => "faq",
        'numberposts' => -1,
        'publish'   => true,
        'order'     => "ASC"
    );
    $myposts = get_posts($args);

    foreach ($myposts as $post) {
        setup_postdata($post);
        ?>
            <div class="faq-item faq-<?php $cat = get_the_category($post->ID); echo $cat[0]->term_id; ?>">                             
                <div>
                    <p>Раздел: <?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>                               
                    <h6><?php the_field('question_faq'); ?></h6>
                </div>
                <span>
                    <p><?php the_field('answer_faq'); ?></p>
                    <a href="#" class="file">Инструкция.pdf</a>
                    <a href="#" class="file">Презентация.ppt</a>
                </span>
            </div>
        <?php
    }
    wp_reset_postdata();
    ?>
</div>