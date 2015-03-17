<?php global $trns_options, $currentcat; ?>
<div id="footer">
	<div id="footer_data">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer1stRow') ) : ?>	
			<?php /* NAV MENU 3 */
				if ( $trns_options["nav3name"] <> "" ) { 
					wp_nav_menu( array('depth' => '1', 'menu' => $trns_options["nav3name"]));
				} else { ?>
				<ul>
					<li class="first"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a></li>
					<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=&exclude='.$trns_options["excludePageFot"]); ?>
					<li><a href="<?php if ( $trns_options["feedURL"] <> "" ) { echo $trns_options["feedURL"]; } else { echo get_bloginfo_rss('rss2_url'); } ?>" rel="nofollow" title="<?php _e('Subscribe to latest posts in RSS','WebDesa'); ?>"><?php _e('RSS','WebDesa'); ?></a></li>			
				</ul>
			 <?php } ?>
		<?php endif; ?>	
	<p class="copyrights">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer2ndRow') ) : ?>	
		<?php endif; ?>
		<!--[if lte IE 8]><span style="filter: FlipH; -ms-filter: "FlipH"; display: inline-block;"><![endif]-->
<span style="-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1); transform: scaleX(-1); display: inline-block;">
    ©
</span>
<!--[if lte IE 8]></span><![endif]--> 2009 - <?php echo date('Y'); ?> 
		Seluruh konten dalam website <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> ini berlisensi <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" title="CC-BY-SA-NC">CC-BY-SA-NC</a>. 
		<?php wp_loginout(); ?>
		<?php wp_footer(); ?> - 
		<?php if ( is_user_logged_in() ) { ?>  
		<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php">Manage</a> -
		<a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php">Write New Post</a> - <?php } ?>
		Designed by <a href="http://www.facebook.com/Desa.Ciburial" title="Desa Ciburial hoyong Mandiri">Desa Ciburial Mandiri</a>
		
	</p>
	</div><!-- /footer_data -->
	<div id="footer_logo">
			<?php if($trns_options['enableLogoFot'] == 1) { ?>
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo(description); ?>">
					<img src="<?php echo $trns_options["logoUrlFot"]; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
				</a>
			<?php } ?>
	</div><!-- /footer_logo -->
	<div class="clear"></div>
</div><!-- /footer -->
<?php echo $trns_options["stattracker"]; ?>
<script type="text/javascript">
document.write(unescape("%3Cscript type='text/javascript' src='" + (("https:" == document.location.protocol) ? "https://ssl" : "http://t") + ".visitstreamer.com/vs.js'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {var _vsTracker = _vs.createTracker("28s-QoJupvJyz"); _vsTracker.trackPageview();}catch(e){}
</script>
<noscript><div><a href="http://www.visitstreamer.com"><img alt="Real-time web tracking by Visit Streamer" width="1" height="1" src="//28s.s.visitstreamer.com/s28s-QoJupvJyz.gif" /></a></div></noscript>
