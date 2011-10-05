<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : MyTube for Sitemap
 *
 * Name					: 	mytube.php
 * Author				: 	McDonald for MyTube
 *
 * Necessary modules	:	Sitemap 1.40
 *							MyTube 1.06
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_mytube() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'mytube_cat' ), 'cid', 'pid', 'title', 'viewcat.php?cid=', 'title' );
	return $block;
}
?>