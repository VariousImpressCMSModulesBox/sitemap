<?php
/**
 * Sitemap - Automatically sitemapping module for ImpressCMS
 *
 * File: include/onupdate.inc.php
 *
 * @copyright	David Janssens (fiammybe)
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 *				a copy of the GNU license is enclosed.
 * ----------------------------------------------------------------------------------------------------------
 * @package		Sitemap
 * @since		1.42
 * @author		fiammybe
 * ----------------------------------------------------------------------------------------------------------
 */

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");
icms_loadLanguageFile('sitemap', 'common');
// this needs to be the latest db version

function copySitemapFile() {
	$dir = ICMS_ROOT_PATH . '/modules/sitemap/';
	$file = 'xml_google.php';
	try{
        echo '<b> xml_google.php </b> Copying...<br />';
        icms_core_Filesystem::copyRecursive($dir . $file, ICMS_ROOT_PATH .'/'. $file);
    }
    catch(Exception $e)
    {
        echo 'Message: ' .$e->getMessage();
    }
}

function deleteSitemapFile() {
    $file = 'xml_google.php';
    $origin = ICMS_ROOT_PATH . '/modules/sitemap/' . $file;

    if(is_file($origin)) {
        icms_core_Filesystem::chmod($origin);
        icms_core_Filesystem::deleteFile($origin);
        echo "<b>Sitemap File successfully deleted.</b>";
    }
}

function icms_module_update_sitemap($module) {

    //copy sitemap plugin if installed
    echo '&nbsp;&nbsp;-- <b> preparing xml_google.php </b> Copying...<br />';
    copySitemapFile();

    return TRUE;
}

function icms_module_install_sitemap($module) {

    //copy sitemap plugin if installed
    echo '&nbsp;&nbsp;-- <b> preparing xml_google.php </b> Copying...<br />';
    copySitemapFile();

    return TRUE;
}

function icms_module_uninstall_sitemap($module) {

    deleteSitemapFile();
    return TRUE;
}