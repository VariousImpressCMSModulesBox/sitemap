<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Imblogging for Sitemap
 *
 * Name					: 	imblogging.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							Imblogging 1.0
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imblogging() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'imblogging_post' ), 'post_id', 'post_title', 'post.php?post_id=', 'post_id');
	return $block;
}
?>