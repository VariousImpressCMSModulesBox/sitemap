<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Contact Center (by Mekdrop) for Sitemap
 *
 * Name					: 	umfrage.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							umfrage 0.94
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_umfrage() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'umfrage_desc' ), 'poll_id', 'question', 'index.php?poll_id=', 'poll_id');
	return $block;
}
?>