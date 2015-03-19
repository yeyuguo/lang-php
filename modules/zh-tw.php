<!DOCTYPE HTML>
<html>
<head>
	<title>PHP 多國語框架及 & 官方網站</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="assets/icon/logo.ico" type="image/icon"/>
	<meta name="description" content="PHP,多國語框架 by @FengYi" />
	<meta name="keywords" content="PHP, PHP 框架, PHP框架, PHP 多國語框架, PHP多國語框架, PHP 多語言, PHP多國語, by @FengYi" />
	<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/init.zh-cn.js"></script>
	<script src="assets/js/lang.js"></script>
	<noscript>
		<link rel="stylesheet" href="assets/css/skel.css" />
		<link rel="stylesheet" href="assets/css/style.zh-cn.css" />
		<link rel="stylesheet" href="assets/css/style-xlarge.css" />
	</noscript>
</head>

<body class="page-landing">
<div id="wrapper">
	<section id="intro">
		<h1>PHP 多國語框架 v2.0</span></h1>
		<p>這是一個輕量級，底層架構的網站和 Web 應用程序。它的設計能夠讓你網站搭建起來更簡單，更快，更高效。</p>
		<footer>
			<ul class="actions">
				<li><a href="http://go.fengyi.mobi/?l=5" class="button special">獲取最新版</a></li>
				<li><a href="http://go.fengyi.mobi/?l=4" class="button">官方文章</a></li>
				<li><a href="?l=docs" target="_blank" class="button alt">快速指南</a></li>
			</ul>
			<span class="footnote">简体中文 (中国) ( <a href="?lang=zh-cn">模式 1</a> & <a href="javascript:lang('zh-cn')">模式 2</a> )
			<br/>繁體中文 (中國) ( <a href="?lang=zh-tw">模式 1</a> & <a href="javascript:lang('zh-tw')">模式 2</a> )
			<br/>United States (English) ( <a href="?lang=en-us">模式 1</a> & <a href="javascript:lang('en-us')">模式 2</a> )</span>
			<br /><br />
			<div class="note">模式 1：URL 後綴顯示參數； & 模式 2：通過 javascript 完全隱藏參數。</div>
		</footer>
	</section>

	<section class="extra">
		<h2>用戶自定義選擇 & 目錄式</h2>
		<p>首次運行後轉向 Global 目錄，選擇後轉向匹配的語言目錄，帶記憶功能。</p>
		<footer>
			<ul class="actions vertical">
				<li><a href="example1" target="_blank" class="button fit">演示</a></li>
				<li><a href="?l=docs&#examples-1" target="_blank" class="button alt fit">文檔</a></li>
			</ul>
		</footer>
	</section>

	<section class="extra">
		<h2>內部加載文件 & 嵌入式</h2>
		<p>自動搜索匹配目錄下的文件，沒有搜索到則選擇默認調用文件。</p>
		<footer>
			<ul class="actions vertical">
				<li><a href="example2" target="_blank" class="button fit">演示</a></li>
				<li><a href="?l=docs&#examples-2" target="_blank" class="button alt fit">文檔</a></li>
			</ul>
		</footer>
	</section>

	<section class="extra">
		<h2>讀取配置文件 & 加載式</h2>
		<p>自動搜索匹配的語言文件並加載後調用，包括：字串符、參數等。</p>
		<footer>
			<ul class="actions vertical">
				<li><a href="example3" target="_blank" class="button">演示</a></li>
				<li><a href="?l=docs&#examples-3" target="_blank" class="button alt fit">文檔</a></li>
			</ul>
		</footer>
	</section>

	<ul id="copyright">
		<li>&copy; FengYi</li>
		<li><a href="?l=license">License</a></li>
		<li><a href="http://fengyi.tel">Contact</a></li>
		<li>Design: <a href="http://fengyi.mobi">FengYi</a></li>
	</ul>
</div>
<?php include "modules/analytics.php"; ?>
</body>
</html>