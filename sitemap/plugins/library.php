<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Library for Sitemap
 *
 * Name					: 	library.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							Library 1.0
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_library() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'library_publication' ), 'publication_id', 'title', 'publication.php?publication_id=', 'publication_id');
	return $block;
}
?>