<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: admin/menu.php
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

$adminmenu[1]['title'] 	= _MAIN;
$adminmenu[1]['link']	= 'admin/index.php';
$adminmenu[1]['icon']	= 'images/sitemap_big.png'; // 32x32 px for options bar (tabs) 
$adminmenu[1]['small']	= 'images/sitemap_small.png'; // 16x16 px for drop down

if ( isset( icms::$module ) ) {
	icms_loadLanguageFile( basename( dirname( dirname( __FILE__ ) ) ), 'admin' );
	$module = icms::handler( 'icms_module' ) -> getByDirname( basename( dirname( dirname( __FILE__ ) ) ), TRUE );
	$i = -1;
	$i++;
	$headermenu[$i]['title'] = _MI_SITEMAP_MODULE_GO;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/sitemap/';
	$i++;
	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link']  = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $module -> getVar( 'mid' );
	$i++;
	$headermenu[$i]['title'] = _MODABOUT_ABOUT;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/sitemap/admin/about.php';
}
?>