<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : imaudit for Sitemap
 *
 * Name					: 	imaudit.php
 * Author				: 	QM-B
 *
 * Necessary modules	:	Sitemap 1.40
 *							imaudit 1.0
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imaudit() {
	$block = sitemap_get_articles_map( icms::$xoopsDB -> prefix( 'imaudit_branch' ), 'branch_id', 'name', 'changeset.php?branch_id=', 'branch_id');
	return $block;
}
?>