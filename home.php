<?php get_header(); ?> 
	<div id="primaryTopWrapper">
		<div id="featuredContent">
			<div id="paginate-featured-slider"></div>
			<?php if (intval($trns_options["feaPostCount"]) > 0 ) { ?>
				<!-- featured entries -->
				<div id="featured-slider" class="sliderwrapper">
					<?php 
					$count = 1;
					$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["feaPostCount"].'&cat='.$trns_options["featuredCatID"]); 
					while ($gabquery->have_posts()) : $gabquery->the_post();
					?>
					<div class="contentdiv">
						<div class="sliderPostPhoto">

							<?php 
							gab_media(array(
								'name' => 'featured', 
								'enable_video' => '1', 
								'enable_thumb' => '1', 
								'media_width' => '342', 
								'media_height' => '256', 
								'thumb_align' => 'alignnone', 
								'enable_default' => $trns_options["enthumb_1"],
								'default_name' => 'featured.jpg'
								)); 
							?>

							<?php if (($gab_flv == '') and ($gab_video == ''))  { ?>
								<div class="sliderPostInfo">
									<h2 class="featuredTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
								</div>
							<?php } ?>
						</div><!-- end of sliderphoto/video -->

						<!-- Slider Post Excerpt -->
						<div class="featuredPost lastPost">
							<p>
								<?php if($trns_options['enableAName'] == 1) { ?>
									<span class="author"><?php the_author_posts_link(); ?></span> 
								<?php } ?>
								
								<?php if($trns_options['enableDate'] == 1) { ?>
									<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
								<?php } ?>
								
								<?php print string_limit_words(get_the_excerpt(), 28); ?>&hellip;
							</p>
							
							<span class="featuredPostMeta">
								<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
							</span>
						</div><!-- end of featuredpost (post excerpt) -->
						
					</div><!-- end of contentdiv -->
					<?php $count++; endwhile; wp_reset_query(); ?>
				</div><!-- end of #featured-slider -->

				<script type="text/javascript">
					featuredcontentslider.init({
						id: "featured-slider", //id of main slider DIV
						contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
						toc: "#increment", //Valid values: "#increment", "markup", ["label1", "label2", etc]
						nextprev: ["Sebelumnya", "Berikutnya"], //labels for "prev" and "next" links. Set to "" to hide.
						revealtype: "<?php if($trns_options['revealtype'] == 1) { echo 'click'; } else { echo 'mouseover'; } ?>", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
						enablefade: [true, 0.4], //[true/false, fadedegree]
						autorotate: [<?php if($trns_options['feaautorotate'] == 1) { echo 'true'; } else { echo 'false'; } ?>, <?php if ( $trns_options["fearotatepause"] <> "" ) { echo $trns_options["fearotatepause"].'000'; } else { echo '5000'; } ?>], //[true/false, pausetime]
						onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
							//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
							//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
						}
					})
				</script>
				<!-- End of featured slider -->
			<?php } ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryLeft1') ) : ?>	
			<?php endif; ?>
			
			<!-- Entries below the featured section -->

			<?php if (intval($trns_options["fea2PostCount"]) > 0 ) { ?>
				<div id="belowfeatured">
				<?php 
				$count=1;
				$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["fea2PostCount"].'&cat='.$trns_options["fea2CatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
					<div class="featuredPost<?php if ($count == $trns_options["fea2PostCount"]) { echo " lastPost"; } ?>">

						<?php if ($count == 1) { ?>
							<span class="titleCatName">
								<a href="<?php echo get_category_link($trns_options["fea2CatID"]);?>"><?php echo get_cat_name($trns_options["fea2CatID"]); ?></a>
							</span>
						<?php } ?>
						
						<h2 class="postTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?><?php _e(' &raquo;','WebDesa'); ?></a></h2>
						
						<?php 
						gab_media(array(
							'name' => 'below_featured', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '70', 
							'media_height' => '70', 
							'thumb_align' => 'alignleft', 
							'enable_default' => $trns_options["enthumb_2"],
							'default_name' => 'below_featured.jpg'
							)); 
						?>
					
						<p>
							<?php if($trns_options['enableAName'] == 1) { ?>
								<span class="author"><?php the_author_posts_link(); ?></span> 
							<?php } ?>
							
							<?php if($trns_options['enableDate'] == 1) { ?>
								<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
							<?php } ?>
							
							<?php echo string_limit_words(get_the_excerpt(), 33); ?>&hellip;
						</p>
						
						<span class="featuredPostMeta">
							<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
				</div>
			<?php } ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryLeft2') ) : ?>	
			<?php endif; ?>
			<!-- End of entries below the featured section -->
		</div><!-- Enf of featuredContent -->
		
		<div id="midColPosts">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryMid1') ) : ?>	
			<?php endif; ?>
			
			<?php if (intval($trns_options["fea3PostCount"]) > 0 ) { ?>
				<!-- Entries on middle column on the right side of Featured section -->
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["fea3PostCount"].'&cat='.$trns_options["fea3CatID"]);
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
					<div class="featuredPost<?php if ($count == $trns_options["fea3PostCount"]) { echo " lastPost"; } ?>">
					
						<?php if ($count == 1) { ?>
							<span class="titleCatName">
								<a href="<?php echo get_category_link($trns_options["fea3CatID"]);?>"><?php echo get_cat_name($trns_options["fea3CatID"]); ?></a>
							</span>
						<?php } ?>
						
						<h2 class="postTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?><?php _e(' &raquo;','WebDesa'); ?></a></h2>
						
						<?php 
						gab_media(array(
							'name' => 'primary_midcol', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '60', 
							'media_height' => '45', 
							'thumb_align' => 'alignright', 
							'enable_default' => $trns_options["enthumb_3"],
							'default_name' => 'primary_midcol.jpg'
							)); 
						?>
						
						<p>
							<?php if($trns_options['enableAName'] == 1) { ?>
								<span class="author"><?php the_author_posts_link(); ?></span> 
							<?php } ?>
							
							<?php if($trns_options['enableDate'] == 1) { ?>
								<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
							<?php } ?>
							
							<?php echo string_limit_words(get_the_excerpt(), 19); ?>&hellip;
						</p>
						
						<span class="featuredPostMeta">
							<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
				<!-- End of entries on middle column on the right side of Featured section -->
			<?php } ?>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryMid2') ) : ?>	
			<?php endif; ?>
		</div><!-- End of midColPosts -->
		
		<div id="primaryTopSidebar">
		
			<?php include (TEMPLATEPATH . '/mainpage-topsidebar.php'); ?>
			
		</div><!-- End of rightColAd -->
		
		<div class="clear"></div>
	</div><!-- End of PrimaryWrapper (Featured block + Mid colum block + 120+600 ad) -->

	<!-- PHOTO GALLERY -->
	<?php if($trns_options['enablePhotoGallery'] == 1) { ?>
		<div id="mediabar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Media_Bar') ) : ?>
				<h2 class="widget_title"><a href="<?php echo get_category_link($trns_options["photoGalCatID"]);?>"><?php echo get_cat_name($trns_options["photoGalCatID"]); ?></a></h2>		
				<div id="previous_button"></div>
				<div id="next_button"></div>

				<div class="container">
					<ul>
						<?php
						$count =1;
						$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["postCountPhotoBar"].'&cat='.$trns_options["photoGalCatID"]); 
						while ($gabquery->have_posts()) : $gabquery->the_post(); 
						?>
						<li class="car">
							<div class="thumb">		
								<?php 
								gab_media(array(
									'name' => 'mainpage_photogal', 
									'enable_video' => '1', 
									'enable_thumb' => '1', 
									'media_width' => '150', 
									'media_height' => '113', 
									'thumb_align' => 'alignnone', 
									'enable_default' => $trns_options["enthumb_4"],
									'default_name' => 'mainpage_photogal.jpg'
									)); 
								?>
							</div>
					
							<div class="info">
								<p><?php the_title(); ?></p>
								<?php if (($gab_flv !== '') || ($gab_video !== ''))  { ?>
									<p class="moreVideo"><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Play Video','WebDesa'); ?></a></p>
								<?php } else { ?>
									<p class="morePhoto"><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo ','WebDesa'); ?></a></p>
								<?php } ?>
							</div>
						</li>
						<?php $count++; endwhile; wp_reset_query(); ?>
					</ul>
				</div>
			<?php endif; ?>
		</div><!-- end of Mediabar -->
		<script type="text/javascript">
			(function($) { $(document).ready(function(){
				$("#mediabar .container").jCarouselLite({
					<?php if($trns_options['midautorotate'] == 1){ ?>
						auto:<?php if ( $trns_options["midpausetime"] <> "" ) { echo $trns_options["midpausetime"].'000'; } else { echo '5000'; } ?>,
					<?php } ?>
					scroll: <?php if ( $trns_options["midscroll"] <> "" ) { echo $trns_options["midscroll"]; } else { echo '4'; } ?>,
					speed: <?php if ( $trns_options["midspeed"] <> "" ) { echo $trns_options["midspeed"].'000'; } else { echo '2000'; } ?>,	
					visible: 6,
					start: 0,
					circular: false,
					btnPrev: "#previous_button",
					btnNext: "#next_button"
				});
			})})(jQuery)	
		</script>
	<?php } ?>	

	<?php if($trns_options['enablePrBotTabs'] == 1) { ?>
		<!-- PRIMARY BOTTOM -->
		<div id="primaryBottom">
			<div id="primaryBottomSidebar">
				<?php
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryBottomAd') ) : 
				endif;
				include (TEMPLATEPATH . '/ads/mainpage_300x250mid.php'); 
				?>
			</div>
			<div id="primaryBottomTabs">	
				<ul id="primaryBottomTabs_title">
					<li><a href="#" class="selected" rel="priBotTab1"><?php if ( $trns_options["tabA1"] <> "" ) { echo $trns_options["tabA1"]; } else { echo get_cat_name($trns_options["pribottom1"]); } ?></a></li>
					<li><a href="#" rel="priBotTab2"><?php if ( $trns_options["tabA2"] <> "" ) { echo $trns_options["tabA2"]; } else { echo get_cat_name($trns_options["pribottom2"]); } ?></a></li>
					<li><a href="#" rel="priBotTab3"><?php if ( $trns_options["tabA3"] <> "" ) { echo $trns_options["tabA3"]; } else { echo get_cat_name($trns_options["pribottom3"]); } ?></a></li>
					<li><a href="#" rel="priBotTab4"><?php if ( $trns_options["tabA4"] <> "" ) { echo $trns_options["tabA4"]; } else { echo get_cat_name($trns_options["pribottom4"]); } ?></a></li>
					<li><a href="#" rel="priBotTab5"><?php if ( $trns_options["tabA5"] <> "" ) { echo $trns_options["tabA5"]; } else { echo get_cat_name($trns_options["pribottom5"]); } ?></a></li>
				</ul>
				<div id="primaryBottomTabs_body">
					<!-- Tab 1 -->
					<div id="priBotTab1">
						<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryBottomTab1') ) :
						$gabquery = new WP_Query();$gabquery->query('showposts=1&cat='.$trns_options["pribottom1"]); 
						while ($gabquery->have_posts()) : $gabquery->the_post(); 
						?>
							<div class="text">
								<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> &raquo;</a></h2>
								
								<p>
									<?php if($trns_options['enableAName'] == 1) { ?>
										<span class="author"><?php the_author_posts_link(); ?></span> 
									<?php } ?>
									
									<?php if($trns_options['enableDate'] == 1) { ?>
										<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
									<?php } ?>
									
									<?php print string_limit_words(get_the_excerpt(), 55); ?>&hellip;
								</p>
								
								<div class="clear"></div>
								
								<span class="featuredPostMeta">
									<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
								</span>
								
							</div><!-- /text -->
							<div class="imgThumb">
								<?php 
								gab_media(array(
									'name' => 'primarybottomtabs', 
									'enable_video' => '1', 
									'enable_thumb' => '1', 
									'media_width' => '269', 
									'media_height' => '201', 
									'thumb_align' => 'alignright', 
									'enable_default' => $trns_options["enthumb_5"],
									'default_name' => 'primary_bottomtabs1.jpg'
									)); 
								?>
							</div>
						<?php endwhile; wp_reset_query(); endif; ?>
					</div><!-- /priBotTab1 -->
					
					<!-- Tab 2 -->
					<div id="priBotTab2">
						<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryBottomTab2') ) :
						$gabquery = new WP_Query();$gabquery->query('showposts=1&cat='.$trns_options["pribottom2"]); 
						while ($gabquery->have_posts()) : $gabquery->the_post(); 
						?>
							<div class="text">
								<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> &raquo;</a></h2>
								
								<p>
									<?php if($trns_options['enableAName'] == 1) { ?>
										<span class="author"><?php the_author_posts_link(); ?></span> 
									<?php } ?>
									
									<?php if($trns_options['enableDate'] == 1) { ?>
										<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
									<?php } ?>
									
									<?php print string_limit_words(get_the_excerpt(), 55); ?>&hellip;
								</p>
								
								<div class="clear"></div>
								
								<span class="featuredPostMeta">
									<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
								</span>
								
							</div><!-- /text -->
							<div class="imgThumb">
								<?php 
								gab_media(array(
									'name' => 'primarybottomtabs', 
									'enable_video' => '1', 
									'enable_thumb' => '1', 
									'media_width' => '269', 
									'media_height' => '201', 
									'thumb_align' => 'alignright', 
									'enable_default' => $trns_options["enthumb_6"],
									'default_name' => 'primary_bottomtabs2.jpg'
									)); 
								?>
							</div>
						<?php endwhile; wp_reset_query(); endif; ?>
					</div><!-- /priBotTab2 -->
				
					<!-- Tab 3 -->
					<div id="priBotTab3">
						<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryBottomTab3') ) :
						$gabquery = new WP_Query();$gabquery->query('showposts=1&cat='.$trns_options["pribottom3"]); 
						while ($gabquery->have_posts()) : $gabquery->the_post(); 
						?>
							<div class="text">
								<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> &raquo;</a></h2>
								
								<p>
									<?php if($trns_options['enableAName'] == 1) { ?>
										<span class="author"><?php the_author_posts_link(); ?></span> 
									<?php } ?>
									
									<?php if($trns_options['enableDate'] == 1) { ?>
										<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
									<?php } ?>
									
									<?php print string_limit_words(get_the_excerpt(), 55); ?>&hellip;
								</p>
								
								<div class="clear"></div>
								
								<span class="featuredPostMeta">
									<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
								</span>
								
							</div><!-- /text -->
							<div class="imgThumb">
								<?php 
								gab_media(array(
									'name' => 'primarybottomtabs', 
									'enable_video' => '1', 
									'enable_thumb' => '1', 
									'media_width' => '269', 
									'media_height' => '201', 
									'thumb_align' => 'alignright', 
									'enable_default' => $trns_options["enthumb_7"],
									'default_name' => 'primary_bottomtabs3.jpg'
									)); 
								?>
							</div>
						<?php endwhile; wp_reset_query(); endif; ?>
					</div><!-- /priBotTab3 -->			
					
					<!-- Tab 4 -->
					<div id="priBotTab4">
						<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryBottomTab4') ) :
						$gabquery = new WP_Query();$gabquery->query('showposts=1&cat='.$trns_options["pribottom4"]); 
						while ($gabquery->have_posts()) : $gabquery->the_post(); 
						?>
							<div class="text">
								<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> &raquo;</a></h2>
								
								<p>
									<?php if($trns_options['enableAName'] == 1) { ?>
										<span class="author"><?php the_author_posts_link(); ?></span> 
									<?php } ?>
									
									<?php if($trns_options['enableDate'] == 1) { ?>
										<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
									<?php } ?>
									
									<?php print string_limit_words(get_the_excerpt(), 55); ?>&hellip;
								</p>
								
								<div class="clear"></div>
								
								<span class="featuredPostMeta">
									<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
								</span>
								
							</div><!-- /text -->
							<div class="imgThumb">
								<?php 
								gab_media(array(
									'name' => 'primarybottomtabs', 
									'enable_video' => '1', 
									'enable_thumb' => '1', 
									'media_width' => '269', 
									'media_height' => '201', 
									'thumb_align' => 'alignright', 
									'enable_default' => $trns_options["enthumb_8"],
									'default_name' => 'primary_bottomtabs4.jpg'
									)); 
								?>
							</div>
						<?php endwhile; wp_reset_query(); endif; ?>
					</div><!-- /priBotTab4 -->
					
					<!-- Tab 5 -->
					<div id="priBotTab5">
						<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryBottomTab5') ) :
						$gabquery = new WP_Query();$gabquery->query('showposts=1&cat='.$trns_options["pribottom5"]); 
						while ($gabquery->have_posts()) : $gabquery->the_post(); 
						?>
							<div class="text">
								<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> &raquo;</a></h2>
								
								<p>
									<?php if($trns_options['enableAName'] == 1) { ?>
										<span class="author"><?php the_author_posts_link(); ?></span> 
									<?php } ?>
									
									<?php if($trns_options['enableDate'] == 1) { ?>
										<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
									<?php } ?>
									
									<?php print string_limit_words(get_the_excerpt(), 55); ?>&hellip;
								</p>
								
								<div class="clear"></div>
								
								<span class="featuredPostMeta">
									<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
								</span>
								
							</div><!-- /text -->
							<div class="imgThumb">
								<?php 
								gab_media(array(
									'name' => 'primarybottomtabs', 
									'enable_video' => '1', 
									'enable_thumb' => '1', 
									'media_width' => '269', 
									'media_height' => '201', 
									'thumb_align' => 'alignright', 
									'enable_default' => $trns_options["enthumb_9"],
									'default_name' => 'primary_bottomtabs5.jpg'
									)); 
								?>
							</div>
						<?php endwhile; wp_reset_query(); endif; ?>
					</div><!-- /priBotTab5 -->
					
				</div><!-- /primaryBottomTabs_body -->
				<script type="text/javascript">
					var primaryBottomTabs=new ddtabcontent("primaryBottomTabs")
					primaryBottomTabs.setpersist(true)
					primaryBottomTabs.setselectedClassTarget("link")
					primaryBottomTabs.init()
				</script>
			</div>
			<div class="clear"></div>
		</div><!-- End of primaryBottom -->
	<?php } ?>	
	
	<div class="clear"></div>

	<div id="secondaryContentWrapper">
		<div id="leftBottomContent">
		
			<?php
			$sec1stbox = $trns_options['postCstopbox1'] + $trns_options['postCstopbox2'] + $trns_options['postCstopbox3'];
			if (intval($sec1stbox) > 0 ) {
			?>	
				<!-- secondary content left - top box -->
				<div class="bottomBox">
					<h2 class="secondaryCTitle">
						<a href="<?php echo get_category_link($trns_options["stopbox"]);?>">
							<?php if ( $trns_options["stopboxTitle"] <> "" ) { echo $trns_options["stopboxTitle"]; } else { echo get_cat_name($trns_options["stopbox"]); } ?>
						</a>
					</h2>
					
					<div class="bottomBox_wide left">
					
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryTopLeft') ) : ?>
						<?php endif; ?>
						
						<?php if (intval($trns_options["postCstopbox1"]) > 0 ) {
							$count =1;
							$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["postCstopbox1"].'&cat='.$trns_options["stopbox"]); 
							while ($gabquery->have_posts()) : $gabquery->the_post(); 
							?>
								<div class="thumb">
									<?php 
									gab_media(array(
										'name' => 'sbox_topleft', 
										'enable_video' => '1', 
										'enable_thumb' => '1', 
										'media_width' => '294', 
										'media_height' => '221', 
										'thumb_align' => 'alignnone', 
										'enable_default' => $trns_options["enthumb_10"],
										'default_name' => 'sbox_topleft.jpg'
										)); 
									?>
								</div>
								
								<div class="featuredPost<?php if ($count == $trns_options["postCstopbox1"]) { echo " lastPost"; } ?>">
									<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
									<p>
										<?php if($trns_options['enableAName'] == 1) { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
										
										<?php if($trns_options['enableDate'] == 1) { ?>
											<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
										<?php } ?>
										
										<?php print string_limit_words(get_the_excerpt(), 30); ?>&hellip;
									</p>
									
									<div class="clear"></div>
									
									<span class="featuredPostMeta">
										<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
									</span>
									
								</div><!-- /featuredPost -->
							<?php $count++; endwhile; wp_reset_query(); ?>
						<?php } ?>		
					</div><!-- /bottomBox_wide -->
				
					<!-- secondary content left - bottom box -->
					<div class="bottomBox_narrow right">
					
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryTopRight') ) : ?>
						<?php endif; ?>
						
						<?php 
						$showpostTop = $trns_options["postCstopbox2"] + $trns_options["postCstopbox3"]; 
						if (intval($showpostTop) > 0 ) { 
							$count =1;
							$gabquery = new WP_Query();$gabquery->query('offset='.$trns_options["postCstopbox1"].'&showposts='.$showpostTop.'&cat='.$trns_options["stopbox"]); 
							while ($gabquery->have_posts()) : $gabquery->the_post(); 
				
								if ($count <= $trns_options["postCstopbox2"]) { ?>
								<div class="featuredPost<?php if ($count == $trns_options["postCstopbox2"]) { echo " lastPost marginbottom"; } ?>">
									<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
									
									<?php 
									gab_media(array(
										'name' => 'sbox_topright', 
										'enable_video' => '0', 
										'enable_thumb' => '1', 
										'media_width' => '55', 
										'media_height' => '55', 
										'thumb_align' => 'alignright', 
										'enable_default' => $trns_options["enthumb_11"],
										'default_name' => 'sbox_topright.jpg'
										)); 
									?>

									<p>
										<?php if($trns_options['enableAName'] == 1) { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
										
										<?php if($trns_options['enableDate'] == 1) { ?>
											<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
										<?php } ?>
										
										<?php print string_limit_words(get_the_excerpt(), 22); ?>&hellip;
									</p>
									
									<div class="clear"></div>
									
									<span class="featuredPostMeta">
										<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
									</span>
								</div>
								
								<?php } else { ?>
									<a class="list" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a>
								<?php } ?>
							<?php $count++; endwhile; wp_reset_query(); ?>
						<?php } ?>
					</div><!-- /bottomBox_narrow -->
				</div><!-- /bottomBox -->
			<?php } ?>
			
			<?php
			$sec2ndbox = $trns_options['postCsbotbox1'] + $trns_options['postCsbotbox2'] + $trns_options['postCsbotbox3'];
			if (intval($sec2ndbox) > 0 ) { 
			?>	
				<div class="bottomBox">
					<h2 class="secondaryCTitle">
						<a href="<?php echo get_category_link($trns_options["sbotbox"]);?>">
							<?php if ( $trns_options["sbotboxTitle"] <> "" ) { echo $trns_options["sbotboxTitle"]; } else { echo get_cat_name($trns_options["sbotbox"]); } ?>
						</a>
					</h2>
				
					<div class="bottomBox_narrow left">
					
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryBottomLeft') ) : ?>
						<?php endif; ?>
						
						<?php 
						$showpostBot = $trns_options["postCsbotbox2"] + $trns_options["postCsbotbox3"]; 
						if (intval($showpostTop) > 0 ) { 				
							$count =1;
							$gabquery = new WP_Query();$gabquery->query('offset='.$trns_options["postCsbotbox1"].'&showposts='.$showpostBot.'&cat='.$trns_options["sbotbox"]); 
							while ($gabquery->have_posts()) : $gabquery->the_post(); 
				
								if ($count <= $trns_options["postCsbotbox2"]) { ?>
								<div class="featuredPost<?php if ($count == $trns_options["postCsbotbox2"]) { echo " lastPost marginbottom"; } ?>">
								
									<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
									
									<?php 
									gab_media(array(
										'name' => 'sbox_botleft', 
										'enable_video' => '0', 
										'enable_thumb' => '1', 
										'media_width' => '55', 
										'media_height' => '55', 
										'thumb_align' => 'alignleft', 
										'enable_default' => $trns_options["enthumb_12"],
										'default_name' => 'sbox_botleft.jpg'
										)); 
									?>

									<p>
										<?php if($trns_options['enableAName'] == 1) { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
										
										<?php if($trns_options['enableDate'] == 1) { ?>
											<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
										<?php } ?>
										
										<?php print string_limit_words(get_the_excerpt(), 22); ?>&hellip;
									</p>
									
									<div class="clear"></div>
									
									<span class="featuredPostMeta">
										<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
									</span>
								</div>
								
								<?php } else { ?>
									<a class="list" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a>
								<?php } ?>
							<?php $count++; endwhile; wp_reset_query(); ?>
						<?php } ?>				
					</div><!-- /bottomBox_narrow -->					
				
					<div class="bottomBox_wide right">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryBottomRight') ) : ?>
						<?php endif; ?>
						<?php if (intval($trns_options["postCsbotbox1"]) > 0 ) {
							$count =1;
							$gabquery = new WP_Query();$gabquery->query('showposts='.$trns_options["postCsbotbox1"].'&cat='.$trns_options["sbotbox"]); 
							while ($gabquery->have_posts()) : $gabquery->the_post(); 
							?>
								<div class="thumb">
									<?php 
									gab_media(array(
										'name' => 'sbox_botright', 
										'enable_video' => '1', 
										'enable_thumb' => '1', 
										'media_width' => '294', 
										'media_height' => '221', 
										'thumb_align' => 'alignnone', 
										'enable_default' => $trns_options["enthumb_13"],
										'default_name' => 'sbox_botright.jpg'
										)); 
									?>
								</div>
								<div class="featuredPost<?php if ($count == $trns_options["postCsbotbox1"]) { echo " lastPost"; } ?>">
									<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
									<p>
										<?php if($trns_options['enableAName'] == 1) { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
										
										<?php if($trns_options['enableDate'] == 1) { ?>
											<span class="date"><?php the_time($trns_options["timeFormat"]); ?> | </span>
										<?php } ?>
										
										<?php print string_limit_words(get_the_excerpt(), 30); ?>&hellip;
									</p>
									
									<div class="clear"></div>
									
									<span class="featuredPostMeta">
										<?php if($trns_options['displayDate'] == 1) { ?><?php the_time($trns_options["dateFormat"]); ?> / <?php } ?><?php if($trns_options['displayComment'] == 1) { ?><?php comments_popup_link(__('No Comment','WebDesa'), __('1 Comment','WebDesa'), __('% Comments','WebDesa'));?> / <?php } ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... Baca Selengkapnya &raquo  &raquo;','WebDesa'); ?></a><?php edit_post_link(__('Edit','WebDesa'),' / ',''); ?>
									</span>
								</div><!-- /featuredPost -->
							<?php $count++; endwhile; wp_reset_query(); ?>
						<?php } ?>
					</div><!-- /bottomBox_wide -->
				</div><!-- /bottomBox -->
			<?php } ?>
		</div><!-- /leftBottomContent -->

		<?php include (TEMPLATEPATH . '/mainpage-bottomsidebar.php'); ?>
	</div><!-- end of secondarycontentwrapper -->

	<div class="clear"></div>

</div><!-- end of wrapper -->

<?php get_footer(); ?>
<!-- 67b4c3cfb776e4177b9e059e3cf8ed1d -->
</body>
</html>
