<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryRight1') ) : ?>	
<?php endif; ?>
			
<?php include (TEMPLATEPATH . '/ads/home_300x250_top.php'); ?>

<h2 class="widget_title"><?php _e('TERBARU','Transcript'); ?></h2>
<div id="sidebarTabs">
	<ul id="sidebarTabs_title">
		<li><a href="#" class="selected" rel="sidebarTabs_newly_added"><?php _e('Tulisan','Transcript'); ?></a></li>
		<li><a href="#" rel="sidebarTabs_commented"><?php _e('Komentar','Transcript'); ?></a></li>
	</ul>

	<div id="sidebarTabs_body">
		<ol id="sidebarTabs_newly_added">
			<?php get_archives('postbypost',$trns_options["recentPosts"]); ?>
		</ol>

		<ol id="sidebarTabs_commented">
			<?php get_mrecent_comments(); ?>	
		</ol>
	</div><!-- /sidebarTabs_body -->
					
	<script type="text/javascript">
	var sidebarTabs=new ddtabcontent("sidebarTabs")
	sidebarTabs.setpersist(true)
	sidebarTabs.setselectedClassTarget("link")
	sidebarTabs.init()
	</script>
</div><!-- /sidebarTabs -->

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryRight2') ) : ?>	
<?php endif; ?>
