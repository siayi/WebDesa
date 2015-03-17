<?php
class ControlPanel {
	# Load Theme Control Panel Head
	var $options;
	function ControlPanel() {
		add_action('admin_menu', array(&$this, 'add_menu'));
		add_action('admin_head', array(&$this, 'admin_head'));
		if (!is_array(get_option('WebDesa')))
		add_option('WebDesa', $this->default_settings);
		$this->options = get_option('WebDesa');
	}
 	function add_menu() {
		add_theme_page(__('Theme Settings','WebDesa'), __('Theme Settings','WebDesa'), 'edit_themes', "WebDesa", array(&$this, 'optionsmenu'));
 	}
 	function admin_head() {
		echo ' 
			<style type="text/css" media="screen">@import url( ' .get_template_directory_uri(). '/includes/cp/controlpanel.css );</style>
			<script type="text/javascript" src="' .get_template_directory_uri(). '/includes/cp/collapsible.js"></script>
			<script type="text/javascript" src="' .get_template_directory_uri(). '/includes/cp/call-collapsible-divs.js"></script>
		';
	}
	
	# Create a unique array that contains all theme settings
	var $default_settings = Array(
		'style' => 'default',
		'enable468h' => '1',
		'headerimage' => '0',
		'enablelogo' => '0',
		'logoMarginTop' => '25',
		'logoMarginLeft' => '30',
		'titleSiteNameFirstRow' => 'WebDesa',
		'titleSiteNameSecondRow' => 'Desa Ciburial',
		'order' => 'DESC',
		'orderBy' => 'ID',
		'logoMarginTop' => '1',
		'enablePhotoGallery' => '1',
		'featuredCatID' => '1',
		'fea2CatID' => '1',
		'fea3CatID' => '1',
		'pribottom1' => '1',
		'pribottom2' => '1',
		'pribottom3' => '1',
		'pribottom4' => '1',
		'pribottom5' => '1',
		'stopbox' => '1',
		'sbotbox' => '1',
		'ssidenews' => '1',
		'photoGalCatID' => '1',
		'feaPostCount' => '6',
		'fea2PostCount' => '1',
		'fea3PostCount' => '4',
		'postCstopbox1' => '1',
		'postCstopbox2' => '2',
		'postCstopbox3' => '5',
		'postCsbotbox1' => '1',
		'postCsbotbox2' => '2',
		'postCsbotbox3' => '5',
		'postCssidenews' => '6',
		'postCountPhotoBar' => '14',
		'enthumb_1' => '1',
		'enthumb_2' => '1',
		'enthumb_3' => '1',
		'enthumb_4' => '1',
		'enthumb_5' => '1',
		'enthumb_6' => '1',
		'enthumb_7' => '1',
		'enthumb_8' => '1',
		'enthumb_9' => '1',
		'enthumb_10' => '1',
		'enthumb_11' => '1',
		'enthumb_12' => '1',
		'enthumb_13' => '1',
		'enthumb_14' => '1',		
		'enthumb_15' => '1',
		'enableDate' => '1',
		'enableAName' => '1',
		'dateFormat' => 'M j Y',
		'timeFormat' => 'h:i a',
		'dateFormatS' => 'l, F jS, Y',
		'dateFormatA' => 'F jS, Y',
		'revealtype' => '1',
		'feaautorotate' => 'true',
		'fearotatepause' => '5',
		'midautorotate' => '0',
		'midspeed' => '2',
		'midscroll' => '2',
		'midpausetime' => '10',	
		'enableMailSubscribe' => '0',
		'enabletwitterUp' => '0',
		'enablefacebook' => '0',
		'emailSubscribeLink' => 'http://',
		'linktofacebook' => 'http://',	
		'enableLogoFot' => '0',	
		'logoUrlFot' => 'http://',	
		'recentPosts' => '5',
		'enablePrBotTabs' => '1',
		'enShareSingle' => '1',
		'enSharePage' => '0',
		'enshorturl' => '1',
		'enpostmeta' => '1',
		'enArc' => '1',
		'enMorePosts' => '1',
		'enRecComments' => '1',
		'enRecAdded' => '1',
		'arcPostType' => '1',
		'displayDate' => '1',
		'displayComment' => '1',
		'enable728' => '0',
		'ad728x90' => '728x90 ad code [Sitewide - Site Header]',
		'adh468x60' => '468x60 ad code [Site Wide - Header]',
		'home_300x250_top' => '300x260 ad code [Main Page Top]',
		'home_300x250_bottom' => '300x260 ad code [Main Page Mid]',
		'home_300x250_mid' => '300x260 ad code [Main Page Bottom]',
		'ad120x600_inner' => '120x600 ad code [Inner pages]',
		'ad300x250_inner' => '300x250 ad code [Inner pages]',		
	);
	
	# What to Post
	function optionsmenu() {
	if ($_POST['ss_action'] == 'save') {
	$this->options["style"] = $_POST['cp_style'];
	$this->options["feedlink"] = $_POST['cp_feedlink'];
	$this->options["enable728"] = isset($_POST['cp_enable728']) ? 1 : 0;
	$this->options["enable468h"] = isset($_POST['cp_enable468h']) ? 1 : 0;
	$this->options["headerimage"] = isset($_POST['cp_headerimage']) ? 1 : 0;
	$this->options["himageurl"] = $_POST['cp_himageurl'];
	$this->options["enableLogo"] = $_POST['cp_enableLogo'];
	$this->options["logoUrl"] = $_POST['cp_logoUrl'];
	$this->options["logoMarginTop"] = $_POST['cp_logoMarginTop'];
	$this->options["logoMarginLeft"] = $_POST['cp_logoMarginLeft'];
	$this->options["titleSiteNameFirstRow"] = stripslashes($_POST['cp_titleSiteNameFirstRow']);
	$this->options["titleSiteNameSecondRow"] = stripslashes($_POST['cp_titleSiteNameSecondRow']);
	$this->options["nav1name"] = $_POST['cp_nav1name'];
	$this->options["nav2name"] = $_POST['cp_nav2name'];
	$this->options["nav3name"] = $_POST['cp_nav3name'];
	$this->options["order"] = $_POST['cp_order'];
	$this->options["orderBy"] = $_POST['cp_orderBy'];
	$this->options["excludeCategories"] = $_POST['cp_excludeCategories'];
	$this->options["excludePageNav"] = $_POST['cp_excludePageNav'];
	$this->options["excludePageFot"] = $_POST['cp_excludePageFot'];
	$this->options["enableMailSubscribe"] = isset($_POST['cp_enableMailSubscribe']) ? 1 : 0;
	$this->options["enabletwitterUp"] = isset($_POST['cp_enabletwitterUp']) ? 1 : 0;
	$this->options["enablefacebook"] = isset($_POST['cp_enablefacebook']) ? 1 : 0;
	$this->options["twitterusername"] = $_POST['cp_twitterusername'];
	$this->options["linktofacebook"] = $_POST['cp_linktofacebook'];
	$this->options["emailSubscribeLink"] = $_POST['cp_emailSubscribeLink'];	
	$this->options["featuredCatID"] = $_POST['cp_featuredCatID'];
	$this->options["feaPostCount"] = $_POST['cp_feaPostCount'];
	$this->options["fea2CatID"] = $_POST['cp_fea2CatID'];
	$this->options["fea2PostCount"] = $_POST['cp_fea2PostCount'];
	$this->options["fea3CatID"] = $_POST['cp_fea3CatID'];
	$this->options["fea3PostCount"] = $_POST['cp_fea3PostCount'];
	$this->options["pribottom1"] = $_POST['cp_pribottom1'];
	$this->options["pribottom2"] = $_POST['cp_pribottom2'];
	$this->options["pribottom3"] = $_POST['cp_pribottom3'];
	$this->options["pribottom4"] = $_POST['cp_pribottom4'];
	$this->options["pribottom5"] = $_POST['cp_pribottom5'];
	$this->options["stopbox"] = $_POST['cp_stopbox'];
	$this->options["postCstopbox1"] = $_POST['cp_postCstopbox1'];
	$this->options["postCstopbox2"] = $_POST['cp_postCstopbox2'];
	$this->options["postCstopbox3"] = $_POST['cp_postCstopbox3'];
	$this->options["sbotbox"] = $_POST['cp_sbotbox'];
	$this->options["postCsbotbox1"] = $_POST['cp_postCsbotbox1'];
	$this->options["postCsbotbox2"] = $_POST['cp_postCsbotbox2'];
	$this->options["postCsbotbox3"] = $_POST['cp_postCsbotbox3'];
	$this->options["ssidenews"] = $_POST['cp_ssidenews'];
	$this->options["postCssidenews"] = $_POST['cp_postCssidenews'];	
	$this->options["photoGalCatID"] = $_POST['cp_photoGalCatID'];
	$this->options["catmediaID"] = $_POST['cp_catmediaID'];
	$this->options["enablePhotoGallery"] = $_POST['cp_enablePhotoGallery'];
	$this->options["postCountPhotoBar"] = $_POST['cp_postCountPhotoBar'];
	$this->options["enthumb_1"] = isset($_POST['cp_enthumb_1']) ? 1 : 0;
	$this->options["enthumb_2"] = isset($_POST['cp_enthumb_2']) ? 1 : 0;
	$this->options["enthumb_3"] = isset($_POST['cp_enthumb_3']) ? 1 : 0;
	$this->options["enthumb_4"] = isset($_POST['cp_enthumb_4']) ? 1 : 0;
	$this->options["enthumb_5"] = isset($_POST['cp_enthumb_5']) ? 1 : 0;
	$this->options["enthumb_6"] = isset($_POST['cp_enthumb_6']) ? 1 : 0;
	$this->options["enthumb_7"] = isset($_POST['cp_enthumb_7']) ? 1 : 0;
	$this->options["enthumb_8"] = isset($_POST['cp_enthumb_8']) ? 1 : 0;
	$this->options["enthumb_9"] = isset($_POST['cp_enthumb_9']) ? 1 : 0;
	$this->options["enthumb_10"] = isset($_POST['cp_enthumb_10']) ? 1 : 0;
	$this->options["enthumb_11"] = isset($_POST['cp_enthumb_11']) ? 1 : 0;
	$this->options["enthumb_12"] = isset($_POST['cp_enthumb_12']) ? 1 : 0;
	$this->options["enthumb_13"] = isset($_POST['cp_enthumb_13']) ? 1 : 0;
	$this->options["enthumb_14"] = isset($_POST['cp_enthumb_14']) ? 1 : 0;
	$this->options["enthumb_15"] = isset($_POST['cp_enthumb_15']) ? 1 : 0;
	$this->options["enableDate"] = isset($_POST['cp_enableDate']) ? 1 : 0;
	$this->options["enableAName"] = isset($_POST['cp_enableAName']) ? 1 : 0;
	$this->options["dateFormat"] = $_POST['cp_dateFormat'];
	$this->options["timeFormat"] = $_POST['cp_timeFormat'];
	$this->options["dateFormatS"] = $_POST['cp_dateFormatS'];
	$this->options["dateFormatA"] = $_POST['cp_dateFormatA'];
	$this->options["topBoxTitle"] = $_POST['cp_topBoxTitle'];
	$this->options["botBoxTitle"] = $_POST['cp_botBoxTitle'];
	$this->options["tabA1"] = $_POST['cp_tabA1'];
	$this->options["tabA2"] = $_POST['cp_tabA2'];
	$this->options["tabA3"] = $_POST['cp_tabA3'];
	$this->options["tabA4"] = $_POST['cp_tabA4'];
	$this->options["tabA5"] = $_POST['cp_tabA5'];	
	$this->options["revealtype"] = $_POST['cp_revealtype'];
	$this->options["feaautorotate"] = $_POST['cp_feaautorotate'];
	$this->options["fearotatepause"] = $_POST['cp_fearotatepause'];		
	$this->options["midautorotate"] = $_POST['cp_midautorotate'];	
	$this->options["midscroll"] = $_POST['cp_midscroll'];	
	$this->options["midpausetime"] = $_POST['cp_midpausetime'];	
	$this->options["midspeed"] = $_POST['cp_midspeed'];
	$this->options["stattracker"] = stripslashes($_POST['cp_stattracker']);	
	$this->options["enableLogoFot"] = isset($_POST['cp_enableLogoFot']) ? 1 : 0;
	$this->options["logoUrlFot"] = $_POST['cp_logoUrlFot'];
	$this->options["recentPosts"] = $_POST['cp_recentPosts'];
	$this->options["enablePrBotTabs"] = isset($_POST['cp_enablePrBotTabs']) ? 1 : 0;
	$this->options["enSharePage"] = isset($_POST['cp_enSharePage']) ? 1 : 0;
	$this->options["enShareSingle"] = isset($_POST['cp_enShareSingle']) ? 1 : 0;
	$this->options["enshorturl"] = isset($_POST['cp_enshorturl']) ? 1 : 0;
	$this->options["enpostmeta"] = isset($_POST['cp_enpostmeta']) ? 1 : 0;
	$this->options["enArc"] = isset($_POST['cp_enArc']) ? 1 : 0;
	$this->options["enMorePosts"] = isset($_POST['cp_enMorePosts']) ? 1 : 0;
	$this->options["enRecComments"] = isset($_POST['cp_enRecComments']) ? 1 : 0;
	$this->options["enRecAdded"] = isset($_POST['cp_enRecAdded']) ? 1 : 0;
	$this->options["displayDate"] = isset($_POST['cp_displayDate']) ? 1 : 0;
	$this->options["displayComment"] = isset($_POST['cp_displayComment']) ? 1 : 0;
	$this->options["arcPostType"] = $_POST['cp_arcPostType'];
	$this->options["ad728x90"] = stripslashes($_POST['cp_ad728x90']);
	$this->options["adh468x60"] = stripslashes($_POST['cp_adh468x60']);	
	$this->options["home_300x250_top"] = stripslashes($_POST['cp_home_300x250_top']);
	$this->options["home_300x250_bottom"] = stripslashes($_POST['cp_home_300x250_bottom']);
	$this->options["home_300x250_mid"] = stripslashes($_POST['cp_home_300x250_mid']);
	$this->options["ad120x600_inner"] = stripslashes($_POST['cp_ad120x600_inner']);
	$this->options["ad300x250_inner"] = stripslashes($_POST['cp_ad300x250_inner']);
	update_option('WebDesa', $this->options);
	echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 500px; margin-left: 50px"><p>WebDesa settings <strong>saved</strong>.</p></div>';
	} 
	?>

	<!-- Load Visual Theme Control Panel -->
	<div id="optionsForm">

	<form action="" method="post" id="themeform">
	<fieldset>
		<div id="gab_top">
			<input type="hidden" id="ss_action" name="ss_action" value="save">	
		
			<h3>Select CSS Style (color scheme) for site</h3>
			<select name="cp_style" class="selectm">
			<?php
			$dirPath = TEMPLATEPATH. '/styles/';
			if ($handle = opendir($dirPath)) {
			while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
			if (is_dir("$dirPath/$file")) {
			?>
			<option value="<?php echo $file; ?>"<?php selected($file, $this->options["style"]); ?>><?php echo ucfirst($file); ?></option>
			<?php } } } closedir($handle); } ?>
			</select>
		</div>
		
		<div id="ex_hide">
			<a href="javascript:animatedcollapse.show(['header','navigation','cats','sliders','misc','ads'])">Expand All</a> | <a href="javascript:animatedcollapse.hide(['header','navigation','cats','sliders','misc','ads'])">Collapse All</a>
		</div>
		
		
		<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>	
		<div id="panelLeft">
			<h2>Setup Header <span><a href="#" rel="toggle[header]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="header">			
				<select name="cp_enableLogo" class="selectm">
				<option value="1"<?php selected(1, $this->options["enableLogo"]); ?>>Image based logo</option>
				<option value="0"<?php selected(0, $this->options["enableLogo"]); ?>>Text-based logo</option>
				</select><br/><br/>
				
				<h3>Define top and left margins for logo</h3>
				<input class="inputID" name="cp_logoMarginTop" id="cp_logoMarginTop" type="text" value="<?php echo $this->options["logoMarginTop"]; ?>" /><label for="cp_logoMarginTop">px [space between logo top corner]</label><br />
				<input class="inputID" name="cp_logoMarginLeft" id="cp_logoMarginLeft" type="text" value="<?php echo $this->options["logoMarginLeft"]; ?>" /><label for="cp_logoMarginLeft">px [space between logo left corner]</label><br /><br />				
				
				<h3>If text-based logo is activated</h3>
				<input class="inputN" name="cp_titleSiteNameFirstRow" id="cp_titleSiteNameFirstRow" type="text" value="<?php echo stripslashes($this->options["titleSiteNameFirstRow"]); ?>" /><label for="cp_titleSiteNameFirstRow">Sitename Row #1</label><br />
				<input class="inputN" name="cp_titleSiteNameSecondRow" id="cp_titleSiteNameSecondRow" type="text" value="<?php echo stripslashes($this->options["titleSiteNameSecondRow"]); ?>" /><label for="cp_titleSiteNameSecondRow">Sitename Row #2</label><br />
				<small>For SEO purposes, make sure that site name and tagline are inserted into corresponding fields on <a href="<?php bloginfo('url') ?>/wp-admin/options-general.php" target="_blank">settings</a> page</small><br /><br />
				<h3>If image-based logo is activated (full url)</h3>
				<input class="inputN" name="cp_logoUrl" id="cp_logoUrl" type="text" value="<?php echo $this->options["logoUrl"]; ?>" /><label for="cp_logoUrl">Logo URL [Max Width: 460px - Max Height:115px]</label><br /></br>
					
				<h3>Replace header with a custom image</h3>
				<input class="mInput" type="checkbox" name="cp_headerimage" id="cp_headerimage" <?php echo $this->options["headerimage"] == 1 ? ' checked' : '' ?> /> <label for="cp_headerimage">Remove logo &amp; ad from header and display a 970px (w) - 115px (h) image instead (if selected, write image url below)</label><br />
				<input class="inputN" name="cp_himageurl" id="cp_himageurl" type="text" value="<?php echo $this->options["himageurl"]; ?>" /><label for="cp_himageurl">Image URL to display on header</label><br /><br />
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>
			
			<h2>Setup Navigation <span><a href="#" rel="toggle[navigation]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="navigation">
				<p>Exclude specific category/page from navigation by using their ID numbers <a href="http://www.gabfirethemes.com/how-to-check-category-ids/" target="_blank">Tutorial: How to check category/page IDs?</a></p>
				<div class="innerBoxH">
					<h3>Use Custom Navigation (Available in WordPress 3.0+ only)</h3>
					<p><input class="inputN" name="cp_nav1name" id="cp_nav1name" type="text" value="<?php echo $this->options["nav1name"]; ?>" /><label for="cp_nav1name">Custom Navigation Name to replace categories on header</label></p>
					<p><input class="inputN" name="cp_nav2name" id="cp_nav2name" type="text" value="<?php echo $this->options["nav2name"]; ?>" /><label for="cp_nav2name">Custom Navigation Name to replace pages on header</label></p>
					<p><input class="inputN" name="cp_nav3name" id="cp_nav3name" type="text" value="<?php echo $this->options["nav3name"]; ?>" /><label for="cp_nav3name">Custom Navigation Name to replace pages on footer</label></p>
				
					<h3>Setup Categories (Use this options only when custom menus are not in use)</h3>
					<p><input class="inputN" name="cp_excludeCategories" id="cp_excludeCategories" type="text" value="<?php echo $this->options["excludeCategories"]; ?>" /><label for="cp_excludeCategories">Categories to exclude (eg 1,2,3,4)</label></p>
					<p><input class="inputID" name="cp_orderBy" id="cp_orderBy" type="text" value="<?php echo $this->options["orderBy"]; ?>" /><label for="cp_orderBy">Sort categories alphabetically, by unique Cat ID, or by the count of posts in that cat. Options are <strong>ID</strong>, <strong>name</strong>, <strong>count</strong></label></p>
					<p><input class="inputID" name="cp_order" id="cp_order" type="text" value="<?php echo $this->options["order"]; ?>" /><label for="cp_order">Sort categories either ascending or descending Options are: <strong>ASC</strong>, <strong>DESC</strong></label></p>
					
					<h3>Setup Pages (Use this options only when custom menus are not in use)</h3>
					<p><input class="inputN" name="cp_excludePageNav" id="cp_excludePageNav" type="text" value="<?php echo $this->options["excludePageNav"]; ?>" /><label for="cp_excludePageNav">ID number of pages to be excluded from navigation</label></p>
					<p><input class="inputN" name="cp_excludePageFot" id="cp_excludePageFot" type="text" value="<?php echo $this->options["excludePageFot"]; ?>" /><label for="cp_excludePageFot">ID number of pages to be excluded from footer page list</label></p>
				</div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>	
			
	
			<h2>Setup Categories <span><a href="#" rel="toggle[cats]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="cats">
				<h3>Display 0 entry to disable a section on front page</h3>
			
				Display the posts of 
				<select name="cp_featuredCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["featuredCatID"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_feaPostCount" id="cp_feaPostCount" type="text" value="<?php echo $this->options["feaPostCount"]; ?>" />entries on featured slider<br />

				Display the posts of 
				<select name="cp_fea2CatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["fea2CatID"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_fea2PostCount" id="cp_fea2PostCount" type="text" value="<?php echo $this->options["fea2PostCount"]; ?>" />entries below featured slider<br />

				Display the posts of 
				<select name="cp_fea3CatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["fea3CatID"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_fea3PostCount" id="cp_fea3PostCount" type="text" value="<?php echo $this->options["fea3PostCount"]; ?>" />entries on right side of featured slider<br />

				Display the posts of 
				<select name="cp_pribottom1" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["pribottom1"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list 1 entry on primary bottom 1st tab<br />
				
				Display the posts of 
				<select name="cp_pribottom2" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["pribottom2"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list 1 entry on primary bottom 2nd tab<br />
				
				Display the posts of 
				<select name="cp_pribottom3" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["pribottom3"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list 1 entry on primary bottom 3rd tab<br />
				
				Display the posts of 
				<select name="cp_pribottom4" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["pribottom4"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list 1 entry on primary bottom 4th tab<br />
				
				Display the posts of 
				<select name="cp_pribottom5" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["pribottom5"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list 1 entry on primary bottom 5th tab<br />
				
				Display the posts of 
				<select name="cp_stopbox" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["stopbox"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCstopbox1" id="cp_postCstopbox1" type="text" value="<?php echo $this->options["postCstopbox1"]; ?>" />post(s) with big thumbnail, <input class="inputID" name="cp_postCstopbox2" id="cp_postCstopbox2" type="text" value="<?php echo $this->options["postCstopbox2"]; ?>" />post(s) with small thumbnail and <input class="inputID" name="cp_postCstopbox3" id="cp_postCstopbox3" type="text" value="<?php echo $this->options["postCstopbox3"]; ?>" />post headlines (wihtout excerpt/thumbnail) on secondary content top box<br />
				
				Display the posts of 
				<select name="cp_sbotbox" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["sbotbox"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCsbotbox1" id="cp_postCsbotbox1" type="text" value="<?php echo $this->options["postCsbotbox1"]; ?>" />post(s) with big thumbnail, <input class="inputID" name="cp_postCsbotbox2" id="cp_postCsbotbox2" type="text" value="<?php echo $this->options["postCsbotbox2"]; ?>" />post(s) with small thumbnail and <input class="inputID" name="cp_postCsbotbox3" id="cp_postCsbotbox3" type="text" value="<?php echo $this->options["postCsbotbox3"]; ?>" />post headlines (wihtout excerpt/thumbnail) on secondary content bottom box<br />
				
				Display the posts of 
				<select name="cp_ssidenews" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["ssidenews"]); ?>><?php echo $cat->cat_name; ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCssidenews" id="cp_postCssidenews" type="text" value="<?php echo $this->options["postCssidenews"]; ?>" />entries on bottom sidebar<br />
			
				<div class="innerBoxH">
					<h3>MEDIA GALLERY MODULE</h3>
					<p>The recommended use of media module is to create Media category as top level, and to build photo + video categories as sub categories</p>
					<select name="cp_enablePhotoGallery" class="selectCat">
					<option value="1"<?php selected(1, $this->options["enablePhotoGallery"]); ?>>Enable media bar on front page</option>
					<option value="0"<?php selected(0, $this->options["enablePhotoGallery"]); ?>>Do not display media bar on front page</option>
					</select><br/>
					
					<select name="cp_photoGalCatID" class="selectCat">
					<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
					<option value="<?php echo $cat->cat_ID; ?>"<?php selected($cat->cat_ID, $this->options["photoGalCatID"]); ?>><?php echo $cat->cat_name; ?></option>
					<?php } ?>
					</select>
					<label for="cp_photoGalCatID">Category for Photo Gallery</label><br />			
				
					<p><input class="inputID" name="cp_postCountPhotoBar" id="cp_postCountPhotoBar" type="text" value="<?php echo $this->options["postCountPhotoBar"]; ?>" /><label for="cp_postCountPhotoBar">How many photos to display on <strong>mainpage</strong> main page slider (Default 14)</label></p>
					<p><input class="inputN" name="cp_catmediaID" id="cp_catmediaID" type="text" value="<?php echo $this->options["catmediaID"]; ?>" /><label for="cp_catmediaID">Category ID's to use media template for (separate with comma if more than one id is entered) (<a href="http://www.gabfirethemes.com/how-to-check-category-ids/" target="_blank">How to check category id)</a></label></p>
				</div>
			
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>			
			
			<h2>Setup Sliders <span><a href="#" rel="toggle[sliders]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="sliders">
				<div class="innerBoxH">
				<h3>Setup Featured Slider</h3>
					<select name="cp_revealtype" class="selectminline">
					<option value="1"<?php selected(1, $this->options["revealtype"]); ?>>Change post when navigation link is clicked</option>
					<option value="0"<?php selected(0, $this->options["revealtype"]); ?>>Change post when navigation link is hovered (mouse-over)</option>
					</select>

					<select name="cp_feaautorotate" class="selectminline">
					<option value="1"<?php selected(1, $this->options["feaautorotate"]); ?>>Enable auto rotation</option>
					<option value="0"<?php selected(0, $this->options["feaautorotate"]); ?>>Disable auto rotation</option>
					</select>
					<p><input class="inputID" name="cp_fearotatepause" id="cp_fearotatepause" type="text" value="<?php echo $this->options["fearotatepause"]; ?>" /><label for="cp_fearotatepause">(If auto rotate is enabled) define pause time between rotation (Default 5 seconds)</label></p>
				</div>
				
				<div class="innerBoxH">
				<h3>Setup Mainpage Mid Slider [Media Bar]</h3>
					<select name="cp_midautorotate" class="selectm">
					<option value="1"<?php selected(1, $this->options["midautorotate"]); ?>>Enable auto rotation</option>
					<option value="0"<?php selected(0, $this->options["midautorotate"]); ?>>Disable auto rotation</option>
					</select>				
					<p><input class="inputID" name="cp_midpausetime" id="cp_midpausetime" type="text" value="<?php echo $this->options["midpausetime"]; ?>" /><label for="cp_midpausetime">(If auto rotate is enabled) Pause time: between 2 consecutive slides [Default 10 seconds]</label></p>
					<p><input class="inputID" name="cp_midspeed" id="cp_midspeed" type="text" value="<?php echo $this->options["midspeed"]; ?>" /><label for="cp_midspeed">Rotation Speed: The speed of rotation when slider scrolls [Default 2 seconds]</label></p>
					<p><input class="inputID" name="cp_midscroll" id="cp_midscroll" type="text" value="<?php echo $this->options["midscroll"]; ?>" /><label for="cp_midscroll">Specify the number of items to scroll when slider scrolls. Value 2 will scroll 2 items at a time</label></p>
				</div>

				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>
			
			<h2>Miscellaneous <span><a href="#" rel="toggle[misc]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="misc">		
				<div class="innerBoxH">
					<h3>Enable/Disable Default post Thumbnails</h3>
					<p>There are multiple checks before a thumbnail is displayed on front page. If theme can't find a custom field defined or a wordpress post thumbnail set, it will display a default category image. Default images can be disabled below.</p>
					<input class="mInput" type="checkbox" name="cp_enthumb_1" id="cp_enthumb_1" <?php echo $this->options["enthumb_1"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_1">Enable default "No Image Found" on featured slider</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_2" id="cp_enthumb_2" <?php echo $this->options["enthumb_2"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_2">Enable default "No Image Found" photo below featured slider</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_3" id="cp_enthumb_3" <?php echo $this->options["enthumb_3"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_3">Enable default "No Image Found" photo on right hand of featured slider</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_4" id="cp_enthumb_4" <?php echo $this->options["enthumb_4"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_4">Enable default "No Image Found" photo on media news column</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_5" id="cp_enthumb_5" <?php echo $this->options["enthumb_5"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_5">Enable default "No Image Found" photo on 1st tab below media news</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_6" id="cp_enthumb_6" <?php echo $this->options["enthumb_6"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_6">Enable default "No Image Found" photo on 2nd tab below media news</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_7" id="cp_enthumb_7" <?php echo $this->options["enthumb_7"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_7">Enable default "No Image Found" photo on 3rd tab below media news</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_8" id="cp_enthumb_8" <?php echo $this->options["enthumb_8"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_8">Enable default "No Image Found" photo on 4th tab below media news</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_9" id="cp_enthumb_9" <?php echo $this->options["enthumb_9"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_9">Enable default "No Image Found" photo on 5th tab below media news</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_10" id="cp_enthumb_10" <?php echo $this->options["enthumb_10"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_10">Enable default "No Image Found" photo on secondary content top left</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_11" id="cp_enthumb_11" <?php echo $this->options["enthumb_11"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_11">Enable default "No Image Found" photo on secondary content top right</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_12" id="cp_enthumb_12" <?php echo $this->options["enthumb_12"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_12">Enable default "No Image Found" photo on secondary content bottom left</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_13" id="cp_enthumb_13" <?php echo $this->options["enthumb_13"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_13">Enable default "No Image Found" photo on secondary content bottom right</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_14" id="cp_enthumb_14" <?php echo $this->options["enthumb_14"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_14">Enable default "No Image Found" photo on sidebar posts</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_15" id="cp_enthumb_15" <?php echo $this->options["enthumb_15"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_15">Enable default "No Image Found" photo on archive pages</label>
				</div>
				<div class="innerBoxH">
				<h3>Setup RSS Feeds</h3>
					<input class="inputN" name="cp_feedlink" id="cp_feedlink" type="text" value="<?php echo $this->options["feedlink"]; ?>" /><label for="cp_feedlink">(If a third party feed handler (eg. feedburner) is used Enter feed URL</label><br />
					<input class="mInput" type="checkbox" name="cp_enableMailSubscribe" id="cp_enableMailSubscribe" <?php echo $this->options["enableMailSubscribe"] == 1 ? ' checked' : '' ?> /> <label for="cp_enableMailSubscribe">Enable subscribe by email option. Link will be displayed on masthead, under "stay updated"</label><br />
					<input class="inputN" name="cp_emailSubscribeLink" id="cp_emailSubscribeLink" type="text" value="<?php echo $this->options["emailSubscribeLink"]; ?>" /><label for="cp_emailSubscribeLink">Email subscribition link provided by <a href="http://www.feedburner.com">Feedburner</a></label><br />
				</div>
				<div class="innerBoxH">
					<h3>Setup Social site links</h3>
					<input class="mInput" type="checkbox" name="cp_enabletwitterUp" id="cp_enabletwitterUp" <?php echo $this->options["enabletwitterUp"] == 1 ? ' checked' : '' ?> /> <label for="cp_enabletwitterUp">Display a link to Twitter account under Stay Updated link on navigation</label><br />
					<input class="inputN" name="cp_twitterusername" id="cp_twitterusername" type="text" value="<?php echo $this->options["twitterusername"]; ?>" /><label for="cp_twitterusername">Twitter Username</label><br /><br />
					
					<input class="mInput" type="checkbox" name="cp_enablefacebook" id="cp_enablefacebook" <?php echo $this->options["enablefacebook"] == 1 ? ' checked' : '' ?> /> <label for="cp_enablefacebook">Display a link to Facebook under Stay Updated link on navigation</label><br />
					<input class="inputN" name="cp_linktofacebook" id="cp_linktofacebook" type="text" value="<?php echo $this->options["linktofacebook"]; ?>" /><label for="cp_linktofacebook">Link to facebook account</label><br />										
				</div>
				
				<div class="innerBoxH">		
					<h3>Footer Logo</h3> 
					<input class="mInput" type="checkbox" name="cp_enableLogoFot" id="cp_enableLogoFot" <?php echo $this->options["enableLogoFot"] == 1 ? ' checked' : '' ?> /> <label for="cp_enableLogoFot">Enable logo on right hand of footer</label><br />
					<input class="inputN" name="cp_logoUrlFot" id="cp_logoUrlFot" type="text" value="<?php echo $this->options["logoUrlFot"]; ?>" /><label for="cp_logoUrlFot">Footer Logo URL</label>
				</div>
				
				<div class="innerBoxH">
					<h3>Google Analytics / Stat Tracker Snippet</h3>
					<textarea class="textarea" name="cp_stattracker" id="cp_stattracker"><?php echo stripslashes($this->options["stattracker"]); ?></textarea>			
				</div>
				<div class="innerBoxH">
				<h3>Date/Time format</h3>
					<input class="inputID" name="cp_dateFormat" id="cp_dateFormat" type="text" value="<?php echo $this->options["dateFormat"]; ?>" /><label for="cp_dateFormat">Date/Time format that is displayed after the main page post excerpts (Default F j Y) <a href="http://php.net/manual/en/function.date.php" target="_blank">See all operators</a></label><br />
					<input class="inputID" name="cp_timeFormat" id="cp_timeFormat" type="text" value="<?php echo $this->options["timeFormat"]; ?>" /><label for="cp_timeFormat">Date/Time format to display before entries on main page sidebar (Default h:i a) <a href="http://php.net/manual/en/function.date.php" target="_blank">See all operators</a></label><br />
					<input class="inputID" name="cp_dateFormatS" id="cp_dateFormatS" type="text" value="<?php echo $this->options["dateFormatS"]; ?>" /><label for="cp_dateFormatS">Date/Time format that is displayed on single post page (Default l, F jS, Y) <a href="http://php.net/manual/en/function.date.php" target="_blank">See all operators</a></label><br />
					<input class="inputID" name="cp_dateFormatA" id="cp_dateFormatA" type="text" value="<?php echo $this->options["dateFormatA"]; ?>" /><label for="cp_dateFormatA">Date/Time format that is displayed on archive pages (Default F jS, Y) <a href="http://php.net/manual/en/function.date.php" target="_blank">See all operators</a></label><br />				
				</div>

				<div class="innerBoxH">
					<h3>Set front page titles (Leave empty to display category titles)</h3>
					<input class="inputN" name="cp_topBoxTitle" id="cp_topBoxTitle" type="text" value="<?php echo $this->options["topBoxTitle"]; ?>" /><label for="cp_topBoxTitle">Secondary Content Top Box Title</label><br />
					<input class="inputN" name="cp_botBoxTitle" id="cp_botBoxTitle" type="text" value="<?php echo $this->options["botBoxTitle"]; ?>" /><label for="cp_botBoxTitle">Secondary Content Bottom Box Title</label><br />
					<input class="inputN" name="cp_tabA1" id="cp_tabA1" type="text" value="<?php echo $this->options["tabA1"]; ?>" /><label for="cp_tabA1"> Anchor text for primary tab #1</label><br />
					<input class="inputN" name="cp_tabA2" id="cp_tabA2" type="text" value="<?php echo $this->options["tabA2"]; ?>" /><label for="cp_tabA2"> Anchor text for primary tab #2</label><br />
					<input class="inputN" name="cp_tabA3" id="cp_tabA3" type="text" value="<?php echo $this->options["tabA3"]; ?>" /><label for="cp_tabA3"> Anchor text for primary tab #3</label><br />
					<input class="inputN" name="cp_tabA4" id="cp_tabA4" type="text" value="<?php echo $this->options["tabA4"]; ?>" /><label for="cp_tabA4"> Anchor text for primary tab #4</label><br />
					<input class="inputN" name="cp_tabA5" id="cp_tabA5" type="text" value="<?php echo $this->options["tabA5"]; ?>" /><label for="cp_tabA5"> Anchor text for primary tab #5</label><br /><br />				
				</div>
				
				<div class="innerBoxH">
				<h3>Default Widgets</h3>
					<input class="mInput" type="checkbox" name="cp_enShareSingle" id="cp_enShareSingle" <?php echo $this->options["enShareSingle"] == 1 ? ' checked' : '' ?> /> <label for="cp_enShareSingle">Display socialize links for posts</label><br />
					<input class="mInput" type="checkbox" name="cp_enSharePage" id="cp_enSharePage" <?php echo $this->options["enSharePage"] == 1 ? ' checked' : '' ?> /> <label for="cp_enSharePage">Display socialize links for pages</label><br />	
					<input class="mInput" type="checkbox" name="cp_enArc" id="cp_enArc" <?php echo $this->options["enArc"] == 1 ? ' checked' : '' ?> /> <label for="cp_enArc">Display Archives widget on narrow sidebar</label><br />
					<input class="mInput" type="checkbox" name="cp_enMorePosts" id="cp_enMorePosts" <?php echo $this->options["enMorePosts"] == 1 ? ' checked' : '' ?> /> <label for="cp_enMorePosts">Display more category posts on wide sidebar / single post pages</label><br />	
					<input class="mInput" type="checkbox" name="cp_enRecComments" id="cp_enRecComments" <?php echo $this->options["enRecComments"] == 1 ? ' checked' : '' ?> /> <label for="cp_enRecComments">Display recent comments widget on wide sidebar / inner pages</label><br />	
					<input class="mInput" type="checkbox" name="cp_enRecAdded" id="cp_enRecAdded" <?php echo $this->options["enRecAdded"] == 1 ? ' checked' : '' ?> /> <label for="cp_enRecAdded">Display a list of recently added articles on wide sidebar / inner pages</label>
				</div>
				
				<div class="innerBoxH">
					<h3>Other Settings</h3>
					<select name="cp_arcPostType" class="selectCat">
					<option value="0"<?php selected(0, $this->options["arcPostType"]); ?>>Display only post excerpt</option>
					<option value="1"<?php selected(1, $this->options["arcPostType"]); ?>>Display post excerpt with thumbnail</option>
					<option value="2"<?php selected(2, $this->options["arcPostType"]); ?>>Display whole content</option>
					</select>on archive pages (date based, category, author and tag archives)<br/>
					
					<input class="mInput" type="checkbox" name="cp_enableAName" id="cp_enableAName" <?php echo $this->options["enableAName"] == 1 ? ' checked' : '' ?> /> <label for="cp_enableAName">Display author names before post excerpts on front page</label><br />
					<input class="mInput" type="checkbox" name="cp_enableDate" id="cp_enableDate" <?php echo $this->options["enableDate"] == 1 ? ' checked' : '' ?> /> <label for="cp_enableDate">Display post time before post excerpts on front page</label><br />
					<input class="inputID" name="cp_recentPosts" id="cp_recentPosts" type="text" value="<?php echo $this->options["recentPosts"]; ?>" /><label for="cp_recentPosts"> How many recent posts to be displayed on front page top sidebar tab</label><br />			
					<input class="mInput" type="checkbox" name="cp_enablePrBotTabs" id="cp_enablePrBotTabs" <?php echo $this->options["enablePrBotTabs"] == 1 ? ' checked' : '' ?> /> <label for="cp_enablePrBotTabs">Enable primary bottom tabs below media gallery</label><br />
					<input class="mInput" type="checkbox" name="cp_enshorturl" id="cp_enshorturl" <?php echo $this->options["enshorturl"] == 1 ? ' checked' : '' ?> /> <label for="cp_enshorturl">Display Short URL below entries</label><br />
					<input class="mInput" type="checkbox" name="cp_enpostmeta" id="cp_enpostmeta" <?php echo $this->options["enpostmeta"] == 1 ? ' checked' : '' ?> /> <label for="cp_enpostmeta">Display author info and post meta below post in article page</label><br />
					<input class="mInput" type="checkbox" name="cp_displayComment" id="cp_displayComment" <?php echo $this->options["displayComment"] == 1 ? ' checked' : '' ?> /> <label for="cp_displayComment">Display "No Comment, 1 Comment or "x Comments" text below post excerpts</label><br />
					<input class="mInput" type="checkbox" name="cp_displayDate" id="cp_displayDate" <?php echo $this->options["displayDate"] == 1 ? ' checked' : '' ?> /> <label for="cp_displayDate">Display date below post excerpts</label><br />
				</div>					
				
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>				

			<h2>Manage Ads <span><a href="#" rel="toggle[ads]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="ads">
			
				<div class="left">
					<input class="mInput" type="checkbox" name="cp_enable728" id="cp_enable728" <?php echo $this->options["enable728"] == 1 ? ' checked' : '' ?> /><label for="cp_enable728">Enable 728x90 ad on header</label>
					<textarea class="textarea" name="cp_ad728x90" id="cp_ad728x90"><?php echo stripslashes($this->options["ad728x90"]); ?></textarea>
				</div>
			
				<div class="right">
					<label for="adh468x60">468x60 header ad code</label>
					<textarea class="textarea" name="cp_adh468x60" id="cp_adh468x60"><?php echo stripslashes($this->options["adh468x60"]); ?></textarea>						
				</div>
			
				<div class="left">
					<label for="home_300x250_top">300x250 mainpage top (Leave empty to disable)</label>
					<textarea class="textarea" name="cp_home_300x250_top" id="cp_home_300x250_top"><?php echo stripslashes($this->options["home_300x250_top"]); ?></textarea>
				</div>
			
				<div class="right">
					<label for="home_300x250_mid">300x250 mainpage middle (Leave empty to disable)</label>				
					<textarea class="textarea" name="cp_home_300x250_mid" id="cp_home_300x250_mid"><?php echo stripslashes($this->options["home_300x250_mid"]); ?></textarea>
				</div>
			
				<div class="left">
					<label for="cp_home_300x250_bottom">300x250 mainpage bottom (Leave empty to disable)</label>	
					<textarea class="textarea" name="cp_home_300x250_bottom" id="cp_home_300x250_bottom"><?php echo stripslashes($this->options["home_300x250_bottom"]); ?></textarea>
				</div>
				
				<div class="right">
					<label for="cp_ad120x600_inner">120x600 Innerpage mid col (Leave empty to disable)</label>				
					<textarea class="textarea" name="cp_ad120x600_inner" id="cp_ad120x600_inner"><?php echo stripslashes($this->options["ad120x600_inner"]); ?></textarea>
				</div>
			
				<div class="left">
					<label for="cp_ad300x250_inner">300x250 Innerpage right col (Leave empty to disable)</label>	
					<textarea class="textarea" name="cp_ad300x250_inner" id="cp_ad300x250_inner"><?php echo stripslashes($this->options["ad300x250_inner"]); ?></textarea>
				</div>
				
				<div class="clear"></div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>
			
			<h2>WebDesa Themes</h2>
			<div class="innerBox">
				<div class="innerBoxH" id="gab_rssbox">
					<p>Subscribe to WebDesa Themes</p>
					<p>
						<a target="_blank" href="http://facebook.com/Desa.Ciburial" class="gab_rss">Subscribe to RSS</a>
						<a target="_blank" href="http://facebook.com/Desa.Ciburial" class="gab_rss">Subscribe via Email</a>
						<a target="_blank" href="http://facebook.com/Desa.Ciburial" class="gab_twit">Follow on Twitter</a>
						<a target="_blank" href="http://facebook.com/Desa.Ciburial" class="gab_fb">Connect on Facebook</a>
					</p>
					<p>
						<a target="_blank" href="http://facebook.com/Desa.Ciburial">See All Themes</a> | 
						<a target="_blank" href="http://facebook.com/Desa.Ciburial">Our Services</a> | 
						<a target="_blank" href="http://facebook.com/Desa.Ciburial">Frequently Asked Qeustions</a> | 
						<a target="_blank" href="http://facebook.com/Desa.Ciburial>Become an Affiliate</a> | 
						<a target="_blank" href="http://facebook.com/Desa.Ciburial>Contact</a>
					</p>
				</div>
			</div>			
			
			
		</div>
	</fieldset>
 </form></div>
	<?php }
}
$cpanel = new ControlPanel();
$trns_options = get_option('WebDesa');
?>
