<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>

    <section class="hat fy" style="background-image: url(<?php the_field('bg_article'); ?>);">
        <ul class="bread">
            <li>
                <a href="<?php echo home_url(); ?>">Главная</a>
            </li>
            <li>
                <a href="<?php echo get_page_link(23); ?>">статьи</a>
            </li>
        </ul>
        <h1><?php the_title(); ?></h1>
    </section>
    <section class="cont">
        <div class="row">
            <?php the_content(); ?>
        </div>
    </section>
    <section class="post">
        <div class="row">
            <h3>Другие статьи <span>на эту тему</span></h3>
            <div class="post-bc">

            <?php
				global $post;
				$args = array(
					'post_type' => "articles",
					'numberposts' => 4,
					'publish'   => true,
					'order'     => "DESC",
				);
				$myposts = get_posts($args);

				foreach ($myposts as $post) {
					setup_postdata($post);
			?>
                <a href="<?php the_permalink() ?>" class="<?php the_field('article_cat');?>">
                    <i style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></i>
                    <h4><?php the_title() ?></h4>
                    <span>
                        <p><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
                        <p><?php the_time('j F Y') ?></p>
                    </span>
                </a>
			<?php
				}
				wp_reset_postdata();
			?>

            </div>
        </div>
    </section>

<?php endwhile; ?>



<?php get_footer();
