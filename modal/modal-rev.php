<?php

?>

<div class="zoom-anim-dialog modal">
	<div class="mfp-close"></div>
	<h3>Оставьте отзыв</h3>
	<p>Мы всегда рады конструктивной критике и просим вас оставить отзыв о работе с компанией, о процессе сотрудничества и о впечатлениях</p>
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
			<input type="text" name="mail" placeholder="Электронная почта" autocomplete="off" required>
			<span style="background-image: url(http://statusquo/wp-content/themes/statusquo/img/mail.svg);"></span>
		</label>
		<textarea name="text" placeholder="Расскажите об опыте работы с нашей компанией, о положительные или негативных сторонах сотрудничества..."></textarea>
		<label class="file">
			<input type="file" name="upload">
			<span>Прикрепить файл</span>
		</label>
		<button class="link">отправить</button>
		<span>Наша компания не передает персональные данные третьим лицам.</span>
	</form>
	<script>
		$('input[name=phone]').mask('+7 (999) 999-99-99');
	  $('.modal form').ajaxForm({
	    success: function(formData, jqForm, options){
	      $('.modal form').prepend('<div class="suc">Вы успешно отправили отзыв</div>');
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
	  $('.file input').change(function(){
	    if($(this).val().replace(/.*\\/, "")=='') {
	      $(this).next('span').text('Прикрепить файл');
	    } else {
	      $(this).next('span').text($(this).val().replace(/.*\\/, ""));
	    }
	  });
	</script>
</div>