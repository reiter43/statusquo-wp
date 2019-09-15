<?php
get_header();
?>

<section class="hat" style="background-image: url(<?php echo S_IMG_DIR ?>/hat4.png);">
		<ul class="bread">
			<li>
				<a href="/">Главная</a>
			</li>
			<li>
				<a href="/">услуги и стоимость</a>
			</li>
			<li>
				<a href="/">Аудиторские услуги</a>
			</li>
		</ul>
		<h1><?php single_cat_title();  ?></h1>
	</section>
	<section class="cont">
		<div class="row">
			<div class="quote">
				<p>Обязательный бухгалтерский аудит – это <br>ежегодная проверка бухгалтерского учета <br>и финансовой отчетности организации.</p>
				<span class="lg"><b>Григорий Мельников</b> Старший бухгалтер</span>
			</div>
			<div class="com">
				<h4>Термин аудиторских услуг</h4>
				<span>
					<p>Обязательный бухгалтерский аудит – это ежегодная проверка бухгалтерского учета и финансовой отчетности организации или ИП. Аудиторские услуги оказывают ряд специализированных компаний. Их цена зависит от различных факторов: разновидность необходимого аудита, срочность заказа, квалификация и количество специалистов и т.д.</p>
				</span>
				<i style="background-image: url(<?php echo S_IMG_DIR ?>/comp3.png);"></i>
			</div>
			<div class="com">
                <h5>Виды и особенности аудиторских услуг </h5>
                <ul>
					<li>Аудит бухгалтерской отчетности</li>
					<li>Налоговый аудит</li>
					<li>Обязательный или инициативный аудит</li>
					<li>Экспресс-аудит</li>
					<li>Специальный аудит</li>
					<li>Управленческий аудит</li>
				</ul>
				<span>
					<p>В ходе оказания аудиторских услуг применяется большой спектр подходов, методов и процедур. По итогам заказчик получает на руки официальный документ, где зафиксировано мнение специалиста, который оказал организации аудиторские услуги. Основная цель проверки заключается в формировании независимого мнения об общем положении деятельности организации и проверка безукоризненности ведения бухгалтерской отчетности.</p>					
                </span>               
				
                <i style="background-image: url(<?php echo S_IMG_DIR ?>/comp4.png);"></i>
                
                <span>
					<p>Аудиторские бухгалтерской отчетности – очень важная процедура для каждой компании. Она способствует уменьшению потерь финансов, сокращению налоговых рисков, увеличению эффективности работы штатных бухгалтеров. К услугам сторонних компаний чаще всего обращаются организации среднего и малого бизнеса. Заказать аудиторские услуги в Москве, цена которых будет намного ниже, чем у других, можно в ЗАО «Аудит-Статус КВО». Компания осуществляет свою деятельность уже около 20 лет и подтвердила за это время свою компетентность и ответственность.</p>					
                </span>   
			</div>
			
			<div class="com-serv">
				<h4>Предлагаемые услуги компании</h4>
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
					</a>
				</span>
			</div>
		</div>
    </section>

<?php get_footer();