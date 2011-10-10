<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: blocks/sitemap_blocks.php
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

function b_sitemap_show( $options ) {

	$module_handler = icms::handler( 'icms_module' );
	$module =& $module_handler -> getByDirname( 'sitemap' );
	$config_handler = icms::$config;
	$sitemapModuleConfig = $config_handler -> getConfigsByCat( 0, $module -> getVar( 'mid' ) );

	include_once ICMS_ROOT_PATH . '/modules/sitemap/include/sitemap.php';
	
	$block = array();
	$block['this']['mods'] = 'sitemap';
	$block['sitemapstyle'] = $sitemapModuleConfig['css_style'];
	$block['sitemap'] = sitemap_show();
	if (  $sitemapModuleConfig['msgs'] ) {
	  $block['msgs'] = '<div style="margin:10px 0px;"><hr noshade="noshade" color="#e8e6e2" />'.icms_core_DataFilter::checkVar( $sitemapModuleConfig['msgs'], 'html' ).'<hr noshade="noshade" color="#e8e6e2" /></div>';
	}
	$block['show_subcategoris'] = $sitemapModuleConfig['show_subcategoris'];
	return $block;
}

function b_sitemap_edit( $options ) {}
?>