<?php
?>

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