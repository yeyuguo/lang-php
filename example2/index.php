<?php
/**
 * The base configurations of the lang-php & example2.
 *
 * This document has the following configuration: Index.
 *
 * DO NOT modify this file manually.
 *
 * @author        Yi Feng
 * @link          Http://FengYi.Mobi
 * @contact US    Http://FengYi.Tel
 * @copyright     Copyright 2013-2015 FengYi. All Rights Reserved.
 * @version       v2.0
 *
 * Service and support *
 *
 *   @homepage      http://go.fengyi.mobi/?l=20
 *   @article       http://go.fengyi.mobi/?l=4
 *   @download      http://go.fengyi.mobi/?l=5
 *   @license       http://go.fengyi.mobi/?l=6
 */

session_start();
header('Cache-control: private');

/**
 * URL 自定义接口；例如：Http://FengYi.Mobi/?l=article&type=fyd
 * URL custom interface; for example: Http://FengYi.Mobi/?l=article&type=fyd
 */
if(isset($_GET['l'])) {
	if(file_exists("modules/".$_GET['l'].".php")) {
		include "modules/".$_GET['l'].".php";
	} else {
		home();
	}
} else {
	home();	
}

/**
 *
 * 自动选择浏览器语言主接口。
 * Automatically select the browser language primary interface.
 *
 */
function home() {
	if( isSet($_GET['lang']) )
	{
		$lang = $_GET['lang'];

		/** Cookie: Setting, Register */
		$_SESSION['lang'] = $lang;

		setcookie("lang", strtolower($lang), time() + (3600 * 24 * 30), '/');

		if(file_exists("modules/".$lang.".php")) {
			include "modules/".$lang.".php";
			exit();
		} else {
			include "modules/en-us.php";
			exit();
		}
	}
	else if( isSet($_SESSION['lang']) )
	{
		$lang = $_SESSION['lang'];
	}
	else if( isSet($_COOKIE['lang']) )
	{
		$lang = $_COOKIE['lang'];
	}
	else
	{
		preg_match('/^([a-z\-]+)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);
		$lang = strtolower($matches[1]);
		setcookie("lang", strtolower($matches[1]), time() + (3600 * 24 * 30), '/');
	}

	/**
	 *
	 * 自定义主接口，更改即可。
	 * Customize main interface, you can change.
	 *
	*/
	if( isSet($_COOKIE['lang']) )
	{
		if(file_exists("modules/".$_COOKIE['lang'].".php")) {
			include "modules/".$_COOKIE['lang'].".php";
		} else {
			include "modules/en-us.php";
		}
	}
	else
	{
		if(file_exists("modules/".$lang.".php")) {
			include "modules/".$lang.".php";
		} else {
			include "modules/en-us.php";
		}
	}
}
?>