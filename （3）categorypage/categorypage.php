<?php 
/*
Template Name: 独立分类页面
*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
				get_template_part( 'template-parts/content', 'categorypage' );

				if (get_option("argon_show_sharebtn") != 'false') {
					get_template_part( 'template-parts/share' );
				}

				if (comments_open() || get_comments_number()) {
					comments_template();
				}
		?>

<?php get_footer(); ?>