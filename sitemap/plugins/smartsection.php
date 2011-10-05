<?php
// Desc: Sitemap Plugin for smartsection v1.0 21-Mar-2005 
// Author: karedokx (karedokx@yahoo.com)

function b_sitemap_smartsection() {
    $block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'smartsection_categories' ), 'categoryid', 'parentid', 'name', 'category.php?categoryid=', 'weight' );
	return $block;
}
?>