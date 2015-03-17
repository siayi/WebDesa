<?php get_header(); ?>
	<div id="innerLeft">	
		<div class="post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<h1 class="singlePageTitle"><?php the_title(); ?></h1>
			
			<?php edit_post_link(__('Edit This Post','WebDesa'),'<p>','</p>'); ?>
						
			<?php /* If there is an attached video in FLV format*/ $key3 = 'videoflv'; $gab_flv = get_post_meta($post->ID, $key3, TRUE); if($gab_flv != '') { ?>
				<p>
					<a href="<?php echo get_post_meta($post->ID, 'videoflv', true); ?>" style="display:block;width:500px;height:280px" id="player1"></a> 
					<script language="javascript"> 
						flowplayer("player1", "<?php bloginfo(template_url); ?>/includes/js/flowplayer-3.1.5.swf",{ 
						clip: { 
						    autoPlay: false, 
							autoBuffering: true, 
						} 
						});
					</script> 
				</p>
			<?php } ?>	
			
			<?php /* If there is an attached video in SWF format */ $key1 = 'video'; $gab_video = get_post_meta($post->ID, $key1, TRUE); if($gab_video != '') { ?>
				<p>
					<object type="application/x-shockwave-flash" style="width:500px; height:280px;" data="<?php echo get_post_meta($post->ID, 'video', true); ?>">
					<param name="wmode" value="opaque" /><param name="movie" value="<?php echo get_post_meta($post->ID, 'video', true); ?>" /></object> 
				</p>
			<?php } ?>
		
			<?php 
				the_content();
				wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %');
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PageWidget') ) :
				endif;
			?>
				
			<div class="clear"></div>

			<?php edit_post_link(__('Edit This Post','WebDesa'),'<p>','</p>'); ?>
		
			<?php endwhile; else : endif; ?>
		</div><!-- /post -->

	</div><!-- /innerLeft -->
	
	<?php include (TEMPLATEPATH . '/innerNarrowSidebar.php'); ?>

	<?php include (TEMPLATEPATH . '/innerWideSidebar.php'); ?>

	<div class="clear"></div>

</div><!-- enf od wrapper -->

<?php get_footer(); ?>

</body>
</html>
