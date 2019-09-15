<?php
/*
Template Name: Статьи
*/
get_header();
?>
<section class="cont">
	<div class="row">
		<ul class="bread">
			<li>
				<a href="<?php echo home_url(); ?>">Главная</a>
			</li>
			<li>
				<a>статьи</a>
			</li>
		</ul>
		<div class="post">
			<h1>Статьи специалистов</h1>
			<div class="post-cat">
				<a class="active" data-fill="0">все категории</a>
				<a data-fill="1">менеджмент</a>
				<a data-fill="2">бухгалтерия</a>
				<a data-fill="3">финансы</a>
				<a data-fill="4">квалификация</a>
				<a data-fill="5">другое</a>
			</div>
			<div class="post-bc">

				<?php
				global $post;
				$args = array(
					'post_type' => "articles",
					'numberposts' => -1,
					'publish'   => true,
					'order'     => "ASC",
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

<?php get_footer(); ?>