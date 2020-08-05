<article class="post post-full card bg-white shadow-sm border-0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header text-center">
		<?php if(is_category()) {
				$cat = get_query_var('cat');
				$yourcat = get_category($cat);
				}
				?>
		<a class="post-title" href="<?php get_category_link($cat); ?>"><?php echo $yourcat->cat_name; ?></a>
		
	</header>

	<div class="post-content" id="post_content">
		<?php
			$POST = $GLOBALS['post'];
			echo "<div class='argon-timeline'>";
			$last_year = 0;
			$posts = get_posts('numberposts=-1&category='.$cat.'&orderby=post_date&order=DESC');
			foreach ($posts as $post){
					setup_postdata($post);
					$year = mysql2date('Y', $post -> post_date);
					if ($year != $last_year){
						echo "<div class='argon-timeline-node'>
								<div class='argon-timeline-time archive-timeline-year'>" . $year . "</div>
								<div class='argon-timeline-card card bg-gradient-secondary archive-timeline-title'></div>
							</div>";
							$last_year = $year;
					} ?>
					<div class='argon-timeline-node'>
						<div class='argon-timeline-time'><?php echo mysql2date('m-d', $post -> post_date); ?></div>
						<div class='argon-timeline-card card bg-gradient-secondary archive-timeline-title'>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
					</div>
				<?php
			}
			echo '</div>';
			$GLOBALS['post'] = $POST;
		?>
	</div>

	<?php if (has_tag()) { ?>
		<div class="post-tags">
			<i class="fa fa-tags" aria-hidden="true"></i>
			<?php
				$tags = get_the_tags();
				foreach ($tags as $tag) {
					echo "<a href='" . get_category_link($tag -> term_id) . "' target='_blank' class='tag badge badge-secondary post-meta-detail-tag'>" . $tag -> name . "</a>";
				}
			?>
		</div>
	<?php } ?>
</article>