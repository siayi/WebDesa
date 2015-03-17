<?php get_header(); ?>
	<div id="innerLeft">	
		<div class="post">
			<?php 
			if (have_posts()) : while (have_posts()) : the_post(); 
			$do_not_duplicate = $post->ID;
			?>
			<div class="metasingle">
				<span class="postDate"><?php the_time($trns_options["dateFormatS"]) ?></span> | <span class="postAuthor"><?php _e('Posted by','WebDesa'); ?> <?php the_author_posts_link(); ?></span> <?php edit_post_link('Edit',' | ',''); ?>
			</div><!-- /metas -->
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

				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PostWidget') ) :

				endif;

			?>

			

			<?php if($trns_options['enshorturl'] == 1) { ?>

				<p><small><strong><?php _e('Short URL','WebDesa'); ?></strong>: <?php echo get_bloginfo('url')."/?p=".$post->ID; ?></small></p>

			<?php } ?>

			

			<div class="clear"></div>



			<?php edit_post_link(__('Edit This Post','WebDesa'),'<p>','</p>'); ?>



			<?php if($trns_options['enpostmeta'] == 1)  { ?>

				<div id="entryMeta">

					<?php echo get_avatar( get_the_author_email(), '39' ); ?>

					<?php _e('Posted by','WebDesa'); ?>  <?php the_author_posts_link(); ?> 

					<?php /* This is commented, because it requires a little adjusting sometimes.

						You'll need to download this plugin, and follow the instructions:

						http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */

						/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>

					<?php _e('on','WebDesa'); ?> <?php the_time($trns_options["dateFormat"]); ?>. <?php _e('Filed under','WebDesa'); ?> <?php the_category(', ') ?>.

					<?php _e('You can follow any responses to this entry through the','WebDesa'); ?> <?php comments_rss_link('RSS 2.0'); ?>.

					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

						// Both Comments and Pings are open ?>

					<?php _e('You can leave a response or trackback to this entry','WebDesa'); ?>

					<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

						// Only Pings are Open ?>

					<?php _e('Responses are currently closed, but you can trackback from your own site.','WebDesa'); ?>

					<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

						// Comments are open, Pings are not ?>

					<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','WebDesa'); ?>

					<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

						// Neither Comments, nor Pings are open ?>

					<?php _e('Both comments and pings are currently closed.','WebDesa'); ?>

					<?php } ?>	

					<div class="clear"></div>	

				</div>

			<?php } ?>

		

			<?php endwhile; else : endif; ?>

		</div><!-- /post -->

		<div id="postcomments">

		<?php comments_template(); ?>

		</div>

	</div><!-- /innerLeft -->

	

	<?php include (TEMPLATEPATH . '/innerNarrowSidebar.php'); ?>



	<?php include (TEMPLATEPATH . '/innerWideSidebar.php'); ?>



	<div class="clear"></div>

</div><!-- enf od wrapper -->



<?php get_footer(); ?>



</body>

</html>

