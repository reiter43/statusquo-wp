<?php
/*
Template Name: Вопрос-ответ
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
					<a >вопрос-ответ</a>
				</li>
			</ul>
			<h1>Частые вопросы</h1>
			<div class="faq">
				<div class="faq-pn">
					<span>Разделы</span>
					<p>Мы подобрали самые частые вопросы клиентов и ответили на них для вашего удобства</p>
					<ul>
						<li><a data-fill="0">Все разделы</a></li>
						<li><a data-fill="1">Рабочий процесс</a></li>
						<li><a data-fill="2">Оплата услуг</a></li>
						<li><a data-fill="3">Гарантии выполнения</a></li>
						<li><a data-fill="4">Документация</a></li>
						<li><a data-fill="5">Сотрудничество</a></li>
						<li><a data-fill="6">Специалисты</a></li>
						<li><a data-fill="7">Другое</a></li>
					</ul>
					<a href="#" class="ref">задать свой вопрос</a>
				</div>
				<div class="faq-ct">

					<?php
					global $post;
					$args = array(
						'post_type' => "faq",
						'numberposts' => -1,
						'publish'   => true,
						'order'     => "ASC",
					);
					$myposts = get_posts($args);

					foreach ($myposts as $post) {
						setup_postdata($post);
						?>
						<div class="faq-item <?php the_field('cat_faq');?>">
							<div>
								<p>Раздел: <?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
								<h6><?php the_field('question_faq') ?></h6>
							</div>
							<span>
								<p><?php the_field('answer_faq') ?></p>
								<a href="#" class="file">Инструкция.pdf</a>
								<a href="#" class="file">Презентация.ppt</a>
							</span>
						</div>
					<?php
					}
					wp_reset_postdata();
					?>

				</div>
			</div>
        </div>
        
<?php get_footer(  ); ?>