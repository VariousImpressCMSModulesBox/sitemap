<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : portfolio for Sitemap
 *
 * Name					: 	portfolio.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							portfolio 1.3
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_portfolio() {
	$block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'portfolio_categos' ), 'id_cat', 'parent', 'nombre', 'category.php?cat_id=', 'id_cat');
	return $block;
}
?>