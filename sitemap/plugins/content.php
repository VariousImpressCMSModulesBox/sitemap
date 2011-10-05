<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Content for Sitemap
 *
 * Name					: 	content.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							Content 1.10
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_content() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'content_content' ), 'content_id', 'content_pid', 'content_title', 'content.php?content_id=', 'content_id');
	return $block;
}
?>