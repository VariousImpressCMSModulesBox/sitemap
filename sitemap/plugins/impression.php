<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Impression for Sitemap
 *
 * Name					: 	impression.php
 * Author				: 	McDonald
 *
 * Necessary modules	:	Sitemap 1.40
 *							Impression 1.10
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_impression() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid', 'title', 'catview.php?cid=', 'title' );
	return $block;
}
?>