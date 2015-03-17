		<?php 
		if (have_posts()) : while (have_posts()) : the_post();			
		$gab_video = get_post_meta($post->ID, 'video', TRUE); /* Custom field video check */
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE); /* Custom field thumbnail check */
		$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */			
		 ?>
		<div class="post">
			<h1 class="archiveTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						
			<?php /* If there is an attached video in FLV format*/ if($gab_flv != '') { ?>
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
			
			<?php /* If there is an attached video in SWF format */ if($gab_video != '') { ?>
				<p>
					<object type="application/x-shockwave-flash" style="width:500px; height:280px;" data="<?php echo get_post_meta($post->ID, 'video', true); ?>">
					<param name="wmode" value="opaque" /><param name="movie" value="<?php echo get_post_meta($post->ID, 'video', true); ?>" /></object> 
				</p>
			<?php } ?>
			
			<?php 
				if($trns_options['arcPostType'] == 0) { 
					the_excerpt();
				} 
				elseif($trns_options['arcPostType'] == 1) { 
					if(($gab_video != '') or ($gab_flv != '')) { 
						gab_media(array(
							'name' => 'archive', 
							'enable_video' => '0',
							'enable_thumb' => '0',
							'media_width' => '90',
							'media_height' => '65',
							'thumb_align' => 'alignleft',
							'enable_default' => '0',
							'default_name' => 'archive.jpg'
						)); 
					} else {
						gab_media(array(
							'name' => 'archive', 
							'enable_video' => '0',
							'enable_thumb' => '1',
							'media_width' => '90',
							'media_height' => '65',
							'thumb_align' => 'alignleft',
							'enable_default' => $trns_options["enthumb_15"],
							'default_name' => 'archive.jpg'
						)); 
					}
					the_excerpt();
				} else {
					the_content(); 
				}
			?>
				
			<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %'); ?>				
			
			<div class="clear"></div>

			<p class="metas">
				<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormatA"]) ?> | <?php } ?><?php _e('Posted in','WebDesa'); ?> <?php the_category(',') ?> | <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('...baca selengkapnya &raquo;','WebDesa'); ?></a>
			</p>	
			
		</div><!-- /cat_post -->
		
		<?php endwhile; else : endif; ?>
