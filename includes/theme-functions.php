<?php
//Call post excerpt
function string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function gab_share() {
	global $post;
	echo ' 
		<div class="widget">
			<h3 class="widget_sTitle_b">';_e('Share It','WebDesa'); echo '</h3>
			<ul>
				<li class="digg"><a href="http://digg.com/submit?phase=2&url=';the_permalink(); echo'&title=';the_title(); echo'">';_e('Digg It','WebDesa'); echo '</a></li>
				<li class="delicious"><a href="http://del.icio.us/post?url=';the_permalink(); echo'&title=';the_title(); echo'">';_e('Del Icio Us','WebDesa'); echo '</a></li>
				<li class="fb"><a href="http://www.facebook.com/share.php?u=';the_permalink(); echo'&t=';the_title(); echo'">';_e('Add to Facebook','WebDesa'); echo '</a></li>
				<li class="google"><a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=';the_permalink(); echo'&title=';the_title(); echo'">';_e('Google Bookmarks','WebDesa'); echo '</a></li>
				<li class="stumble"><a href="http://www.stumbleupon.com/submit?url=';the_permalink(); echo'&title=';the_title(); echo'">';_e('Stumble It','WebDesa'); echo '</a></li>
				<li class="twitter"><a href="http://twitter.com/home?status=';the_title(); echo' - ';echo get_bloginfo('url')."/?p=".$post->ID; echo'">';_e('Twitter','WebDesa'); echo '</a></li>
				<li class="reddit"><a href="http://reddit.com/submit?url=';the_permalink(); echo'">';_e('Add to Reddit','WebDesa'); echo '</a></li>
				<li class="print"><a href="javascript:window.print();">';_e('Print This Post','WebDesa'); echo '</a></li>
			</ul>
		</div>';
}

function gab_moreHeadlines() {
	global $post, $gabquery, $currentcat, $do_not_duplicate;
	echo'
	<div class="widget">
		<h3 class="widget_sTitle">';_e('More on ','WebDesa'); echo get_cat_name($currentcat); echo'</h3>
		<ul>';
			$gabquery = new WP_Query();$gabquery->query('showposts=10&cat='.$currentcat); 
			while ($gabquery->have_posts()) : $gabquery->the_post();
			if( $post->ID == $do_not_duplicate ) continue;
			echo'<li><a href="';the_permalink(); echo'" rel="bookmark">';the_title(); echo'</a></li>';
			endwhile; wp_reset_query(); echo'
		</ul>
	</div><!-- /widget -->';
}

// Create gab_media function
	function call_flv ($parameters){
		global $post, $gab_flv;
			$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */
			echo '
				<a href="'.get_post_meta($post->ID, 'videoflv', true).'" style="display:block;width:'.$parameters['media_width'].'px;height:'.$parameters['media_height'].'px" id="'.$parameters['name'].$post->ID.'"></a> 
				<script language="javascript"> 
					$f("'.$parameters['name'].$post->ID.'", {src: ';
					bloginfo('template_url');
					echo '/includes/js/flowplayer-3.1.5.swf\', wmode: \'opaque\'}, {
					clip: { 
					autoPlay: false, 
					autoBuffering: true, 
					} 
					});
				</script>';
	}
	function call_swf ($parameters){
		global $post, $gab_video;
		$gab_video = get_post_meta($post->ID, 'video', TRUE);
		echo '
			<object type="application/x-shockwave-flash" style="width:'.$parameters['media_width'].'px; height:'.$parameters['media_height'].'px;" data="'.get_post_meta($post->ID, 'video', true).'">
			<param name="wmode" value="opaque" /><param name="movie" value="'.get_post_meta($post->ID, 'video', true).'" /></object>'; 
	}
	function call_cfield ($parameters){
		global $post;
		echo '
			<a href="';the_permalink(); echo '">
				<img src="';bloginfo('template_url'); echo '/timthumb.php?src='.get_post_meta($post->ID, 'thumbnail', true).'&amp;h=&amp;q=90&amp;w='.$parameters['media_width'].'&amp;h='.$parameters['media_height'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" width="'.$parameters['media_width'].'" height="'.$parameters['media_height'].'" alt="';the_title(''); echo '" />
			</a>';
	}
	function call_post_thumb ($parameters){
		global $post, $gab_thumb;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		echo '
			<a href="';the_permalink(); echo '">';
				the_post_thumbnail($parameters['name'], array('class' => $parameters['thumb_align'])).'';
			echo'</a>';
	}
	function call_default_thumb ($parameters){
		global $post;
		echo '
			<a href="';the_permalink(); echo '">
				<img src="'; bloginfo('template_url'); echo '/images/thumbs/'.$parameters['default_name'].'" alt="" class="'.$parameters['thumb_align'].'" />
			</a>';
	}
		
	function gab_media($parameters) {
		global $post,$gab_video,$gab_thumb,$gab_flv;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		$gab_video = get_post_meta($post->ID, 'video', TRUE);
		$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */
		
		if($gab_flv != '' and $parameters['enable_video'] == 1) { 
			call_flv ($parameters);
		}
		
		elseif ($gab_video != '' and $parameters['enable_video'] == 1 ) { 
			call_swf ($parameters);
		}
		
		elseif($gab_thumb !== '' and $parameters['enable_thumb'] == 1) { 
			call_cfield ($parameters);
		}
		
		elseif ( has_post_thumbnail() and $parameters['enable_thumb'] == 1 ) { 
			call_post_thumb ($parameters);
		} 
		
		else {  
			if($parameters['enable_default'] == 1) {
				call_default_thumb ($parameters);
			} 
		}
	}

?>
