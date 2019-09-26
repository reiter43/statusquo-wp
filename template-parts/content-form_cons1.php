<?php
?>

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