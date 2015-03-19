<?php
/**
 * The base configurations of the lang-php & example3.
 *
 * This document has the following configuration: index.
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

include_once 'fy-load.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $alang['lang_page_title']; ?></title>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="../assets/css/demo-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="../assets/css/demo.css">
    <!--<![endif]-->
    <script src="../assets/js/lang.js"></script>
</head>
<body>
<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head"><?php echo $alang['lang_demo_title']; ?></h1>
        <p class="splash-subhead"><?php echo $alang['feature-readme']; ?></p>
        <p><?php echo $alang['lang_available']; ?></p>
        <span class="footnote"><?php echo $alang['switch_lang_zh-cn']; ?> ( <a href="?lang=zh-cn"><?php echo $alang['lang_mode_a']; ?></a> & <a href="javascript:lang('zh-cn')"><?php echo $alang['lang_mode_b']; ?></a> )
        <br/><?php echo $alang['switch_lang_zh-tw']; ?> ( <a href="?lang=zh-tw"><?php echo $alang['lang_mode_a']; ?></a> & <a href="javascript:lang('zh-tw')"><?php echo $alang['lang_mode_b']; ?></a> )
        <br/><?php echo $alang['switch_lang_en-us']; ?> ( <a href="?lang=en-us"><?php echo $alang['lang_mode_a']; ?></a> & <a href="javascript:lang('en-us')"><?php echo $alang['lang_mode_b']; ?></a> )</span>
        <br /><br />
        <div class="note"><?php echo $alang['lang_note']; ?></div>
    </div>
</div>
<?php include "../modules/analytics.php"; ?>
</body>
</html>