<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <section class="hat fy" style="background-image: url(<?php the_field('bg_article'); ?>);">
        <?php get_template_part('template-parts/content', 'bread'); ?>
        <h1><?php the_title(); ?></h1>
    </section>
    <section class="cont">
        <div class="row">
            <div class="com">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <section class="post">
        <div class="row">
            <h3>Другие статьи <span>на эту тему</span></h3>
            <div class="post-bc">
                <?php out_articles(); ?>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php 
get_footer();
