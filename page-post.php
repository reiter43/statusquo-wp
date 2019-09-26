<?php
/*
Template Name: Статьи
*/
get_header();
?>
<section class="cont">
	<div class="row">
		<?php get_template_part('template-parts/content', 'bread'); ?>
		<div class="post">
			<h1><?php echo get_category(21)->name ?></h1>		
			<div class="post-cat">
				<a class="active" data-fill="0">все категории</a>
				<?php filter_categories(); ?>
			</div>
			<div class="post-bc">
				<?php out_articles(); ?>
			</div>
		</div>
	</div>
</section>
<section class="cst">
	<div class="row">
		<?php get_template_part('template-parts/content', 'form_cons2'); ?>	
	</div>
</section>

<?php 
get_footer(); 