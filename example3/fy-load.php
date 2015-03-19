<?php
/**
 * The base configurations of the lang-php & example3.
 *
 * This document has the following configuration: fy-load.
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

if( isSet($_GET['lang']) )
{
	$GLOBALS['lang'] = $_GET['lang'];

	/** Cookie: Setting, Register */
	$_SESSION['lang'] = $lang;
	setcookie("lang", strtolower($lang), time() + (3600 * 24 * 30), '/');
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
 * 使用时，自定义主接口即可。
 *
 * When using custom master interface.
 *
 */
if( isSet($_COOKIE['lang']) )
{
	if(file_exists("languages/".$_COOKIE['lang'].".php")) {
		include "languages/".$_COOKIE['lang'].".php";
	} else {
		include "languages/en-us.php";
	}
}
else
{
	if(file_exists("languages/".$lang.".php")) {
		include "languages/".$lang.".php";
	} else {
		include "languages/en-us.php";
	}
}
?>