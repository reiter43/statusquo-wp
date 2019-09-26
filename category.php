<?php
get_header();
?>

<section class="hat" style="background-image: url(<?php echo S_IMG_DIR ?>/hat4.png);">
    <?php get_template_part('template-parts/content', 'bread'); ?>
    <h1><?php echo single_cat_title(); ?></h1>
</section>
<section class="cont">
    <div class="row">
        <?php
            $term = get_queried_object();
            $fio = get_field('fio_catserviece', $term);
            $prof = get_field('prof_catserviece', $term);
            $content = get_field('cont_services', $term);
            $quote = get_field('quote_serviece', $term);
        ?>
        <div class="quote">
            <p><?php echo $quote; ?></p>
            <span class="lg"><b><?php echo $fio; ?></b><?php echo $prof; ?></span>
        </div>
        <div class="com">
            <?php echo $content; ?>
        </div>
        <div class="com-serv">
            <h4>Предлагаемые услуги компании</h4>
            <span>
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <h6><?php the_title(); ?></h6>
                        <b>от <?php the_field('price_service'); ?></b>
                    </a>
                <?php endwhile; ?>
            </span>
        </div>
    </div>
</section>

<?php get_footer();
