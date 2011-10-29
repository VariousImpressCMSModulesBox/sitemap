<?php

define('_MI_SITEMAP_NAME', 'サイトマップ');
define('_MI_SITEMAP_MESSAGE', 'ここに案内文など、メッセージを表示できます。管理画面から編集してね♪');

define('_MI_SITEMAP_ADMENU_TOP', 'TOP' ) ;
define('_MI_SITEMAP_ADMENU_MYBLOCKSADMIN', 'ブロック/グループ管理' ) ;

define('_MI_SITEMAP_BLOCKNAME', 'サイトマップ');
define('_MI_SITEMAP_BLOCKDESC', 'サイトマップをブロック表示する');

define('_MI_MESSAGE', 'メッセージ');
define('_MI_MESSAGEEDSC', '');
// add by Ryuji
define('_MI_SHOW_SUBCATEGORIES', 'サブカテゴリも表示する');
define('_MI_SHOW_SUBCATEGORIESDSC', '');

define('_MI_ALLTIME_GUEST', '常にゲスト権限で表示する');
define('_MI_ALLTIME_GUESTDSC', "このモジュールをキャッシュ有効とする場合は、ここを「はい」としてください");

define('_MI_INVISIBLE_WEIGHTS', '「表示順」による非表示指定');
define('_MI_INVISIBLE_WEIGHTSDSC', 'モジュール管理画面での表示順に応じて、サイトマップ内に表示しないモジュールを指定してください。複数指定する場合は、カンマで区切ります。通常は0です。');

define('_MI_INVISIBLE_DIRNAMES', '「ディレクトリ名」による非表示指定');
define('_MI_INVISIBLE_DIRNAMESDSC', "サイトマップで非表示としたいモジュールを、ディレクトリ名で指定してください。複数指定する場合は、カンマで区切ります。<br />例) xoopsheadline,newbb");

define('_MI_SELECT_STYLE', 'Select a style');
define('_MI_SELECT_STYLE_DSC', 'Select a style to use with Sitemap.');
define('_MI_SELECT_DEFAULT', 'Default');
define('_MI_SELECT_SLICKMAP', 'Slickmap');
define('_MI_WARNING_FINAL', "This module comes as is, without any guarantees whatsoever. Although this module is not beta, it is still under active development. This release can be used in a live website or a production environment, but its use is under your own responsibility, which means the author is not responsible.");
define('_MI_WARNING_RC', "This module comes as is, without any guarantees whatsoever. This module is a <em>Release Candidate</em> and should <u>NOT</u> be used on a production web site. The module is still under active development and its use is under your own responsibility, which means the author is not responsible.");

define('_MI_SITEMAP_MODULE_GO','Start module');

define('_MI_CHANGEFREQ', 'Change frequency');
define('_MI_CHANGEFREQ_DSC','How frequently the page is likely to change. This value provides general information to search engines and may not correlate exactly to how often they crawl the page. For more information: <a href="http://www.sitemaps.org/protocol.php#changefreqdef" target="_blank">Sitemap.org</a><br />This setting is for the Google sitemap file only!');
define('_MI_CHANGEFREQ_HOURLY', 'hourly');
define('_MI_CHANGEFREQ_DAILY', 'daily');
define('_MI_CHANGEFREQ_WEEKLY', 'weekly');
define('_MI_CHANGEFREQ_MONTHY', 'monthly');
define('_MI_CHANGEFREQ_YEARLY', 'yearly');
define('_MI_PRIORITY', 'Priority');
define('_MI_PRIORITY_DSC','This value does not affect how your pages are compared to pages on other sites, it only lets the search engines know which pages you deem most important for the crawlers. For more information: <a href="http://www.sitemaps.org/protocol.php#prioritydef" target="_blank">Sitemap.org</a><br />This setting is for the Google sitemap file only!');
?>