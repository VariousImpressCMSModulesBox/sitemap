<?php
// $Id: extcal.php,v 1.0 2005/09/02
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : Calendar for Sitemap
 *
 * Name					: 	extcal.php
 * -----------------------------------------------------------------------------
 * Author				: 	BONNAUDET Eric <bonnaudet.eric@laposte.net>
 * Website				:	ufolep16 <http://ufolep16.free.fr/>
 * Modified by			: 	McDonald
 * -----------------------------------------------------------------------------
 * Necessary modules	:	Sitemap 1.40
 *							Calendar 2.3
 * -----------------------------------------------------------------------------
**/

function b_sitemap_extcal() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'extcal_cat' ), 'cat_id', 'cat_name', 'calendar-week.php?cat=', 'cat_id' );
	return $block;
}
?>