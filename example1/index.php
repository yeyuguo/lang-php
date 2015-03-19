<?php
/**
 * The base configurations of the lang-php & example1.
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

/**
 *
 * URL 自定义接口；例如：Http://FengYi.Mobi/?l=article&type=fyd
 * URL custom interface; for example: Http://FengYi.Mobi/l=article&type=fyd
 *
 */
if(isset($_GET['l'])) {
	if(file_exists("modules/".$_GET['l'].".php")) {
		include "modules/".$_GET['l'].".php";
		exit();
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
	if( isSet($_COOKIE['mark_lang']) )
	{
		if(is_dir($_COOKIE['mark_lang'])) {
			header("Location: ".$_COOKIE['mark_lang']);
		} else {
			header("Location: global");
		}
	}
	else
	{
		header("Location: global");
	}
}
?>