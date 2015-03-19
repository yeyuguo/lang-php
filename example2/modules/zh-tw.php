<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>內部加載文件 & 嵌入式演示 v2.0</title>
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
        <h1 class="splash-head">內部加載文件 & 嵌入式演示</h1>
        <p class="splash-subhead">自動搜索匹配目錄下的文件，<br />沒有搜索到則選擇默認調用文件。<br /><br /></p>
        <p>可用語言：</p>
        <span class="footnote">简体中文 (中国) ( <a href="?lang=zh-cn">模式 1</a> & <a href="javascript:lang('zh-cn')">模式 2</a> )
        <br/>繁體中文 (中國) ( <a href="?lang=zh-tw">模式 1</a> & <a href="javascript:lang('zh-tw')">模式 2</a> )
        <br/>United States (English) ( <a href="?lang=en-us">模式 1</a> & <a href="javascript:lang('en-us')">模式 2</a> )</span>
        <br /><br />
        <div class="note">模式 1：URL 後綴顯示參數；<br/>模式 2：通過 javascript 完全隱藏參數。</div>
    </div>
</div>
<?php include "../modules/analytics.php"; ?>
</body>
</html>