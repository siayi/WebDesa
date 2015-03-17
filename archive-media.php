<div class="post">
	<?php 
	$count = 1;
	if (have_posts()) : while (have_posts()) : the_post();			
	$gab_video = get_post_meta($post->ID, 'video', TRUE); /* Custom field video check */
	$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE); /* Custom field thumbnail check */
	$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */			
	 ?>
		<div class="photoFrame">
			<h2 class="titleMediaCat"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				
			<div class="thumb">
				<?php	
					gab_media(array(
						'name' => 'archive_media', 
						'enable_video' => '1',
						'enable_thumb' => '1',
						'media_width' => '234',
						'media_height' => '200',
						'thumb_align' => 'alignnone arc_media',
						'enable_default' => 1,
						'default_name' => 'archive_media.jpg'
					));
				?>
			</div>
			
			<span class="postinfoPhotoCat"><?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormatA"]); ?>  | <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Permalink','WebDesa'); ?></a></span>
		</div>
	<?php $count++; endwhile; else : endif; ?>	
	<div class="clear"></div>	
</div>


