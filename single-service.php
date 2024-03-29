<?php
get_header();
?>
<section class="cont">
    <div class="row">
        <?php get_template_part('template-parts/content', 'bread'); ?>        
        <div class="page">
            <?php while (have_posts()) : the_post(); ?>            
                <a href="<?php echo get_page_link(8); ?>" class="all">все услуги</a>
                <h1><?php the_title(); ?></h1>
                <i style="background-image: url(<?php the_field('bg_single-service'); ?>);"></i>
                <div class="page-buh">
                    <div class="page-nav">
                        <div>
                            <?php the_field('list_service'); ?>
                            <p>Стоимость услуги</p>
                            <b>от <?php the_field('price_single-service'); ?></b>
                            <a href="<?php echo S_THES_ROOT; ?>/modal/modal-order.php" class="link open-modal">заказать услугу</a>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<section class="cst">
    <div class="row">
        <h3>Заполните форму и получите бесплатную консультацию</h3>
        <form action="">
            <label class="text">
                <input type="text" name="name" placeholder="Имя и фамилия" autocomplete="off" required>
                <span style="background-image: url(<?php echo S_IMG_DIR ?>/name.svg);"></span>
            </label>
            <label class="text">
                <input type="text" name="phone" placeholder="Номер телефона" autocomplete="off" required>
                <span style="background-image: url(<?php echo S_IMG_DIR ?>/phone.svg);"></span>
            </label>
            <button class="link">отправить заявку</button>
        </form>
    </div>
</section>

<?php
get_footer();
