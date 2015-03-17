<?php

// Register widget zones
if ( !function_exists('register_sidebars') )
	return;
	register_sidebar(array('name' => 'Nav_Cats','id' => 'Nav_Cats','before_widget' => '','after_widget' => '','before_title' => '<strong>','after_title' => '</strong><br />',));
	register_sidebar(array('name' => 'Nav_Pages','id' => 'Nav_Pages','before_widget' => '','after_widget' => '','before_title' => '<strong>','after_title' => '</strong><br />',));
	register_sidebar(array('name' => 'PrimaryLeft1','id' => 'PrimaryLeft1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryLeft2','id' => 'PrimaryLeft2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryMid1','id' => 'PrimaryMid1','before_widget' => '<div id="%1$s" class="widget midColPost %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryMid2','id' => 'PrimaryMid2','before_widget' => '<div id="%1$s" class="widget midColPost %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryRight1','id' => 'PrimaryRight1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryRight2','id' => 'PrimaryRight2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'Media_Bar','id' => 'Media_Bar','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryBottomAd','id' => 'PrimaryBottomAd','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryBottomTab1','id' => 'PrimaryBottomTab1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryBottomTab2','id' => 'PrimaryBottomTab2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryBottomTab3','id' => 'PrimaryBottomTab3','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryBottomTab4','id' => 'PrimaryBottomTab4','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PrimaryBottomTab5','id' => 'PrimaryBottomTab5','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));	
	register_sidebar(array('name' => 'SecondaryTopLeft','id' => 'SecondaryTopLeft','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));	
	register_sidebar(array('name' => 'SecondaryTopRight','id' => 'SecondaryTopRight','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));	
	register_sidebar(array('name' => 'SecondaryBottomLeft','id' => 'SecondaryBottomLeft','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));	
	register_sidebar(array('name' => 'SecondaryBottomRight','id' => 'SecondaryBottomRight','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));	
	register_sidebar(array('name' => 'BottomSidebar1','id' => 'BottomSidebar1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'BottomSidebar2','id' => 'BottomSidebar2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget_title">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'PostWidget','id' => 'PostWidget','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_sTitle_b">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'PageWidget','id' => 'PageWidget','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_sTitle_b">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'InnerNarrowSidebar1','id' => 'InnerNarrowSidebar1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_sTitle_b">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'InnerNarrowSidebar2','id' => 'InnerNarrowSidebar2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_sTitle_b">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'InnerWideSidebar1','id' => 'InnerWideSidebar1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_sTitle">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'InnerWideSidebar2','id' => 'InnerWideSidebar2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_sTitle">','after_title' => '</h3>',));	
	register_sidebar(array('name' => 'Footer1stRow','id' => 'Footer1stRow','before_widget' => '','after_widget' => '','before_title' => '<strong>','after_title' => '</strong><br />',));				
	register_sidebar(array('name' => 'Footer2ndRow','id' => 'Footer2ndRow','before_widget' => '','after_widget' => '','before_title' => '<strong>','after_title' => '</strong><br />',));	
?>
