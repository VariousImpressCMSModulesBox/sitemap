<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: admin/index.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license			GNU General Public License (GPL)
*					a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Sitemap 
* @since		1.30
* @author		chanoir
* ----------------------------------------------------------------------------------------------------------
* 				Sitemap
* @since		1.40
* @author		McDonald
* @version		$Id$
*/

include_once ( './../../../include/cp_header.php' );

icms_cp_header();

icms::$module -> displayAdminMenu( 1, icms::$module -> getVar( 'name' ) );

if ( file_exists( ICMS_ROOT_PATH . '/modules/sitemap/language/' . $icmsConfig['language'] .'/readme.html' ) ) {
    include ICMS_ROOT_PATH . '/modules/sitemap/language/' . $icmsConfig['language'] . '/readme.html';
} else {
    include ICMS_ROOT_PATH . '/modules/sitemap/language/english/readme.html';
}

icms_cp_footer();
?>