<?php global $trns_options; ?>
<div id="home_sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('BottomSidebar1') ) : ?>	
	<?php endif; ?>

	<?php if (intval($trns_options["postCssidenews"]) > 0 ) { ?>
		<div class="home_sidebarPosts">
			<h2 class="secondaryCTitle">
				<a href="<?php echo get_category_link($trns_options["ssidenews"]);?>">
					<?php if ( $trns_options["sideNewsTitle"] <> "" ) { echo $trns_options["sideNewsTitle"]; } else { echo get_cat_name($trns_options["ssidenews"]); } ?>
				</a>
			</h2>
			<ul>
				<?php 
				$count=1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["postCssidenews"].'&cat='.$trns_options["ssidenews"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
				<li<?php if ($count == $trns_options["postCssidenews"]) { ?> class="last"<?php } ?>>
					

					<div class="entry">
						<?php 
						gab_media(array(
							'name' => 'sidebar_posts', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '80', 
							'media_height' => '85', 
							'thumb_align' => 'alignleft', 
							'enable_default' => $trns_options["enthumb_14"],
							'default_name' => 'sidebar_posts.jpg'
							)); 
						?>
					
						<h2 class="sidebarPostTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						<p>
							<?php if($trns_options['enableAName'] == 1) { ?>
								<span class="author"><?php the_author_posts_link(); ?></span>
							<?php } ?> 
							
							<?php if($trns_options['enableDate'] == 1) { ?>
								<span class="date"><?php the_time($trns_options["timeFormat"]) ?></span>
							<?php } ?>
						</p>
						
						<p>
							<?php print string_limit_words(get_the_excerpt(), 8); ?>
						</p>
						
					</div>
				</li>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</ul>
		</div><!-- /home_sidebarPosts -->
	<?php } ?>

	<div class="home_sidebar_ads">
		<?php include (TEMPLATEPATH . '/ads/mainpage_300x250bottom.php'); ?>	
	</div><!-- /home_sidebar_ads -->
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('BottomSidebar2') ) : ?>	
	<?php endif; ?>
</div><!-- enf od home_sidebar -->
