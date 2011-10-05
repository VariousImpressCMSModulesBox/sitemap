<?php
function b_sitemap_news(){
	// news
    $block = sitemap_get_categoires_map( icms::$xoopsDB -> prefix( 'topics' ), 'topic_id', 'topic_pid', 'topic_title', 'index.php?storytopic=', 'topic_title' );
	return $block;
}
?>