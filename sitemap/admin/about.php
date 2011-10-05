<?php
/**
* Sitemap - a sitemap module for ImpressCMS
*
* File: admin/about.php
*
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Sitemap
* @since		1.40
* @author		McDonald
* @version		$Id$
*/
include_once '../../../include/cp_header.php';
$aboutObj = new icms_ipf_About();
$aboutObj -> render();
?>