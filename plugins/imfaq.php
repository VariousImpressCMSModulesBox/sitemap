<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : imFAQ for Sitemap
 *
 * Name					: 	imfaq.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							imFAQ 1.10
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imfaq() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'imfaq_category' ), 'cat_id', 'cat_pid', 'cat_title', 'category.php?cat_id=', 'cat_id');
	return $block;
}
?>