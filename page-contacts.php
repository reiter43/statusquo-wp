<?php
/*
Template Name: Контакты
*/
get_header();
?>

<section class="hat" style="background-image: url(<?php echo S_IMG_DIR ?>/hat5.png);">
	<?php get_template_part('template-parts/content', 'bread'); ?>
	<h1>Контакты компании</h1>
</section>
<section class="cont">
	<div class="row">
		<div class="cnt">
			<h2>Основные контакты</h2>
			<div class="cnt-info">

				<?php
				$post = get_post(191);
				setup_postdata($post);
				?>
				<div>
					<p><?php the_field('mode'); ?></p>
					<a href="tel: <?php the_field('phone'); ?>"><?php the_field('phone'); ?></a>
					<a href="<?php echo S_THES_ROOT; ?>/modal/modal-call.php" class="open-modal">Обратный звонок</a>
				</div>
				<div>
					<p>Центральный офис в Москве</p>
					<a> <?php the_field('adres'); ?></a>
					<a href="#">Проложить маршрут</a>
				</div>
				<div>
					<p>Для ваших предложений</p>
					<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
					<a href="#">Отправить письмо</a>
				</div>

				<?php wp_reset_postdata(); ?>

			</div>
			<div class="cnt-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.9938248635344!2d37.68621691592942!3d55.7238594805456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414ab52b6073ef3f%3A0x13ff6f6e40ec71e0!2z0JLQvtC70LPQvtCz0YDQsNC00YHQutC40Lkg0L_RgC3Rgi4sIDMyINC60L7RgNC_0YPRgSA4LCDQnNC-0YHQutCy0LAsINCg0L7RgdGB0LjRjywgMTA5MzE2!5e0!3m2!1sru!2sua!4v1567597748473!5m2!1sru!2sua" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
			<h2>Реквизиты компании</h2>
			<div class="cnt-req">
				<div>
					<h4>Карточка предприятия</h4>
					<p>Деятельность нашей компании может быть полезна тем предприятиям, которые ориентируются на деятельность через EPC-контракты и готовы к полноценному сотрудничеству по всем фронтам.</p>
					<a href="#" class="file">Карточка предприятия</a>
				</div>
				<div>

					<?php
					$post = get_post(199);
					setup_postdata($post);
					?>

					<span>
						<p>Фирменное наименование </p>
						<p><?php the_field('title_com'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>Фирменное наименование </p>
						<p><?php the_field('title_com'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>Дата регистрации компании</p>
						<p><?php the_field('reg'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>ИНН/КПП контрагента</p>
						<p><?php the_field('kod'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>ОКПО</p>
						<p><?php the_field('okpo'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>ОГРН</p>
						<p><?php the_field('ogrn'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>Адрес</p>
						<p><?php the_field('adres'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>Почтовый адрес</p>
						<p><?php the_field('adres_mail'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>
					<span>
						<p>ОКВЭД</p>
						<p><?php the_field('okved'); ?></p>
						<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
					</span>

					<?php wp_reset_postdata(); ?>

				</div>
			</div>
		</div>
	</div>
</section>
<section class="dep">
	<div class="row">
		<?php get_template_part('template-parts/content', 'form_cons1'); ?>	
	</div>
</section>

<?php get_footer(); ?>