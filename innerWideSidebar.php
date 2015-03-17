<div id="wideSidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('innerwideSidebar1') ) : ?>
	<?php endif; ?>

	<div class="widget">
		<?php
			if(file_exists(TEMPLATEPATH . '/ads/innerpage_350x250/'.$currentcat.'.php') && (is_single() || is_category())) {
				include_once(TEMPLATEPATH . '/ads/innerpage_350x250/'.$currentcat.'.php');
			}
			else {
				include_once (TEMPLATEPATH . '/ads/innerpage_300x250.php');
			}
		?>
	</div><!-- /widget -->
	
	<?php 
		if(is_single() && !is_attachment) {
			if($trns_options['enMorePosts'] == 1) { 
				gab_moreHeadlines(); 
			}
		} 
	?>
	
	<?php if($trns_options['enRecComments'] == 1) { ?>
		<div class="widget">
			<h3 class="widget_sTitle"><?php _e('Tanggapan Terbaru','Transcript'); ?></h3>
			<ul>
				<?php get_mrecent_comments(); ?>
			</ul>
		</div><!-- /widget -->
	<?php } ?>
	
	<?php if($trns_options['enRecAdded'] == 1) { ?>
		<div class="widget">	
			<h3 class="widget_sTitle"><?php _e('Tulisan Terbaru','Transcript'); ?></h3>
			<ul>
				<?php get_archives('postbypost','10'); ?>
			</ul>
		</div><!-- /widget -->	
	<?php } ?>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('innerwideSidebar2') ) : ?>	
	<?php endif; ?>
</div>
