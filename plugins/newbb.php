<?php
// $Id: newbb.php,v 1.1 2005/04/07 09:23:42 gij Exp $
// FILE		::	newbb.php
// AUTHOR	::	Ryuji AMANO <info@ryus.co.jp>
// WEB		::	Ryu's Planning <http://ryus.co.jp/>

// NewBBversion/newbb2 plugin: D.J., http://xoops.org.cn

function b_sitemap_newbb() {
    $sitemap = array();

    // Get the NewBB version Info
	$module_handler = icms::handler('icms_module');
	$newbb = $module_handler->getByDirname('newbb');
	$newbb_version = intval($newbb->getInfo('version'));

	// For NewBB 2. If the syntax is wrong, correct me plz.
	if($newbb_version>=2){
		// Get All Forums with access permission
		$forum_handler =& icms::icms_Module_handler('forum', 'newbb');
		$_forums = $forum_handler->getForums(0, 'access');

		// Some transformation; Might ugly but works :=)
		$forums = array();
		$forums_sub = array();
		foreach ($_forums as $forumid => $forum) {
			if($forum->isSubForum()) $forums_sub[$forum->getVar('parent_forum')][$forumid] = array(
				    'id' => $forumid,
				    'url' => "viewforum.php?forum=".$forumid,
				    'title' => $forum->getVar('forum_name')
			);
			else $forums[$forumid] = array(
				    'id' => $forumid,
				    'cid' => $forum->getVar('cat_id'),
				    'url' => "viewforum.php?forum=".$forumid,
				    'title' => $forum->getVar('forum_name')
			);
		}
		unset($_forums);
		foreach ($forums as $id => $forum) {
			if(!empty($forums_sub[$id]))
			$forums[$id]['fchild'] =& $forums_sub[$id];
		}

		// Why not enable subcategory?
		if(icms::$module -> config["show_subcategoris"]){
			$category_handler = icms::icms_Module_handler('category', 'newbb');
			$categories = $category_handler->getAllCats('access');
		    if(count($categories)>0) foreach ( $categories as $key=>$category ) {
			    $cat_id=$category->getVar("cat_id");
			    $i=$cat_id;
		        $sitemap['parent'][$i]['id'] = $cat_id;
		        $sitemap['parent'][$i]['title'] = $category->getVar("cat_title");
		        $sitemap['parent'][$i]['url'] = "index.php?cat=".$cat_id;
		    }
		    if(count($forums)>0) foreach ( $forums as $id=>$forum ) {
			    $cid=$forum['cid'];
				$sitemap['parent'][$cid]['child'][$id] = $forum;
				$sitemap['parent'][$cid]['child'][$id]['image'] = 2;
				if(!empty($forum['fchild'])) foreach($forum['fchild'] as $_id=>$_forum){
					$sitemap['parent'][$cid]['child'][$_id] = $_forum;
					unset($_forum);
					$sitemap['parent'][$cid]['child'][$_id]['image'] = 3;
				}
				unset($forum);
			}
		// In case not enable subcategory, do the following; Sorry, I have not tested with this mode yet. If any bugs, feel free to fix.
		}else{
		    if(count($forums)>0) foreach ( $forums as $id=>$forum ) {
				$sitemap['parent'][$id] = $forum;
				if(!empty($forum['fchild'])) foreach($forum['fchild'] as $_id=>$_forum){
					$sitemap['parent'][$id]['child'][$_id] = $_forum;
					$sitemap['parent'][$cid]['child'][$id]['image'] = 2;
					unset($_forum);
				}
				unset($forum);
			}
		}
		return $sitemap;
	}
	/*
	 * My part ends, D.J. :=)
	 */
    $myts =& MyTextSanitizer::getInstance();
    if(icms::$module -> config["show_subcategoris"]){ // サブカテ表示のときのみ実行 by Ryuji
        // カテゴリを得る
        $sql = 'SELECT DISTINCT c.* FROM '.icms::$xoopsDB->prefix('bb_categories').' c, '.icms::$xoopsDB->prefix("bb_forums").' f WHERE f.cat_id=c.cat_id GROUP BY c.cat_id, c.cat_title, c.cat_order ORDER BY c.cat_order';
        $result = icms::$xoopsDB->query($sql);
        $categories = array();
        while ( $cat_row = icms::$xoopsDB->fetchArray($result) ) {
            $i = $cat_row["cat_id"];
            $sitemap['parent'][$i]['id'] = $cat_row["cat_id"];
            $sitemap['parent'][$i]['title'] = $myts->htmlSpecialChars($cat_row["cat_title"]);
            $sitemap['parent'][$i]['url'] = "index.php?cat=".$cat_row["cat_id"];
            $categories[] = $cat_row["cat_id"];
        }
    }

    // フォーラム情報取得
    $sql = "SELECT f.* FROM ".icms::$xoopsDB->prefix("bb_forums")." f LEFT JOIN ".icms::$xoopsDB->prefix("bb_categories")." c ON f.cat_id=c.cat_id ORDER BY f.forum_id";
    $result = icms::$xoopsDB->query($sql);
    //$forums = array();
    $i=0;
    while($forum_row = icms::$xoopsDB->fetchArray($result)){
        //if(in_array($forum_row["cat_id"], $categories)){
            if(icms::$module -> config["show_subcategoris"]){ // サブカテ表示のときのみ実行 by Ryuji
                $j = $forum_row["cat_id"];
    			$sitemap['parent'][$j]['child'][$i]['id'] = $forum_row["forum_id"];
    			$sitemap['parent'][$j]['child'][$i]['title'] = $myts->htmlSpecialChars($forum_row["forum_name"]);
    			$sitemap['parent'][$j]['child'][$i]['image'] = 2;
    			$sitemap['parent'][$j]['child'][$i]['url'] = "viewforum.php?forum=".$forum_row['forum_id'];
            }else{
                // サブカテ非表示ならフォーラムをルートにする
                $sitemap['parent'][$i]['id'] = $forum_row["forum_id"];
                $sitemap['parent'][$i]['title'] = $myts->htmlSpecialChars($forum_row["forum_name"]);
                $sitemap['parent'][$i]['url'] = "viewforum.php?forum=".$forum_row['forum_id'];
            }
        $i++;
        //}
    }
    //print_r($categories);
    return $sitemap;
}
?>