<?php
/*
Template Name: Контакты
*/
get_header();
?>
<section class="hat" style="background-image: url(<?php echo S_IMG_DIR ?>/hat5.png);">
		<ul class="bread">
			<li>
				<a href="/">Главная</a>
			</li>
			<li>
				<a href="/">контакты</a>
			</li>
		</ul>
		<h1>Контакты компании</h1>
	</section>
	<section class="cont">
		<div class="row">
			<div class="cnt">
				<h2>Основные контакты</h2>
				<div class="cnt-info">
					<div>
						<p>Ежедневно 10:00 - 18:00</p>
						<a href="tel:84951502737">8 495 150-27-37</a>
						<a href="modal-call.php" class="open-modal">Обратный звонок</a>
					</div>
					<div>
						<p>Центральный офис в Москве</p>
						<a>Волгоградский 32 - 8</a>
						<a href="#">Проложить маршрут</a>
					</div>
					<div>
						<p>Для ваших предложений</p>
						<a href="mailto:info@auditsk.ru">info@auditsk.ru</a>
						<a href="#">Отправить письмо</a>
					</div>
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
						<span>
							<p>Фирменное наименование </p>
							<p>ЗАО «АУДИТ-СТАТУС КВО»</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>Фирменное наименование </p>
							<p>ЗАО «АУДИТ-СТАТУС КВО»</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>Дата регистрации компании</p>
							<p>1 декабря 2011 г.</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>ИНН/КПП контрагента</p>
							<p>ИНН 000000000 / КПП 000000000</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>ОКПО</p>
							<p>000000000</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>ОГРН</p>
							<p>000000000000</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>Адрес</p>
							<p>г. Москва, Волгоградский 32 - 8</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>Почтовый адрес</p>
							<p>г. Москва, Волгоградский 32 - 8</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
						<span>
							<p>ОКВЭД</p>
							<p>00,0</p>
							<a class="copy"><span>Нажмите, чтобы скопировать в буфер обмена</span></a>
						</span>
					</div>
				</div>
			</div>
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
    
    <?php get_footer(  ); ?>