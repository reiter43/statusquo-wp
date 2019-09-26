<?php
/*
Template Name: Вопрос-ответ
*/
get_header();
?>

<section class="cont">
	<div class="row">
		<?php get_template_part('template-parts/content', 'bread'); ?>
		<h1>Частые вопросы</h1>
		<div class="faq">
			<div class="faq-pn">
				<span>Разделы</span>
				<p>Мы подобрали самые частые вопросы клиентов и ответили на них для вашего удобства</p>
				<ul>
					<li><a data-fill="0">Все разделы</a></li>
					<?php filter_categories(); ?>
				</ul>
				<a href="#" class="ref">задать свой вопрос</a>
			</div>
			<?php get_template_part('template-parts/content', 'faq'); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>