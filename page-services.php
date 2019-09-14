<?php
/*
Template Name: Услуги
*/
get_header();
?>

<section class="cont">
	<div class="row">
		<ul class="bread">
			<li>
				<a href="/">Главная</a>
			</li>
			<li>
				<a href="/">услуги и стоимость</a>
			</li>
		</ul>
		<h1>Услуги и стоимость</h1>

		<div class="serv">			

			<div class="serv-item">
				<div>
					<span>01</span>
					<h4><?php $category = get_category(4); echo $category->cat_name;  ?></h4>
					<?php echo category_description(4); ?>
					<a href="<?php echo get_category_link( 4 );  ?>" class="ref">подробнее об услуге</a>
				</div>
				<span>

					<?php
					global $post;
					$args = array(
						'post_type' => "services",
						'publish'   => true,
						'order'     => "ASC",
						'category_name' => 'audit-services'

					);
					$myposts = get_posts($args);

					foreach ($myposts as $post) {
						setup_postdata($post);
						?>
						<a href="<?php the_permalink() ?>">
							<h6><?php the_title(); ?></h6>
							<b>от <?php the_field('price_service'); ?></b>
						</a>
					<?php
					}
					wp_reset_postdata();
					?>
					
				</span>
			</div>

			<div class="serv-item">
				<div>
					<span>02</span>
					<h4><?php $category = get_category(5); echo $category->cat_name;  ?></h4>
					<?php echo category_description(5); ?>
					<a href="<?php echo get_category_link(5);  ?>" class="ref">подробнее об услуге</a>
				</div>
				<span>

					<?php
					global $post;
					$args = array(
						'post_type' => "services",
						'publish'   => true,
						'order'     => "ASC",
						'category_name' => 'accounting-services'

					);
					$myposts = get_posts($args);

					foreach ($myposts as $post) {
						setup_postdata($post);
						?>
						<a href="<?php the_permalink() ?>">
							<h6><?php the_title(); ?></h6>
							<b>от <?php the_field('price_service'); ?></b>
						</a>
					<?php
					}
					wp_reset_postdata();
					?>
					
				</span>
			</div>

			<div class="serv-item">
				<div>
					<span>03</span>
					<h4><?php $category = get_category(6); echo $category->cat_name;  ?></h4>
					<?php echo category_description(6); ?>
					<a href="<?php echo get_category_link(6);  ?>" class="ref">подробнее об услуге</a>
				</div>
				<span>

					<?php
					global $post;
					$args = array(
						'post_type' => "services",
						'publish'   => true,
						'order'     => "ASC",
						'category_name' => 'legal-services'

					);
					$myposts = get_posts($args);

					foreach ($myposts as $post) {
						setup_postdata($post);
						?>
						<a href="<?php the_permalink() ?>">
							<h6><?php the_title(); ?></h6>
							<b>от <?php the_field('price_service'); ?></b>
						</a>
					<?php
					}
					wp_reset_postdata();
					?>
					
				</span>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>