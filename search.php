<?php get_header(); ?>
	<div id="innerLeft">	
	
		<div id="bcrum">
			<span class="labelBC"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a> &raquo; <?php _e('Hasil Pencarian dalam Arsip','WebDesa'); ?></span>
			<span class="locationBC"><?php _e('Hasil Pencarian untuk:','WebDesa'); ?> <strong>&#8220;<?php echo wp_specialchars($s, 1); ?>&#8221;</strong></span>				
		</div>	
	
		<?php include (TEMPLATEPATH . '/archive-default.php'); ?>

		<div class="navigation">
			<?php posts_nav_link(); ?>
		</div>		
		
	</div><!-- /innerLeft -->
	
	<?php include (TEMPLATEPATH . '/innerNarrowSidebar.php'); ?>

	<?php include (TEMPLATEPATH . '/innerWideSidebar.php'); ?>

	<div class="clear"></div>

</div><!-- enf od wrapper -->

<?php get_footer(); ?>

</body>
</html>
