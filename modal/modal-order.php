<?php

?>
<div class="zoom-anim-dialog modal">
	<div class="mfp-close"></div>
	<h3>Заказать услугу</h3>
	<p>Если вас заинтересовала данная услуга компании, оставьте свои контактные данные и мы свяжемся с вами, чтобы начать сотрудничество</p>
	<form action="">
		<label class="text">
			<input type="text" name="name" placeholder="Имя и фамилия" autocomplete="off" required>
			<span style="background-image: url(http://statusquo/wp-content/themes/statusquo/img/name.svg);"></span>
		</label>
		<label class="text">
			<input type="text" name="phone" placeholder="Номер телефона" autocomplete="off" required>
			<span style="background-image: url(http://statusquo/wp-content/themes/statusquo/img/phone.svg);"></span>
		</label>
		<label class="text">
			<input type="text" name="comp" placeholder="Название компании" autocomplete="off" required>
			<span style="background-image: url(http://statusquo/wp-content/themes/statusquo/img/comp.svg);"></span>
		</label>
		<button class="link">оформить заявку</button>
		<span>Наша компания не передает персональные данные третьим лицам.</span>
	</form>
	<script>
		$('input[name=phone]').mask('+7 (999) 999-99-99');
	  $('.modal form').ajaxForm({
	    success: function(formData, jqForm, options){
	      $('.modal form').prepend('<div class="suc">Вы успешно отправили запрос, в ближайшее время наши специалисты свяжутся с вами по номеру <a href="tel:84951502737">+8 495 150 27 37<a></div>');
	      $('.suc').fadeIn(300);
	      setTimeout(function () {
	        $('.suc').fadeOut(300);
	        $('.modal form')[0].reset();
	      }, 8000);
	      setTimeout(function () {
	        $('.suc').remove();
	      }, 8300);
	    }
	  });
	</script>
</div>