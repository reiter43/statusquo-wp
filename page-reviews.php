<?php
/*
Template Name: Отзывы
*/
get_header();
?>
<section class="hat" style="background-image: url(<?php echo S_IMG_DIR ?>/hat2.png);">
		<span style="background-image: url(<?php echo S_IMG_DIR ?>/hat2m.png);"></span>	
		<?php get_template_part('template-parts/content', 'bread'); ?>
		<h1>Отзывы клиентов</h1>
	</section>
	<section class="cont">
		<div class="row">
			<div class="quote">
				<p>За 8 лет деятельности, нам доверились <br>более 200 именитых компаний, чьи <br>надежды мы оправдали на деле.</p>
				<a href="http://statusquo/wp-content/themes/statusquo/modal/modal-rev.php" class="link open-modal">Добавить отзыв</a>
			</div>
			<div class="rev">
				<h4>Рекомендательные письма</h4>
				<div class="rev-rec">
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev1.png"><img src="<?php echo S_IMG_DIR ?>/rev1.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev2.png"><img src="<?php echo S_IMG_DIR ?>/rev2.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev3.png"><img src="<?php echo S_IMG_DIR ?>/rev3.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev4.png"><img src="<?php echo S_IMG_DIR ?>/rev4.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev1.png"><img src="<?php echo S_IMG_DIR ?>/rev1.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev2.png"><img src="<?php echo S_IMG_DIR ?>/rev2.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev3.png"><img src="<?php echo S_IMG_DIR ?>/rev3.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
					<span>
						<a href="<?php echo S_IMG_DIR ?>/rev4.png"><img src="<?php echo S_IMG_DIR ?>/rev4.png"></a>
						<h6>«Вома Керамикс»</h6>
						<p>За отсутствие навязывания и адекватное ценообразование</p>
					</span>
				</div>
			</div>
			<div class="rev">
				<h4>Отзывы клиентов</h4>
				<div class="rev-quo">
				<?php
					global $post;
					$args = array(
						'post_type' => "reviews",
						'numberposts' => -1,
						'publish'   => true,
						'order'     => "ASC"
					);
					$myposts = get_posts($args);

					foreach ($myposts as $post) {
						setup_postdata($post);
						?>
						<div>
						<h6><?php the_title(); ?></h6>
						<?php the_content(); ?>
						<span>
							<i style="background-image: url(<?php the_field('fhoto_reviews'); ?>);"></i>
							<b><?php the_field('fio_reviews'); ?></b>
							<p><?php the_field('prof_reviews'); ?></p>
						</span>
					</div>
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
			<?php get_template_part('template-parts/content', 'form_cons2'); ?>	
		</div>
    </section>
    
<?php get_footer(); ?>