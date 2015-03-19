<!DOCTYPE HTML>
<html>
<head>
	<title>PHP 多国语框架 & 官方网站</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="assets/icon/logo.ico" type="image/icon"/>
	<meta name="description" content="PHP,多国语框架 by @FengYi" />
	<meta name="keywords" content="PHP, PHP 框架, PHP框架, PHP 多国语框架, PHP多国语框架, PHP 多语言, PHP多国语, by @FengYi" />
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
		<h1>PHP 多国语框架 v2.0</span></h1>
		<p>这是一个轻量级，底层架构的网站和 Web 应用程序。它的设计能够让你网站搭建起来更简单，更快，更高效。</p>
		<footer>
			<ul class="actions">
				<li><a href="http://go.fengyi.mobi/?l=5" class="button special">获取最新版</a></li>
				<li><a href="http://go.fengyi.mobi/?l=4" class="button">官方文章</a></li>
				<li><a href="?l=docs" target="_blank" class="button alt">快速指南</a></li>
			</ul>
			<span class="footnote">简体中文 (中国) ( <a href="?lang=zh-cn">模式 1</a> & <a href="javascript:lang('zh-cn')">模式 2</a> )
			<br/>繁體中文 (中國) ( <a href="?lang=zh-tw">模式 1</a> & <a href="javascript:lang('zh-tw')">模式 2</a> )
			<br/>United States (English) ( <a href="?lang=en-us">模式 1</a> & <a href="javascript:lang('en-us')">模式 2</a> )</span>
			<br /><br />
			<div class="note">模式 1：URL 后缀显示参数； & 模式 2：通过 javascript 完全隐藏参数。</div>
		</footer>
	</section>

	<section class="extra">
		<h2>用户自定义选择 & 目录式</h2>
		<p>首次运行后转向 Global 目录，选择后转向匹配的语言目录，带记忆功能。</p>
		<footer>
			<ul class="actions vertical">
				<li><a href="example1" target="_blank" class="button fit">演示</a></li>
				<li><a href="?l=docs&#examples-1" target="_blank" class="button alt fit">文档</a></li>
			</ul>
		</footer>
	</section>

	<section class="extra">
		<h2>内部加载文件 & 嵌入式</h2>
		<p>自动搜索匹配目录下的文件，没有搜索到则选择默认调用文件。</p>
		<footer>
			<ul class="actions vertical">
				<li><a href="example2" target="_blank" class="button fit">演示</a></li>
				<li><a href="?l=docs&#examples-2" target="_blank" class="button alt fit">文档</a></li>
			</ul>
		</footer>
	</section>

	<section class="extra">
		<h2>读取配置文件 & 加载式</h2>
		<p>自动搜索匹配的语言文件并加载后调用，包括：字串符、参数等。</p>
		<footer>
			<ul class="actions vertical">
				<li><a href="example3" target="_blank" class="button">演示</a></li>
				<li><a href="?l=docs&#examples-3" target="_blank" class="button alt fit">文档</a></li>
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