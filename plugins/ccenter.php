<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Contact Center (by Mekdrop) for Sitemap
 *
 * Name					: 	ccenter.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							ccenter 0.94
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_ccenter() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'ccenter_form' ), 'formid', 'title', 'index.php?form=', 'formid');
	return $block;
}
?>