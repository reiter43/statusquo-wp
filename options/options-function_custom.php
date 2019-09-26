<?php

// Функция, назначающая класс меню
function class_by_header()
{
	if (is_page(array(8, 17, 229, 23, 239)) || (in_category('service') && is_single())) {
		echo 'white';
	}
}
//-----------------------------------------------------------------------------------------------------



// Функция фильтрации по категориям и разделам
function filter_categories()
{
	if (is_page(239)) {
		$categories = get_categories(array('child_of' => '21', 'orderby' => 'slug'));
		foreach ($categories as $category) {
			echo '<a data-fill="' . $category->term_taxonomy_id  . '">' . $category->name . '</a>';
		}
	} elseif (is_page(17)) {
		$categories = get_categories(array('child_of' => '24', 'orderby' => 'slug'));
		foreach ($categories as $category) {
			echo '<li><a data-fill="' . $category->term_taxonomy_id  . '">' . $category->name . '</a></li>';
		}
	} elseif (is_page(6)) {
		$categories = get_categories(array('child_of' => '26'));

		foreach ($categories as $category) {setup_postdata($category);
			?>

			<?php $number = get_field('number_catserviece', $category); ?>
			<a href="<?php echo get_category_link($category->term_id); ?>">
				<p><?php echo $number; ?></p>
				<h4><?php echo $category->name; ?></h4>
			</a>

			<?php
		}	
		wp_reset_postdata();				
	} elseif (is_page(8)) {
		$categories = get_categories(array('child_of' => '26'));
		foreach ($categories as $category) {setup_postdata($category);
			?>

			<div class="serv-item">
				<?php $number = get_field('number_catserviece', $category); ?>
				<div>
					<span><?php echo $number; ?></span>
					<h4><?php echo $category->name; ?></h4>
					<p><?php echo $category->category_description; ?></p>
					<a href="<?php echo get_category_link($category->term_id); ?>" class="ref">подробнее об услуге</a>
				</div>
				<span>
					<?php
					global $post;
					$args = array('post_type' => "services", 'order' => 'ASC', 'category_name' => $category->slug);
					$myposts = get_posts($args);

					foreach ($myposts as $post) {setup_postdata($post);
						?>

						<a href="<?php the_permalink(); ?>">
							<h6><?php the_title(); ?></h6>
							<b>от <?php the_field('price_service'); ?></b>
						</a>

						<?php
					}
					wp_reset_postdata();
					?>
				</span>
			</div>

			<?php
		}
		wp_reset_postdata();		
	}
}
//-----------------------------------------------------------------------------------------------------


// Функция, выводящая список услуг на главной

function home_out_listservice()
{
	$categories = get_categories(array('child_of' => '26'));
	foreach ($categories as $category) {setup_postdata($category);
		?>

		<div>
			<?php $number = get_field('number_catserviece', $category); ?>
			<p><?php echo $number; ?></p>
			<h4><?php echo $category->name; ?></h4>
			<ul>
				<?php
				global $post;
				$args = array('post_type' => "services",'order' => 'ASC','category_name' => $category->slug);
				$myposts = get_posts($args);

				foreach ($myposts as $post) {setup_postdata($post);
					?>

					<li><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></li>

					<?php				
				}
				wp_reset_postdata();
				?>
			</ul>
		</div>

		<?php
	}
	wp_reset_postdata();	
}
//-----------------------------------------------------------------------------------------------------


// Функция выводящая список статей
function out_articles()
{
	if (is_page(239)) {
		global $post;
		$args = array('post_type' => "articles",'numberposts' => -1,'publish'   => true,'order' => "ASC");
		$myposts = get_posts($args);

		foreach ($myposts as $post) {setup_postdata($post);
			get_template_part('template-parts/content', 'post_article_all');
		}
		wp_reset_postdata();
	} else {
		global $post;
		$args = array('post_type' => "articles",'numberposts' => 4,	'publish'   => true,'order' => "DESC");
		$myposts = get_posts($args);

		foreach ($myposts as $post) {setup_postdata($post);
			get_template_part('template-parts/content', 'post_article_all');
		}
		wp_reset_postdata();
	}
}
//-----------------------------------------------------------------------------------------------------



