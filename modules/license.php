<?php
/**
 * The base configurations of the license.
 *
 * This document has the following configuration: license.
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
		$lang = $_GET['lang'];

		/** Cookie: Setting, Register */
		$_SESSION['lang'] = $lang;

		setcookie("lang", strtolower($lang), time() + (3600 * 24 * 30), '/');

		if(file_exists("modules/license/".$lang.".php")) {
			include "modules/license/".$lang.".php";
			exit();
		} else {
			include "modules/license/en-us.php";
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

	if( isSet($_COOKIE['lang']) )
	{
		if(file_exists("modules/license/".$_COOKIE['lang'].".php")) {
			include "modules/license/".$_COOKIE['lang'].".php";
		} else {
			include "modules/license/en-us.php";
		}
	}
	else
	{
		if(file_exists("modules/license/".$lang.".php")) {
			include "modules/license/".$lang.".php";
		} else {
			include "modules/license/en-us.php";
		}
	}
?>