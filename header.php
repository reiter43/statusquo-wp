<?php

/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- <title>Статус Кво - Аудит и бухгалтерия</title> -->

	<meta name="keywords" content="Статус Кво - Аудит и бухгалтерия">
	<meta name="description" content="Статус Кво - Аудит и бухгалтерия">
	<meta name="format-detection" content="telephone=no">

	<!-- <link rel="shortcut icon" href="<?php echo S_IMG_DIR ?>/favicon.png" type="image/png"> -->

	<?php wp_head(); ?>
</head>

<body>
	<?php if (is_page(8) || is_page(17) || is_page(23) || is_single()) { ?>
		<header class="head white">
			<div class="head-humb"><span></span></div>
			<a href="<?php echo home_url(); ?>" class="head-logo"></a>

			<?php
				wp_nav_menu([
					'theme_location'  => 'top',
					'container'       => 'false',					
					'menu_class'      => '',
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
				]);
			?>

			<div class="head-phone">
				<a href="tel:84951502737">8 495 150 27 37</a>
				<a href="modal-call.php" class="open-modal">Заказать обратный звонок</a>
			</div>
		</header>
	<?php
	} else {
		?>
		<header class="head">
			<div class="head-humb"><span></span></div>
			<a href="<?php echo home_url(); ?>" class="head-logo"></a>

			<?php
				wp_nav_menu([
					'theme_location'  => 'top',
					'container'       => 'false',					
					'menu_class'      => '',
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
				]);
			?>

			<div class="head-phone">
				<a href="tel:84951502737">8 495 150 27 37</a>
				<a href="modal-call.php" class="open-modal">Заказать обратный звонок</a>
			</div>
		</header>
	<?php

	}
