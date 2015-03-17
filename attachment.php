<?php get_header(); ?>
	<div id="innerLeft">	
		<div class="post attachmentPage">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="metasingle">
				<span class="postDate"><?php the_time($trns_options["dateFormatS"]) ?></span> | <span class="postAuthor"><?php _e('Posted by','WebDesa'); ?> <?php the_author_posts_link(); ?></span> <?php edit_post_link('Edit',' | ',''); ?>
			</div><!-- /metas -->
			
			<h1 class="singlePageTitle"><?php the_title(); ?></h1>

			<?php if (wp_attachment_is_image($post->id)) {$att_image = wp_get_attachment_image_src( $post->id, "full");}?>

			<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-full" alt="<?php $post->post_excerpt; ?>" />
		
			<div class="attachment-nav">
				<?php previous_image_link( false, __('&laquo; Previous Image','WebDesa')); ?> | <a href="<?php echo get_permalink($post->post_parent); ?>"><?php _e('Back to Post','WebDesa'); ?></a> | <?php next_image_link( false, __('Next Image &raquo;','WebDesa')); ?>
			</div>
				
			<div class="clear"></div>
			
			<?php
				$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'order' => 'ASC',
				'post_parent' => $post->post_parent);
				$attachments = get_posts($args);

				if ($attachments) 
				{
				  foreach ($attachments as $attachment) 
				  {
					echo '<div class="attachment_more"><a href="'.get_attachment_link($attachment->ID, false).'">'.wp_get_attachment_image($attachment->ID, 'thumbnail').'</a></div>';
				  }
				}
			?>
	
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
