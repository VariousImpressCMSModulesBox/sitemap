<?php
// $Id: smartfaq.php,v 17.1 2005/01/15 15:35:46 HMN 
// FILE		::	smartfaq.php
// AUTHOR	::	HMN <pc-ressources@fr.st>
// WEB		::	pc-ressources <http://hmn.no-ip.com>
//

function b_sitemap_smartfaq() {
    $block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'smartfaq_categories' ), 'categoryid', 'parentid', 'name', 'category.php?categoryid=', 'name' );
	return $block;
}
?>