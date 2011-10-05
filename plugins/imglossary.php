<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : imGlossary for Sitemap
 *
 * Name					: 	imglossary.php
 * By					: 	McDonald
 *
 * Necessary modules	:	Sitemap 1.40
 *							imGlossary 1.03
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_imglossary() {
	$myts =& MyTextSanitizer::getInstance();
	$result = icms::$xoopsDB -> query( 'SELECT categoryID, name FROM ' . icms::$xoopsDB -> prefix( 'imglossary_cats' ) . ' ORDER BY name' );
	$ret = array() ;
	while ( list( $id, $name ) = icms::$xoopsDB -> fetchRow( $result ) ) {
		$ret['parent'][] = array(
			'id' => $id,
			'title' => $myts -> htmlSpecialChars( $name ),
			'url' => 'category.php?categoryID=$id'
		);
	}
	return $ret;
}
?>