<?php
/**
 * Шаблон шапки
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />	
	<meta name="keywords" content="Статус Кво - Аудит и бухгалтерия">
	<meta name="description" content="Статус Кво - Аудит и бухгалтерия">
	<meta name="format-detection" content="telephone=no">
	
	<?php wp_head(); ?>
</head>

<body>
	
		<header class="head <?php class_by_header(); ?> ">
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
				<a href="tel:<?php the_field('phone', 191);?>"><?php the_field('phone', 191);?></a>
				<a href="<?php echo S_THES_ROOT; ?>/modal/modal-call.php" class="open-modal">Заказать обратный звонок</a>				
			</div>
		</header>
	
	
	