<?php
/**
 * The base configurations of the lang-php & example1.
 *
 * This document has the following configuration: en-US.
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

setcookie("mark_lang", "en-us", time() + (3600 * 24 * 30), '/');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-defined selection & directory-style presentations v2.0</title>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="../../assets/css/demo-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="../../assets/css/demo.css">
    <!--<![endif]-->
</head>
<body>
<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">User-defined selection & directory-style presentations</h1>
        <p class="splash-subhead">After the first run of the steering 'Global' the directory, After selecting the language directories matching steering, With memory function.<br /><br /></p>
        <p>Available Languages:</p>
        <a href="../zh-cn">简体中文 (中国)</a>  | <a href="../zh-tw">繁體中文 (中國)</a> | <a href="../en-us">United States (English)</a>
    </div>
</div>
<?php include "../../modules/analytics.php"; ?>
</body>
</html>