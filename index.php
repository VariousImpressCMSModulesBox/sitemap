<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: index.php
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

require '../../mainfile.php' ;

$xoopsOption['template_main'] = 'sitemap_index.html';
include ICMS_ROOT_PATH . '/header.php';

include_once ICMS_ROOT_PATH . '/modules/sitemap/include/sitemap.php' ;

$sitemap = sitemap_show();

$xoopsTpl -> assign( 'sitemap', $sitemap );
if ( icms::$module -> config['msgs'] ) {
$xoopsTpl -> assign( 'msgs', '
								<hr noshade="noshade" color="#e8e6e2" />
								<div style="padding: 7px;">' . icms_core_DataFilter::checkVar( icms::$module -> config['msgs'] , 'html' ) . '</div>
								<hr noshade="noshade" color="#e8e6e2" />
							  ' );
}
$xoopsTpl -> assign( 'show_subcategoris', icms::$module -> config['show_subcategoris'] );
$xoopsTpl -> assign( 'this', array( 'mods' => icms::$module -> getVar( 'dirname' ), 'name' => icms::$module -> getVar( 'name' ) ) );
$xoopsTpl -> assign( 'sitemapstyle', icms::$module -> config['css_style'] );

include ICMS_ROOT_PATH . '/footer.php';
?>