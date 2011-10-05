<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Tadgallery for Sitemap
 *
 * Name					: 	tadgallery.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							Tadgallery 1.30
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_Tadgallery() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'tad_gallery_cate' ), 'csn', 'of_csn', 'title', 'index.php?csn=', 'csn');
	return $block;
}
?>