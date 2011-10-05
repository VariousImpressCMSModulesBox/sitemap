<?php
/**
* Sitemap - Automatically sitemapping module for ImpressCMS
*
*
* File: include/sitemap.php
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

function sitemap_show() {
	global $icmsConfig;
	$plugin_dir = ICMS_ROOT_PATH . '/modules/sitemap/plugins/';

	// invisible weights
	$invisible_weights = array();
	if ( trim( icms::$module -> config['invisible_weights'] ) !== '' ) {
		$invisible_weights = explode( ',' , icms::$module -> config['invisible_weights'] );
	}

	// invisible dirnames
	$invisible_dirnames = empty( icms::$module -> config['invisible_dirnames'] ) ? '' : str_replace( ' ' , '' , icms::$module -> config['invisible_dirnames'] ) . ',';

	$block = array();

	@$block['lang_home'] = _MD_SITEMAP_HOME;
	@$block['lang_close'] = _CLOSE;
	$module_handler = icms::handler( 'icms_module' );
	$criteria = new icms_db_criteria_Compo( new icms_db_criteria_Item( 'hasmain', 1 ) );
	$criteria -> add( new icms_db_criteria_Item( 'isactive', 1 ) );
	$modules =& $module_handler -> getObjects( $criteria, true );
	$moduleperm_handler = icms::handler( 'icms_member_groupperm' );
	$groups = is_object( icms::$user ) ? icms::$user -> getGroups() : XOOPS_GROUP_ANONYMOUS;
	$read_allowed = $moduleperm_handler -> getItemIds( 'module_read', $groups );
	foreach ( array_keys( $modules ) as $i ) {
		if ( in_array( $i, $read_allowed ) && ! in_array( $modules[$i] -> getVar( 'weight' ), $invisible_weights ) && ! stristr( $invisible_dirnames , $modules[$i] -> getVar( 'dirname' ) . ',' ) ) {
			if ( $modules[$i] -> getVar( 'dirname' ) == 'sitemap' ) {
				continue;
			}
			$block['modules'][$i]['id'] = $i;
			$block['modules'][$i]['name'] = $modules[$i] -> getVar( 'name' );
			$block['modules'][$i]['directory'] = $modules[$i] -> getVar( 'dirname' );
			$old_error_reporting = error_reporting();
			error_reporting( $old_error_reporting & ( ~E_NOTICE ) );
			$sublinks =& $modules[$i] -> subLink();
			error_reporting( $old_error_reporting );
			if ( count( $sublinks ) > 0 ) {
				foreach ( $sublinks as $sublink ) {
					$block['modules'][$i]['sublinks'][] = array( 'name' => $sublink['name'], 'url' => ICMS_URL . '/modules/' . $modules[$i] -> getVar( 'dirname' ) . '/' . $sublink['url'] );
				}
			} else {
				$block['modules'][$i]['sublinks'] = array();
			}

			//  plugin modules/DIRNAME/include/sitemap.plugin.php
			//  lang   modules/DIRNAME/language/LANG/sitemap.php
			$mod = $modules[$i] -> getVar( 'dirname' );
			$mydirname = $mod;

			// get $mytrustdirname for D3 modules
			$mytrustdirname = '';
			if ( defined( 'ICMS_TRUST_PATH' ) && file_exists( ICMS_ROOT_PATH . '/modules/' . $mydirname . '/mytrustdirname.php' ) ) {
				@include ICMS_ROOT_PATH . '/modules/' . $mydirname . '/mytrustdirname.php';
			}

			$mod_plugin_file = ICMS_ROOT_PATH . '/modules/' . $mod . '/include/sitemap.plugin.php';

			if ( file_exists( $mod_plugin_file ) ) {
				// module side plugin under ICMS_ROOT_PATH (1st priority)
				$mod_plugin_lng = ICMS_ROOT_PATH . '/modules/' . $mod . '/language/' . $icmsConfig['language'] . '/sitemap.php';
				if ( file_exists( $mod_plugin_lng ) ) {
					include_once ( $mod_plugin_lng );
				} else {
					$mod_plugin_lng = ICMS_ROOT_PATH . '/modules/' . $mod . '/language/english/sitemap.php';
					if ( file_exists( $mod_plugin_lng ) ) {
						include_once ( $mod_plugin_lng );
					}
				}
				require_once $mod_plugin_file;
				// call the function
				if ( function_exists( 'b_sitemap_' . $mod ) ) {
					$_tmp = call_user_func( 'b_sitemap_' . $mod, $mydirname );
					if ( isset( $_tmp['parent'] ) ) {
						$block['modules'][$i]['parent'] = $_tmp['parent'];
					}
				}
			} else if ( ! empty( $mytrustdirname ) && file_exists( ICMS_TRUST_PATH . '/modules/' . $mytrustdirname . '/include/sitemap.plugin.php' ) ) {
				// D3 module's plugin under xoops_trust_path (2nd priority)
				$mod_plugin_lng = ICMS_TRUST_PATH . '/modules/' . $mytrustdirname . '/language/' . $icmsConfig['language'] . '/sitemap.php';
				if ( file_exists( $mod_plugin_lng ) ) {
					include_once ( $mod_plugin_lng );
				} else {
					$mod_plugin_lng = ICMS_TRUST_PATH . '/modules/' . $mytrustdirname . '/language/english/sitemap.php';
					if ( file_exists( $mod_plugin_lng ) ) {
						include_once ( $mod_plugin_lng );
					}
				}
				require_once ICMS_TRUST_PATH . '/modules/' . $mytrustdirname . '/include/sitemap.plugin.php';
				// call the function
				if ( function_exists( 'b_sitemap_' . $mytrustdirname ) ) {
					$_tmp = call_user_func( 'b_sitemap_' . $mytrustdirname , $mydirname );
					if ( isset( $_tmp['parent'] ) ) {
						$block['modules'][$i]['parent'] = $_tmp['parent'];
					}
				}
			} else {
				// sitemap built-in plugin (last priority)
				$mod_plugin_dir = $plugin_dir ;
				$mod_plugin_file = $mod_plugin_dir . $mod . '.php';
				$mod_plugin_lng = $mod_plugin_dir . $icmsConfig['language'] . '.lng.php';

				if ( file_exists( $mod_plugin_lng ) ) {
					include_once( $mod_plugin_lng );
				} else {
					$mod_plugin_lng = $mod_plugin_dir . 'english' . '.lng.php';
					if ( file_exists( $mod_plugin_lng ) ) {
						include_once( $mod_plugin_lng );
					}
				}
				// include the plugin and call the function
				if ( file_exists( $mod_plugin_file ) ) {
					require_once $mod_plugin_file;
					// call the function
					if ( function_exists( 'b_sitemap_' . $mod ) ) {
						$_tmp = call_user_func( 'b_sitemap_' . $mod, $mydirname );
						if ( isset( $_tmp['parent'] ) ) {
							$block['modules'][$i]['parent'] = $_tmp['parent'];
						}
					}
				}
			}
		}
	}
	return $block;
}

function sitemap_get_categoires_map( $table, $id_name, $pid_name, $title_name, $url, $order='' ) {
	$mytree = new icms_view_Tree( $table, $id_name, $pid_name );	
	$sitemap = array();
	$i = 0;
	$sql = "SELECT `$id_name`,`$title_name` FROM `$table` WHERE `$pid_name`=0";
	if ( $order != '' ) {
		$sql .= " ORDER BY `$order`";
	}	
	$result = icms::$xoopsDB -> query( $sql );
	while ( list( $catid, $name ) = icms::$xoopsDB -> fetchRow( $result ) ) {
		$sitemap['parent'][$i]['id'] = $catid;
		$sitemap['parent'][$i]['title'] = icms_core_DataFilter::htmlSpecialChars( $name );
		$sitemap['parent'][$i]['url'] = $url.$catid;
		if ( icms::$module -> config['show_subcategoris'] ) { 
			$j = 0;
			$child_ary = $mytree -> getChildTreeArray( $catid, $order );
			foreach ( $child_ary as $child ) {
				$count = strlen( $child['prefix'] ) + 1; 
				$sitemap['parent'][$i]['child'][$j]['id'] = $child[$id_name];
				$sitemap['parent'][$i]['child'][$j]['title'] = icms_core_DataFilter::htmlSpecialChars( $child[$title_name] );
				$sitemap['parent'][$i]['child'][$j]['image'] = ( ( $count > 3 ) ? 4 : $count );
				$sitemap['parent'][$i]['child'][$j]['url'] = $url . $child[$id_name];	
				$j++;
			}
		}
		$i++;
	}
	return $sitemap;
}

// for modules without pid
function sitemap_get_articles_map( $table, $id_name, $title_name, $url, $order='' ) {
	$sitemap = array();
	$i = 0;
	$result = icms::$xoopsDB -> query( "SELECT `$id_name`, `$title_name` FROM `$table` WHERE `$id_name`!='' ORDER BY `$title_name`" );
	while ( list( $catid, $name ) = icms::$xoopsDB -> fetchRow( $result ) ) {
		$sitemap['parent'][$i]['id'] = $catid;
		$sitemap['parent'][$i]['title'] = icms_core_DataFilter::htmlSpecialChars( $name );
		$sitemap['parent'][$i]['url'] = $url.$catid;
		$i++;
	}
	return $sitemap;
}
?>