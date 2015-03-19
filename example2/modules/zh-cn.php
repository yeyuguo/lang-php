<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>内部加载文件 & 嵌入式演示 v2.0</title>
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
        <h1 class="splash-head">内部加载文件 & 嵌入式演示</h1>
        <p class="splash-subhead">自动搜索匹配目录下的文件，<br />没有搜索到则选择默认调用文件。<br /><br /></p>
        <p>可用语言：</p>
        <span class="footnote">简体中文 (中国) ( <a href="?lang=zh-cn">模式 1</a> & <a href="javascript:lang('zh-cn')">模式 2</a> )
        <br/>繁體中文 (中國) ( <a href="?lang=zh-tw">模式 1</a> & <a href="javascript:lang('zh-tw')">模式 2</a> )
        <br/>United States (English) ( <a href="?lang=en-us">模式 1</a> & <a href="javascript:lang('en-us')">模式 2</a> )</span>
        <br /><br />
        <div class="note">模式 1：URL 后缀显示参数；<br/>模式 2：通过 javascript 完全隐藏参数。</div>
    </div>
</div>
<?php include "../modules/analytics.php"; ?>
</body>
</html>