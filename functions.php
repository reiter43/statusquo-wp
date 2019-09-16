<?php

// Подключение стилей и скриптов и картинок
define("S_THES_ROOT", get_template_directory_uri());
define('S_CSS_DIR', S_THES_ROOT . '/css');
define('S_JS_DIR', S_THES_ROOT . '/js');
define('S_IMG_DIR', S_THES_ROOT . '/img');

function statusquo_scripts()
{
	wp_enqueue_style('statusquo-reset',  S_CSS_DIR . '/reset.css');
	wp_enqueue_style('statusquo-magnific',  S_CSS_DIR . '/magnific-popup.css');
	wp_enqueue_style('statusquo-style',  S_CSS_DIR . '/style.css');

    wp_deregister_script('jquery');
    wp_enqueue_script('statusquo-jquery', S_JS_DIR . '/jquery-3.3.1.min.js');
	wp_enqueue_script('statusquo-form', S_JS_DIR . '/jquery.form.js', array('statusquo-jquery'), '', true);
	wp_enqueue_script('statusquo-magnific', S_JS_DIR . '/jquery.magnific-popup.js', array('statusquo-jquery'), '', true);
	wp_enqueue_script('statusquo-masked', S_JS_DIR . '/jquery.maskedinput.js', array('statusquo-jquery'), '', true);
	wp_enqueue_script('statusquo-slick', S_JS_DIR . '/slick.min.js', array('statusquo-jquery'), '', true);
	wp_enqueue_script('statusquo-sticky', S_JS_DIR . '/jquery.sticky-kit.js', array('statusquo-jquery'), '', true);
	wp_enqueue_script('statusquo-script', S_JS_DIR . '/script.js', array('statusquo-jquery', 'statusquo-form','statusquo-masked','statusquo-magnific',  'statusquo-slick','statusquo-sticky' ), '', true);
}

add_action('wp_enqueue_scripts', 'statusquo_scripts');
//-------------------------------------------------------------------------------------------------------------


// Включаем различные опции
function statusquo_setup()
{	
	add_theme_support('custom-logo');//Подключение поля штатного логотипа	
	add_theme_support('title-tag');//Поддержка вывода заголовка		 
	add_theme_support('post-thumbnails');//Поддержка превью картинок постов	

	// Регистрация зоны меню
	register_nav_menus(
		[
			'top' => 'Основное меню в header',
			'down' => 'Меню в footer'
		]
	);
}

add_action('after_setup_theme', 'statusquo_setup');
//-------------------------------------------------------------------------------------------------------------


// Регистрация нового типа записи (Услуги)
function registerServices()
{
	register_post_type('services', array(
		'labels'                 => array(
			'name'               => 'Все услуги', // Основное название типа записи
			'singular_name'      => 'Услуга', // отдельное название записи 
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую Услугу',
			'edit_item'          => 'Редактировать Услугу',
			'new_item'           => 'Новая Услуга',
			'view_item'          => 'Посмотреть Услугу',
			'search_items'       => 'Найти Услугу',
			'not_found'          =>  'Услуг не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Услуги'
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,		
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' 		 => array('category') // Добавляем возможность присваивать рубрики записи

	));
}

add_action('init', 'registerServices');

// Добавляем возможность вывода произвольных записей в рубрике наряду с дефолтными
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query)
{
	if (is_category()) {
		$post_type = get_query_var('post_type');
		if ($post_type)
			$post_type = $post_type;
		else
			$post_type = array('nav_menu_item', 'post', 'services', 'articles', 'faq');
		$query->set('post_type', $post_type);
		return $query;
	}
}
//-------------------------------------------------------------------------------------------------------------

// Регистрация нового типа записи (Статьи)
function registerArticles()
{
	register_post_type('articles', array(
		'labels'                 => array(
			'name'               => 'Все статьи', // Основное название типа записи
			'singular_name'      => 'Статья', // отдельное название записи 
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую Статью',
			'edit_item'          => 'Редактировать Статью',
			'new_item'           => 'Новая Статья',
			'view_item'          => 'Посмотреть Статью',
			'search_items'       => 'Найти Статью',
			'not_found'          =>  'Статей не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Статьи'
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,		
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' 		 => array('category') // Добавляем возможность присваивать рубрики записи
	));
}

add_action('init', 'registerArticles');


//-------------------------------------------------------------------------------------------------------------

// Регистрация нового типа записи (Вопросы)
function registerFaq()
{
	register_post_type('faq', array(
		'labels'                 => array(
			'name'               => 'Все вопросы', // Основное название типа записи
			'singular_name'      => 'Вопрос', // отдельное название записи 
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый Вопрос',
			'edit_item'          => 'Редактировать Вопрос',
			'new_item'           => 'Новый Вопрос',
			'view_item'          => 'Посмотреть Вопрос',
			'search_items'       => 'Найти Вопросы',
			'not_found'          =>  'Вопросов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Вопросы'
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,		
		'supports'           => array('title'),
        'taxonomies' 		 => array('category') // Добавляем возможность присваивать рубрики записи
	));
}

add_action('init', 'registerFaq');


//-------------------------------------------------------------------------------------------------------------
// Регистрация нового типа записи (Вопросы)
function registerReviews()
{
	register_post_type('reviews', array(
		'labels'                 => array(
			'name'               => 'Все отзывы', // Основное название типа записи
			'singular_name'      => 'Отзыв', // отдельное название записи 
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый Отзыв',
			'edit_item'          => 'Редактировать Отзыв',
			'new_item'           => 'Новый Отзыв',
			'view_item'          => 'Посмотреть Отзыв',
			'search_items'       => 'Найти Отзывы',
			'not_found'          =>  'Отзывов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Отзывы'
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,		
		'supports'           => array('title', 'editor')        
	));
}

add_action('init', 'registerReviews');


//-------------------------------------------------------------------------------------------------------------


//Поддержка SVG
add_filter('wp_check_filetype_and_ext', 'filter_function_name_497', 10, 4);
function filter_function_name_497($type_and_ext, $file, $filename, $mimes)
{
	// загружается файл с расширением .svg
	if ('.svg' === strtolower(substr($filename, -4))) {

		$filesize = filesize($file) / 1024; // КБ

		// разрешим
		if ($filesize < 50 && current_user_can('manage_options')) {
			$type_and_ext['ext']  = 'svg';
			$type_and_ext['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$type_and_ext['ext'] = $type_and_ext['type'] = false;
		}
	}
	return $type_and_ext;
}

add_filter('upload_mimes', 'upload_allow_types');
function upload_allow_types($mimes)
{
	$mimes['svg']  = 'image/svg+xml'; // image/svg+xml
	return $mimes;
}
//-------------------------------------------------------------------------------------------------------------


// Удаление "лишних" тегов span, p, br contact form7
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function ($content) 
{
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	return $content;
});
//-------------------------------------------------------------------------------------------------------------


// Меняем разделитель в тайтле
add_filter('document_title_separator', function () 
{
	return ' | ';
});
//-------------------------------------------------------------------------------------------------------------


// Убираем теги р при выводе the_content и the_excerpt
// remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
//-------------------------------------------------------------------------------------------------------------


// Удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
//-------------------------------------------------------------------------------------------------------------


// Создание шаблона записи определенной категории
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
			return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
		return $the_template;' )
);
//-----------------------------------------------------------------------------------------------------


// Создание своего размера картинки
add_image_size( 'true-fullwd', 806, 400 );
add_image_size( 'true-fullwd1', 889, 372 );
 
add_filter('image_size_names_choose', 'true_new_image_sizes');
 
function true_new_image_sizes($sizes) {
	$addsizes = array(
		"true-fullwd" => 'Для страницы с отдельной услугой',
		"true-fullwd1" => 'Для страницы с отдельной статьей'
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
//-----------------------------------------------------------------------------------------------------


// Запрет на удаление тегов span визуальным редакторм
function wph_add_all_elements($init) {
    if(current_user_can('unfiltered_html')) {
        $init['extended_valid_elements'] = 'span[*],div[*]';
    }
    return $init;
}
add_filter('tiny_mce_before_init', 'wph_add_all_elements', 20);
//-----------------------------------------------------------------------------------------------------












/*
НАСТРОЙКИ ТЕМЫ КАСТОМНЫЕ
---------------------------------------------------------------------------------------------------------
*/

## Удаление табов "Все рубрики" и "Часто используемые" из метабоксов рубрик (таксономий) на странице редактирования записи.
add_action('admin_print_footer_scripts', 'hide_tax_metabox_tabs_admin_styles', 99);
function hide_tax_metabox_tabs_admin_styles()
{
	$cs = get_current_screen();
	if ($cs->base !== 'post' || empty($cs->post_type)) return; // не страница редактирования записи
	?>
	<style>
		.postbox div.tabs-panel {
			max-height: 1200px;
			border: 0;
		}

		.category-tabs {
			display: none;
		}
	</style>
<?php
}
## Добавляет миниатюры записи в таблицу записей в админке
if (1) {
	add_action('init', 'add_post_thumbs_in_post_list_table', 20);
	function add_post_thumbs_in_post_list_table()
	{
		// проверим какие записи поддерживают миниатюры
		$supports = get_theme_support('post-thumbnails');

		// $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно

		// Определяем типы записей автоматически
		if (!isset($ptype_names)) {
			if ($supports === true) {
				$ptype_names = get_post_types(array('public' => true), 'names');
				$ptype_names = array_diff($ptype_names, array('attachment'));
			}
			// для отдельных типов записей
			elseif (is_array($supports)) {
				$ptype_names = $supports[0];
			}
		}

		// добавляем фильтры для всех найденных типов записей
		foreach ($ptype_names as $ptype) {
			add_filter("manage_{$ptype}_posts_columns", 'add_thumS_column');
			add_action("manage_{$ptype}_posts_custom_column", 'add_thumS_value', 10, 2);
		}
	}

	// добавим колонку
	function add_thumS_column($columns)
	{
		// подправим ширину колонки через css
		add_action('admin_notices', function () {
			echo '
			<style>
				.column-thumbnail{ width:80px; text-align:center; }
			</style>';
		});

		$num = 1; // после какой по счету колонки вставлять новые

		$new_columns = array('thumbnail' => __('Thumbnail'));

		return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
	}

	// заполним колонку
	function add_thumS_value($colname, $post_id)
	{
		if ('thumbnail' == $colname) {
			$width  = $height = 45;

			// миниатюра
			if ($thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true)) {
				$thumb = wp_get_attachment_image($thumbnail_id, array($width, $height), true);
			}
			// из галереи...
			elseif ($attachments = get_children(array(
				'post_parent'    => $post_id,
				'post_mime_type' => 'image',
				'post_type'      => 'attachment',
				'numberposts'    => 1,
				'order'          => 'DESC',
			))) {
				$attach = array_shift($attachments);
				$thumb = wp_get_attachment_image($attach->ID, array($width, $height), true);
			}

			echo empty($thumb) ? ' ' : $thumb;
		}
	}
}
/***************************************************************************************************** */
