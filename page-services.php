<?php
/*
Template Name: Услуги
*/
get_header();
?>

<section class="cont">
	<div class="row">
		<?php get_template_part('template-parts/content', 'bread'); ?>
		<h1>Услуги и стоимость</h1>
		<div class="serv">
			<?php filter_categories(); ?>			
		</div>
	</div>
</section>

<?php 
get_footer();