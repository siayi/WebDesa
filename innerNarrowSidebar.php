	<div id="narrowSidebar">
		<?php 
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('InnerNarrowSidebar1') ) :
			endif; 
				
			if(is_single()) {
				if($trns_options['enShareSingle'] == 1) { 
					gab_share(); 
				}
			} 
			
			if (is_page()) {
				if($trns_options['enSharePage'] == 1) { 
					gab_share(); 
				}
			}
		?>
		
		<?php if($trns_options['enArc'] == 1) { ?>
			<div class="widget">
				<h3 class="widget_sTitle_b"><?php _e('Arsip','Transcript'); ?></h3>
				<ul>
		 			<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
		<?php } ?>	
				
		<div class="t_center marginbottom">
			<?php
				if(file_exists(TEMPLATEPATH . '/ads/innerpage_120x600/'.$currentcat.'.php') && (is_single() || is_category())) {
					include_once(TEMPLATEPATH . '/ads/innerpage_120x600/'.$currentcat.'.php');
				}
				else {
					include_once(TEMPLATEPATH . '/ads/innerpage_120x600.php');
				}
			?>
		</div>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('InnerNarrowSidebar2') ) : ?>
		<?php endif; ?>
	</div>
