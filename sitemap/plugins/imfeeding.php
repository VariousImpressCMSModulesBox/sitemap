<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : imfeeding for Sitemap
 *
 * Name					: 	imfeeding.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							imfeeding 1.0
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imfeeding() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'imfeeding_feed' ), 'feed_id', 'feed_title', 'feed.php?feed_id=', 'feed_id');
	return $block;
}
?>