<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: xml_google.php
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

if ( ! defined( 'SITEMAP_ROOT_CONTROLLER_LOADED' ) ) {
	if( ! file_exists( dirname(__FILE__) . '/modules/sitemap/xml_google.php' ) ) {
		die( "Don't call this file directly" );
	}
	if( ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$_SERVER['REQUEST_URI'] = str_replace( 'xml_google.php' , 'modules/sitemap/xml_google.php' , $_SERVER['REQUEST_URI'] );
	} else {
		$_SERVER['REQUEST_URI'] = '/modules/sitemap/xml_google.php';
	}
	$_SERVER['PHP_SELF'] = $_SERVER['REQUEST_URI'];
	define( 'SITEMAP_ROOT_CONTROLLER_LOADED' , 1 );
	$real_xml_google_path = dirname( __FILE__ ) . '/modules/sitemap/xml_google.php';
	chdir( './modules/sitemap/' );
	require $real_xml_google_path;
	exit ;
} else {
	require '../../mainfile.php';
}

// icms::$module -> config['alltime_guest'] = true;

// require_once ICMS_ROOT_PATH . '/class/template.php';

// icms::$module -> config['with_lastmod'] = true;

if ( function_exists( 'mb_http_output' ) ) {
	mb_http_output('pass');
}
header( 'Content-Type:text/xml; charset=utf-8' );

include_once ICMS_ROOT_PATH . '/modules/sitemap/include/sitemap.php';

$xoopsTpl = new icms_view_Tpl();

// for All-time guest mode (backup uid & set as Guest)
//if( is_object( $xoopsUser ) && ! empty( icms::$module -> config['alltime_guest'] ) ) {
//	$backup_uid = $xoopsUser->getVar('uid') ;
//	$xoopsUser = '' ;
//	$xoopsUserIsAdmin = false ;
//	$xoopsTpl->assign(array('xoops_isuser' => false, 'xoops_userid' => 0, 'xoops_uname' => '', 'xoops_isadmin' => false));
//}

$sitemap = sitemap_show();

// for All-time guest mode (restore $xoopsUser*)
//if( ! empty( $backup_uid ) && ! empty( icms::$module -> config['alltime_guest'] ) ) {
//	$member_handler =& xoops_gethandler('member');
//	$xoopsUser =& $member_handler->getUser( $backup_uid ) ;
//	$xoopsUserIsAdmin = $xoopsUser->isAdmin();
//}

$xoopsTpl -> assign( 'lastmod', gmdate( 'Y-m-d\TH:i:s\Z' ) ); // TODO
$xoopsTpl -> assign( 'sitemap', $sitemap );
$xoopsTpl -> assign( 'show_subcategoris', icms::$module -> config['show_subcategoris'] );

$xoopsTpl -> assign( 'this', array( 'mods' => icms::$module -> getVar( 'dirname' ), 'name' => icms::$module -> getVar( 'name' ) ) );

if ( is_object( @$xoopsLogger ) ) $xoopsLogger -> activated = false;
$xoopsTpl -> display( 'db:sitemap_xml_google.html' );
?>