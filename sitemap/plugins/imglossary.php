<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : imGlossary for Sitemap
 *
 * Name					: 	imglossary.php
 * By					: 	McDonald
 *
 * Necessary modules	:	Sitemap 1.40
 *							imGlossary 1.03
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imglossary() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'imglossary_cats' ), 'categoryID', 'name', 'category.php?categoryID=', 'name' );
	return $block;
}
?>