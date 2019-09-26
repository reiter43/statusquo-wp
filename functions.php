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
	wp_enqueue_script('statusquo-script', S_JS_DIR . '/script.js', array('statusquo-jquery', 'statusquo-form', 'statusquo-masked', 'statusquo-magnific',  'statusquo-slick', 'statusquo-sticky'), '', true);
}

add_action('wp_enqueue_scripts', 'statusquo_scripts');
//-------------------------------------------------------------------------------------------------------------




// Включаем различные опции
function statusquo_setup()
{
	add_theme_support('custom-logo'); //Подключение поля штатного логотипа	
	add_theme_support('title-tag'); //Поддержка вывода заголовка		 
	add_theme_support('post-thumbnails'); //Поддержка превью картинок постов	

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


// Меняем разделитель в тайтле
add_filter('document_title_separator', function () {
	return ' | ';
});
//-------------------------------------------------------------------------------------------------------------


// Убираем теги р при выводе the_content и the_excerpt
// remove_filter('the_content', 'wpautop');
// remove_filter('the_excerpt', 'wpautop');
//-------------------------------------------------------------------------------------------------------------


// Создание шаблона записи определенной категории
add_filter('single_template', 'cat_single_temp');

function cat_single_temp($the_template)
{
	foreach ((array) get_the_category() as $cat) {
		if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php"))
			return TEMPLATEPATH . "/single-{$cat->slug}.php";
	}
	return $the_template;
};
//-----------------------------------------------------------------------------------------------------


// Создание своего размера картинки
add_image_size('true-fullwd', 806, 400);
add_image_size('true-fullwd1', 889, 372);

add_filter('image_size_names_choose', 'true_new_image_sizes');

function true_new_image_sizes($sizes)
{
	$addsizes = array(
		"true-fullwd" => 'Для страницы с отдельной услугой',
		"true-fullwd1" => 'Для страницы с отдельной статьей'
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
//-----------------------------------------------------------------------------------------------------


// Запрет на удаление тегов span визуальным редактором
// function wph_add_all_elements($init) {
//     if(current_user_can('unfiltered_html')) {
//         $init['extended_valid_elements'] = 'span[*],div[*]';
//     }
//     return $init;
// }
// add_filter('tiny_mce_before_init', 'wph_add_all_elements', 20);
//-----------------------------------------------------------------------------------------------------


// Запрет на создание копий картинок 
add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');

function delete_intermediate_image_sizes($sizes)
{
	// размеры которые нужно удалить
	return array_diff($sizes, array(
		'medium_large',
		'large',
	));
}
//-----------------------------------------------------------------------------------------------------




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


// Регистрация нового типа записи (Отзывы)
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


// Регистрация нового типа записи (Сотрудники)
function registerworkers()
{
	register_post_type('workers', array(
		'labels'                 => array(
			'name'               => 'Все сотрудники', // Основное название типа записи
			'singular_name'      => 'Сотрудник', // отдельное название записи 
			'add_new'            => 'Добавить нового',
			'add_new_item'       => 'Добавить нового сотрудника',
			'edit_item'          => 'Редактировать сотрудника',
			'new_item'           => 'Новый Сотрудник',
			'view_item'          => 'Посмотреть Сотрудника',
			'search_items'       => 'Найти Сотрудника',
			'not_found'          =>  'Сотрудников не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Сотрудники'
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
		'supports'           => array('title', 'editor', 'thumbnail')
	));
}

add_action('init', 'registerworkers');


//-------------------------------------------------------------------------------------------------------------




get_template_part('options/options', 'function_custom');
get_template_part('options/options', 'theme_admin');
