<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Contact Center (by Mekdrop) for Sitemap
 *
 * Name					: 	xquiz.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							xquiz 1.0
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_xquiz() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'quiz_cat' ), 'cid', 'pid', 'title', 'index.php?cid=', 'cid');
	return $block;
}
?>