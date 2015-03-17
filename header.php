<?php global $trns_options, $currentcat, $themeinfo; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="p:domain_verify" content="7c9f74cd36f84ea01e6190afff361859"/>
	<meta name="msvalidate.01" content="D3B78A1BF0EF39F4025E4C38C892728B" />
	<title>
		<?php if(is_home() ) { bloginfo('name'); ?> | <?php bloginfo('description'); } ?>
		<?php if(is_single() || is_page() || is_archive() || is_tag() || is_category() ) { wp_title('',true); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_404()) { ?> <?php _e('404 Error! Page Not Found','WebDesa'); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_search()) { ?><?php _e('Search results for:','WebDesa'); ?> <?php echo wp_specialchars($s, 1); ?> | <?php bloginfo('name'); } ?>
	</title>
<!-- BAvPxFmcWNMWcOn7kBSVZMOxqa4 -->
	<style type="text/css" media="screen">@import url( <?php bloginfo('stylesheet_url'); ?> );</style>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $trns_options["style"]; ?>.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/custom.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/print.css" type="text/css"  media="print" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( $trns_options["feedlink"] <> "" ) { echo $trns_options["feedlink"]; } else { echo bloginfo('rss2_url'); } ?>" />	
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php if ( $trns_options["feedlink"] <> "" ) { echo $trns_options["feedlink"]; } else { echo bloginfo('rss_url'); } ?>" />	
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	
	<?php wp_get_archives('type=monthly&format=link'); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

	<script type="text/javascript">
		Cufon.replace('.titleCatName');
		Cufon.replace('.widgetbgTitle');
		Cufon.replace('#comments');
		Cufon.replace('#leaveComment');
	</script>
</head>

<body>

<?php /* Define id number of current category for category based advertisement */
	if(is_category() || is_single()) {
		$category = get_the_category();
		$currentcat = $category[0]->cat_ID;
	}
?>

<?php if($trns_options['enable728'] == 1) { ?>
	<div id="topad">
		<?php
			if(file_exists(TEMPLATEPATH . '/ads/sitewide_728x90/'.$currentcat.'.php') && (is_single() || is_category())) {
				include_once(TEMPLATEPATH . '/ads/sitewide_728x90/'.$currentcat.'.php');
			}
			else {
				include_once(TEMPLATEPATH . '/ads/sitewide_728x90.php');
			}
		?>
	</div>
<?php } ?>

<div id="wrapper">

	<div id="masthead"></div>
	
	<div id="header">
		<?php if($trns_options['headerimage'] == 1) { ?>
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo(description); ?>">
				<img src="<?php echo $trns_options["himageurl"]; ?>" style="maximum-width:970px;" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
			</a>
		<?php } else { ?>
	
			<div id="logo" style="padding:<?php echo $trns_options["logoMarginTop"]; ?>px 0 0 <?php echo $trns_options["logoMarginLeft"]; ?>px;">
		
				<!-- LOGO -->
				<!-- If display Image Logo is activated -->
				<?php if($trns_options['enableLogo'] == 1) { ?>
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo(description); ?>">
						<img src="<?php echo $trns_options["logoUrl"]; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
					</a>
				<?php } ?>

				<!-- If text is activated to be displayed as logo -->
				<?php if($trns_options['enableLogo'] == 0) { ?>
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo(name); ?>">
						<?php echo $trns_options["titleSiteNameFirstRow"]; ?>
						<span><?php echo $trns_options["titleSiteNameSecondRow"]; ?></span>
					</a>
				<?php } ?>
			</div><!-- /logo -->
			<div class="banner">
				<div id="topad">
					<?php
						if(file_exists(TEMPLATEPATH . '/ads/sitewide_468x60header/'.$currentcat.'.php') && (is_single() || is_category())) {
							include_once(TEMPLATEPATH . '/ads/sitewide_468x60header/'.$currentcat.'.php');
						}
						else {
							include_once(TEMPLATEPATH . '/ads/sitewide_468x60header.php');
						}
					?>
				</div>
			</div><!-- /banner -->
		<?php } ?>
	</div><!-- /header -->
	
	<div class="clear"></div>		
	
	<div id="navcats">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Nav_Cats') ) : ?>
			<?php /* NAV MENU 1 */
				if ( $trns_options["nav1name"] <> "" ) { 
					wp_nav_menu( array('depth' => '5', 'menu' => $trns_options["nav1name"]));
				} else { ?>
					<ul>
						<li class="first<?php if(is_home() ) { ?> current-cat<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WebDesa'); ?></a></li>
						<?php wp_list_categories('orderby='.$trns_options["orderBy"].'&order='.$trns_options["order"].'&title_li=&exclude='.$trns_options["excludeCategories"]); ?>
					</ul>
			 <?php } ?>
		<?php endif; ?>
	</div>
	
	<div id="navpages">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Nav_Pages') ) : ?>
			<?php /* NAV MENU 2 */
				if ( $trns_options["nav2name"] <> "" ) { 
					wp_nav_menu( array('depth' => '5', 'menu' => $trns_options["nav2name"]));
				} else { ?>
					<ul>
						<?php wp_list_pages('sort_column=menu_order&title_li=&exclude='.$trns_options["excludePageNav"]); ?>
						<li><a href="#" class="gab_connect"><?php _e('Tetap Terhubung','WebDesa'); ?></a>
							<ul>
								<li><a class="gab_rss" href="<?php if ( $trns_options["feedlink"] <> "" ) { echo $trns_options["feedlink"]; } else { echo bloginfo('rss2_url'); } ?>" rel="nofollow" title="<?php _e('Subscribe to latest posts in RSS','WebDesa'); ?>"><?php _e('Latest Posts in RSS','WebDesa'); ?></a>
									<ul>
										<?php
											$categories = get_categories('hide_empty=1');
											foreach ($categories as $cat) 
											{
												echo '<li><a class="gab_rss" rel="nofollow" href="'.get_category_feed_link($cat->cat_ID, '').'">'. $cat->cat_name.'</a></li>';
											}
										?>				
									</ul>
								</li>
								<li><a class="gab_rss" href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow" title="<?php _e('Subscribe to latest comments in RSS','WebDesa'); ?>"><?php _e('Latest Comments in RSS','WebDesa'); ?></a></li>
								<?php if($trns_options['enableMailSubscribe'] == 1) { ?><li><a class="gab_email" href="<?php echo $trns_options["emailSubscribeLink"]; ?>" rel="nofollow" title="<?php _e('Subscribe to latest posts via email','WebDesa'); ?>"><?php _e('Berlangganan via e-mail','WebDesa'); ?></a></li><?php } ?>
								<?php if($trns_options['enabletwitterUp'] == 1) { ?><li><a class="gab_twitter" href="http://www.twitter.com/<?php echo $trns_options["twitterusername"]; ?>" rel="nofollow" title="<?php _e('Follow kami di Twitter','WebDesa'); ?>"><?php _e('Follow kami di Twitter','WebDesa'); ?></a></li><?php } ?>
								<?php if($trns_options['enablefacebook'] == 1) { ?><li><a class="gab_facebook" href="<?php echo $trns_options["linktofacebook"]; ?>" rel="nofollow" title="<?php _e('Terhubung dengan Facebook','WebDesa'); ?>"><?php _e('Terhubung dengan Facebook','WebDesa'); ?></a></li><?php } ?>
							</ul>
						</li>
					</ul>
			 <?php } ?>
		<?php endif; ?>
		
		<div id="search">
			<?php get_search_form(); ?>
		</div><!-- /search -->
	</div>
	
	<div class="clear"></div>	