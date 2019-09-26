<?php
/**
 * Шаблон подвала
 */

?>
	<footer class="foot">
		<div class="row">
			<div class="foot-pn">
				<a href="<?php echo home_url(); ?>" class="foot-logo"></a>
				<p>ЗАО «Аудит-Статус Кво» является членом саморегулируемой организации аудиторов "Российский Союз аудиторов" (Ассоциация) (СРО РСА). Основной регистрационный номер записи №11703036622</p>
				<a href="<?php echo get_page_link(15); ?>" >Подробнее о компании</a>
			</div>
			<div class="foot-nav">
				<h4>Навигация</h4>
				<?php
					wp_nav_menu([
						'theme_location'  => 'down',
						'container'       => 'false',					
						'menu_class'      => '',
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					]);
				?>
			</div>
			<div class="foot-info">				
				<h4>Контакты</h4>
				<p>Офис в Москве: <br><?php the_field('adres', 191);?></p>
				<p>Режим работы: <br><?php the_field('mode', 191);?></p>
				<p>Номер телефона: <br><?php the_field('phone', 191);?></p>
				<p>По вопросам и предложениям: <br><?php the_field('email', 191);?></p>				
			</div>
			<div class="foot-sub">
				<h4>Подписка</h4>
				<p>Подпишитесь на новости компании</p>
				<form action="">
					<input type="text" name="mail" placeholder="Введите e-mail" autocomplete="off" required>
					<button></button>
				</form>
				<a href="#" target="_blank" class="author">
					<img src="<?php echo S_IMG_DIR ?>/author.svg" alt="Разработка и поддержка сайта">
					<span>Разработка и <br>поддержка сайта</span>
				</a>
			</div>
		</div>
	</footer>	

	<?php wp_footer(  ); ?>
</body>
</html>