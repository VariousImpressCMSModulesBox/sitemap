<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: icms_version.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
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

global $icmsConfig;

if ( file_exists( ICMS_ROOT_PATH . '/language/'. $icmsConfig['language'] . '/moduleabout.php' ) ) {
	include_once ICMS_ROOT_PATH . '/language/'. $icmsConfig['language'] . '/moduleabout.php';
} 

$modversion['name']				= _MI_SITEMAP_NAME;
$modversion['version']			= '1.40';
$modversion['date'] 			= 'xx xxxxx 2011';
$modversion['status'] 			= '';
$modversion['status_version'] 	= '';
$modversion['author']			= 'chanoir';
$modversion['image']			= 'images/sitemap_slogo.png';
$modversion['iconsmall']		= 'images/icon_small.png'; 
$modversion['iconbig']			= 'images/sitemap_slogo.png';
$modversion['dirname']			= 'sitemap';

$modversion['support_site_url'] = 'http://community.impresscms.org/modules/newbb/viewforum.php?forum=9';
$modversion['support_site_name']= 'ImpressCMS Community Forum - Modules Support';
$modversion['submit_bug'] 		= 'http://sourceforge.net/apps/trac/impresscms/newticket?type=defect';

$modversion['description']		= 'Automatically sitemapping module made by chanoir. If you need the feature of Google sitemaps, copy modules/sitemap/xml_google.php to your ICMS root, and register ICMS_URL/xml_google.php to Google.';

// 	** Contributors **
$modversion['people']['developers'][] = '<a href="http://community.impresscms.org/userinfo.php?uid=179" target="_blank">McDonald</a>&nbsp;&nbsp;<span style="font-size: smaller;">( pietjebell31 [at] hotmail [dot] com )</span>';

$modversion['people']['other'][] = '<a href="http://astuteo.com/slickmap/" target="_blank">Astuteo</a> (SlickMap CSS)';

//	** If Release Candidate **
$modversion['warning'] = _MI_WARNING_RC;

//	** If Final  **
// $modversion['warning'] = _MI_WARNING_FINAL;

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

$modversion['hasMain'] = 1;

// Templates
$modversion['templates'][] = array (	'file' => 'sitemap_inc_eachmodule.html',
										'description' => '' );

$modversion['templates'][] = array (	'file' => 'sitemap_index.html',
										'description' => '' );

$modversion['templates'][] = array (	'file' => 'sitemap_xml_google.html',
										'description' => '' );
										
$modversion['templates'][] = array (	'file' => 'sitemap_inc_eachmodule_slickmap.html',
										'description' => '' );

// Blocks
$modversion['blocks'][] = array (	'file' => 'sitemap_blocks.php',
									'name' => _MI_SITEMAP_BLOCKNAME ,
									'description' => _MI_SITEMAP_BLOCKDESC ,
									'show_func' => 'b_sitemap_show',
									'edit_func' => 'b_sitemap_edit',
									'template' => 'sitemap_block_show.html',
									'options' => '1' );

// Preferences
$modversion['config'][] = array (	'name' => 'msgs',
									'title' => '_MI_MESSAGE',
									'description' => '_MI_MESSAGEEDSC',
									'formtype' => 'textarea',
									'valuetype' => 'text',
									'default' => _MI_SITEMAP_MESSAGE );

$modversion['config'][] = array (	'name' => 'show_subcategoris',
									'title' => '_MI_SHOW_SUBCATEGORIES',
									'description' => '_MI_SHOW_SUBCATEGORIESDSC',
									'formtype' => 'yesno',
									'valuetype' => 'int',
									'default' => 1 );

$modversion['config'][] = array (	'name' => 'invisible_weights',
									'title' => '_MI_INVISIBLE_WEIGHTS',
									'description' => '_MI_INVISIBLE_WEIGHTSDSC',
									'formtype' => 'text',
									'valuetype' => 'text',
									'default' => '0' );

$modversion['config'][] = array (	'name' => 'invisible_dirnames',
									'title' => '_MI_INVISIBLE_DIRNAMES',
									'description' => '_MI_INVISIBLE_DIRNAMESDSC',
									'formtype' => 'text',
									'valuetype' => 'text',
									'default' => '' );
									
$modversion['config'][] = array (	'name' => 'css_style',
									'title' => '_MI_SELECT_STYLE',
									'description' => '_MI_SELECT_STYLE_DSC',
									'formtype' => 'select',
									'valuetype' => 'int',
									'default' => 1,
									'options' => array( '_MI_SELECT_DEFAULT' => 1, '_MI_SELECT_SLICKMAP' => 2 ) );
?>