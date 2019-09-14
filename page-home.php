<?php
/*
Template Name: Главная
*/
get_header();
?>
	<section class="cap">
		<video style="display:none" loop="true" muted="true" playsinline="true" autoplay="autoplay"><source src="<?php echo get_template_directory_uri()?>/video/video.mp4" type="video/mp4"></video>
		<div class="row">
			<h1>Подключите аутсорсинг и станьте свободнее</h1>
			<p>Сократите расходы на 40% с помощью бухгалтерского аутсорсинга</p>
			<a href="#" class="link">расчитать экономию</a>
		</div>
		<div class="cap-r">
			<a href="#">
				<p>01</p>
				<h4>Аудиторские <br>услуги</h4>
			</a>
			<a href="#">
				<p>02</p>
				<h4>Бухгалтерские <br>услуги</h4>
			</a>
			<a href="#">
				<p>03</p>
				<h4>Юридические <br>услуги</h4>
			</a>
		</div>
		<p>Если у вас возникли вопросы или вы хотели бы обсудить предложение, обратитесь по электронной почте info@auditsk.ru к нашим специалистам.</p>
	</section>
	<section class="ctn">
		<div class="row">
			<div class="ctn-u">
				<div>
					<p>01</p>
					<h4>Аудиторские <br>услуги</h4>					
					<ul>

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
						<li><a href="<?php the_permalink() ?>"><?php the_excerpt(); ?></a></li>
					<?php
					}
					wp_reset_postdata();
					?>

					</ul>
				</div>
				<div>
					<p>02</p>
					<h4>Бухгалтерские <br>услуги</h4>
					<ul>
						
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
						<li><a href="<?php the_permalink() ?>"><?php the_excerpt(); ?></a></li>
					<?php
					}
					wp_reset_postdata();
					?>					

					</ul>
				</div>
				<div>
					<p>03</p>
					<h4>Юридические <br>услуги</h4>
					<ul>
						
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
						<li><a href="<?php the_permalink() ?>"><?php the_excerpt(); ?></a></li>
					<?php
					}
					wp_reset_postdata();
					?>

					</ul>
				</div>
			</div>
			<div class="ctn-q">
				<p>Компания более 20 лет на рынке, мы заслужили доверие сотен клиентов благодаря колоссальному опытому специалистов и эффективному подходу.</p>
				<span><h4>Суклышкина Л.С.</h4>Генеральный директор</span>
			</div>
		</div>
	</section>
	<section class="kvo">
		<div class="row">
			<div>
				<h2>Компания <br>Статус Кво</h2>
				<p>ЗАО “АУДИТ СТАТУС-КВО” прошел аттестацию и является сертифицированным партнером холдинга GLOBAL FINANCE <br><a href="#">Посмотреть сертификат</a></p>
				<p>Мы обеспечиваем высочайшее качество всего спектра услуг, потому как высшей ценностью компании является доверие клиентов.</p>
				<p>ЗАО «Аудит-Статус Кво» является членом саморегулируемой организации аудиторов "Российский Союз аудиторов" (Ассоциация) (СРО РСА). Основной регистрационный номер записи №11703036622</p>
			</div>
			<span style="background-image: url(<?php echo S_IMG_DIR ?>/kvo.png);"></span>
		</div>
	</section>
	<section class="task">
		<div class="row">
			<h2>Задачи компании</h2>
			<p>Во многом компания сотрудничает с тремя видами специалистов, такая классификация позволила нам направить все усилия на то, чтобы повысить эффективность работы с ними.</p>
			<div>
				<span>
					<b>01</b>
					<h4>Бухглатеру</h4>
					<p>Консультации экспертов по бухгалтерскому и налоговому учету, помощь в оптимизации налогооблажения, восстановлении учета, а также решении непрофильных вопросов. Мы станем незаменимым профессиональным помощником!</p>
				</span>
				<span>
					<b>02</b>
					<h4>Предпринимателю</h4>
					<p>Консультации экспертов по бухгалтерскому и налоговому учету, помощь в оптимизации налогооблажения, восстановлении учета, а также решении непрофильных вопросов. Мы станем незаменимым профессиональным помощником!</p>
				</span>
				<span>
					<b>03</b>
					<h4>Директору</h4>
					<p>Полная поддержка вашего бизнеса от выбора системы налогооблажения, регистрации в налоговой инспекции до оперативной консультации по текущим вопросам кадрового, бухгалтерского и налогового учета со сдачей отчетности</p>
				</span>
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
	<section class="hit">
		<div class="row">
			<h2>Истории успеха наших клиентов</h2>
			<div class="hit-bc">
				<div class="hit-item">
					<i><img src="<?php echo S_IMG_DIR ?>/hit1.png"></i>
					<h4>Сбербанк</h4>
					<span>Банковский сектор</span>
					<p>Наши специалисты обратились в компанию «Статус Кво» для обеспечения аутсорсинговой работы с бухгалтерскими отчетами, благодаря чему мы бы могли высвободить график штатных сотрудников для работы над задачами иного рода. Сложность заключалась в том, что вся финансовая документация хранилась и обрабатывалась в закрытой корпоративной системе...</p>
					<a href="#">Смотреть решение</a>
				</div>
				<div class="hit-item">
					<i><img src="<?php echo S_IMG_DIR ?>/hit2.png"></i>
					<h4>Роснефть</h4>
					<span>Добывающая компания</span>
					<p>Наши специалисты обратились в компанию «Статус Кво» для обеспечения аутсорсинговой работы с бухгалтерскими отчетами, благодаря чему мы бы могли высвободить график штатных сотрудников для работы над задачами иного рода. Сложность заключалась в том, что вся финансовая документация хранилась и обрабатывалась в закрытой корпоративной системе...</p>
					<a href="#">Смотреть решение</a>
				</div>
				<div class="hit-item">
					<i><img src="<?php echo S_IMG_DIR ?>/hit3.png"></i>
					<h4>Яндекс</h4>
					<span>Цифровые технологии</span>
					<p>Наши специалисты обратились в компанию «Статус Кво» для обеспечения аутсорсинговой работы с бухгалтерскими отчетами, благодаря чему мы бы могли высвободить график штатных сотрудников для работы над задачами иного рода. Сложность заключалась в том, что вся финансовая документация хранилась и обрабатывалась в закрытой корпоративной системе...</p>
					<a href="#">Смотреть решение</a>
				</div>
				<div class="hit-item">
					<i><img src="<?php echo S_IMG_DIR ?>/hit1.png"></i>
					<h4>Сбербанк</h4>
					<span>Банковский сектор</span>
					<p>Наши специалисты обратились в компанию «Статус Кво» для обеспечения аутсорсинговой работы с бухгалтерскими отчетами, благодаря чему мы бы могли высвободить график штатных сотрудников для работы над задачами иного рода. Сложность заключалась в том, что вся финансовая документация хранилась и обрабатывалась в закрытой корпоративной системе...</p>
					<a href="#">Смотреть решение</a>
				</div>
			</div>
			<a href="#" class="link">показать еще</a>
		</div>
	</section>
	<section class="dep">
		<div class="row">
			<h2>Бесплатная консультация</h2>
			<p>Для всех новых клиентов наши специалисты проводят бесплатную консультацию по вопросам бухгалтерии, аудита и правового сопровождния</p>
			<form action="">
				<label class="text">
					<input type="text" name="name" placeholder="Имя и фамилия" autocomplete="off" required>
					<span style="background-image: url(<?php echo S_IMG_DIR ?>/name.svg);"></span>
				</label>
				<label class="text">
					<input type="text" name="phone" placeholder="Номер телефона" autocomplete="off" required>
					<span style="background-image: url(<?php echo S_IMG_DIR ?>/phone.svg);"></span>
				</label>
				<label class="text">
					<input type="text" name="mail" placeholder="Электронная почта" autocomplete="off" required>
					<span style="background-image: url(<?php echo S_IMG_DIR ?>/mail.svg);"></span>
				</label>
				<textarea name="text" placeholder="Опишите деятельность вашей компании...."></textarea>
				<button class="link">Получить консультацию</button>
				<span>Бесплатная консультация длится 15 минут, вопросы рекомендуем подготовить заранее.</span>
			</form>
		</div>
	</section>

<?php get_footer();