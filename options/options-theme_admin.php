<?php
/*-------------------------------------------------------------
НАСТРОЙКИ ТЕМЫ
---------------------------------------------------------------*/

// Удаление табов "Все рубрики" и "Часто используемые" из метабоксов рубрик (таксономий) на странице редактирования записи.
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

// Показ текущей рубрики на своем месте, а не в верху списка
add_filter('wp_terms_checklist_args', 'set_checked_ontop_default', 10);
function set_checked_ontop_default($args)
{
    if (!isset($args['checked_ontop']))
        $args['checked_ontop'] = false;

    return $args;
}


// Добавление колонки с ID ПОСТОВ (страниц) в админку 
add_filter('manage_pages_columns', 'my_ats_id', 5);               // для страниц
add_action('manage_pages_custom_column', 'my_ats_custom', 5, 2);  // для страниц
add_filter('manage_posts_columns', 'my_ats_id', 5);               // для записей
add_action('manage_posts_custom_column', 'my_ats_custom', 5, 2);  // для записей

function my_ats_id($args)
{
    $args['post_page_id'] = 'ID';
    return $args;
}
function my_ats_custom($column, $id)
{
    if ($column === 'post_page_id') {
        echo $id;
    }
}

// Добавление колонки с ID рубрик и меток в админку 
add_filter("manage_edit-category_columns", 'add_my_ats_columns');           // для обычных рубрик
add_filter("manage_category_custom_column", 'fill_my_ats_columns', 10, 3);
add_filter("manage_edit-post_tag_columns", 'add_my_ats_columns');
add_filter("manage_post_tag_custom_column", 'fill_my_ats_columns', 10, 3);  // для обычных тегов

function add_my_ats_columns($columns)
{
    $column_id = array('id' => 'ID');
    $columns = array_slice($columns, 0, 1, true) + $column_id + array_slice($columns, 1, NULL, true);
    return $columns;
}
//  добавим отображение самой инфы о идентификаторе рубрик и меток
function fill_my_ats_columns($out, $column_name, $id)
{
    switch ($column_name) {
        case 'id':
            $out .= $id;
            break;
        default:
            break;
    }
    return $out;
}



// ACF создаем  отображение  рубрик и их значений ( дополнительный параметр категории ) 
add_action('admin_init', 'asp_acf_new_condition');
function asp_acf_new_condition()
{
	add_filter('acf/location/rule_types', 'asp_location_rules_types');
	function asp_location_rules_types($choices)
	{
		$key = __('Forms', 'acf');
		if (!isset($choices[$key])) {
			$choices[$key] = [];
		};
		$choices[$key]['category_id'] = __('Category');
		return $choices;
	}
	// Формируем список значений которые может принимать правило
	add_filter('acf/location/rule_values/category_id', 'asp_location_rules_values_category_id');
	function asp_location_rules_values_category_id($choices)
	{
		$terms = get_terms([
			'taxonomy' => 'category',
			'hide_empty' => false,
		]);
		if ($terms) {
			foreach ($terms as $term) {
				$choices[$term->term_id] = $term->name;
			}
		}
		return $choices;
	}
	// Отображение ACF поля в нужном экране админки
	add_filter('acf/location/rule_match/category_id', 'asp_location_rules_match_category_id', 10, 3);
	function asp_location_rules_match_category_id($match, $rule, $options)
	{
		$screen = get_current_screen();

		if ($screen->base !== 'term' || $screen->id !== 'edit-category') {
			return $match;
		}
		$term_id = $_GET['tag_ID'];
		$select_term = $rule['value'];

		if ($rule['operator'] === '==') {
			$match = ($term_id == $select_term);
		} elseif ($rule['operator'] === '!=') {
			$match = ($term_id != $select_term);
		}
		return $match;
	}
}


