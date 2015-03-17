<?php get_header(); ?>
	<div id="innerLeft">	
	
		<div id="bcrum">		
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				<?php /* If this is a category archive */ if (is_category()) { ?>
				<span class="labelBC"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a> &raquo; <?php single_cat_title(); ?></span>
				<span class="locationBC"><?php _e('Posting dalam kategori','WebDesa'); ?> <strong>&#8220;<?php single_cat_title(); ?>&#8221;</strong></span>
				
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<span class="labelBC"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a> &raquo; <?php single_tag_title(); ?></span>
				<span class="locationBC"><?php _e('Posting dalam tag','WebDesa'); ?> <strong>&#8220;<?php single_tag_title(); ?>&#8221;</strong></span>
							
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<span class="labelBC"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a></a> &raquo; <?php the_time($trns_options["dateFormatA"]) ?></span>
				<span class="locationBC"><?php _e('Entri dalam','WebDesa'); ?> <strong>&#8220;<?php the_time('F jS, Y'); ?>&#8221;</strong></span>
						
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<span class="labelBC"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a></a> &raquo; <?php the_time($trns_options["dateFormatA"]) ?></span>
				<span class="locationBC"><?php _e('Entri dalam','WebDesa'); ?> <strong>&#8220;<?php the_time('F, Y'); ?>&#8221;</strong></span>
							
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<span class="labelBC"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a></a> &raquo; <?php the_time($trns_options["dateFormatA"]) ?></span>
				<span class="locationBC"><?php _e('Entri dalam','WebDesa'); ?> <strong>&#8220;<?php the_time('Y'); ?>&#8221;</strong></span>
						
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<span class="locationBC"><strong>&#8220;<?php _e('Author Archive','WebDesa'); ?>&#8221;</strong></span>
			<?php } ?>		
		</div>
		
		<?php if (is_author()) { ?>
			<div class="gab_authorInfo">
				<?php global $wp_query; $curauth = $wp_query->get_queried_object(); ?>
				<div class="gab_authorPic">
					<?php echo get_avatar( $curauth->user_email, '50' ); ?>
				</div>
				<strong><?php _e('Stories written by','WebDesa'); ?> <?php echo $curauth->nickname; ?></strong><br /><?php echo $curauth->description; ?>
				<div class="clear"></div>
			</div>			
		<?php } ?>
	
		<?php if ($trns_options["catmediaID"] <> "" && is_category(explode(',',$trns_options['catmediaID']))) {
			include (TEMPLATEPATH . '/archive-media.php'); 
			} else {
			include (TEMPLATEPATH . '/archive-default.php'); } 
		?>
		
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
