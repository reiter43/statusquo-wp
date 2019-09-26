<?php
?>

<a href="<?php the_permalink() ?>" class="post-<?php $cat = get_the_category($post->ID); echo $cat[0]->term_id; ?>">
    <i style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></i>
    <h4><?php the_title() ?></h4>
    <span>
        <p>
            <?php $category = get_the_category();
            echo $category[0]->cat_name; ?>
        </p>
        <p><?php the_time('j F Y') ?></p>
    </span>
</a>