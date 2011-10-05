<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : imLinks for Sitemap
 *
 * Name					: 	imlinks.php
 * By					: 	McDonald
 *
 * Necessary modules	:	Sitemap 1.40
 *							imLinks 1.05
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imlinks() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'imlinks_cat' ), 'cid', 'pid', 'title', 'viewcat.php?cid=', 'title' );
	return $block;
}
?>