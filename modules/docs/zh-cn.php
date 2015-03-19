<!DOCTYPE HTML>
<html>
<head>
    <title>快速指南 & PHP 多国语言框架</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/icon/logo.ico" type="image/icon"/>
    <meta name="description" content="快速指南 & PHP 多国语言框架" />
    <meta name="keywords" content="快速指南 & PHP 多国语言框架" />
    <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/js/prettify/prettify.css" />
    <script src="assets/js/prettify/prettify.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/skel-layers.min.js"></script>
    <script src="assets/js/init.zh-cn.js"></script>
    <script src="assets/js/lang.js"></script>
    <noscript>
        <link rel="stylesheet" href="assets/css/skel.css" />
        <link rel="stylesheet" href="assets/css/style.zh-cn.css" />
        <link rel="stylesheet" href="assets/css/style-xlarge.css" />
    </noscript>
</head>

<body class="page-docs">
<!-- Wrapper -->
<div id="wrapper">
    <section id="getting-started"><!-- getting-started -->
        <header>
            <h1>开始 & 快速指南</h1>
            <p>PHP 多国语框架 v2.0</p>
        </header>
        <p>非常感谢您使用我们的产品。</p>
        <p>本快速指南将指导您如何使用并创建。</p>
        <p>PHP 多国语框架是一个轻量级，底层架构的网站和WEB应用程序。</p>
        <p>它的设计就足以使你网站搭建起来更简单，更快，更高效，通过官方快速指南了解更多。</p>
    </section><!-- end getting-started -->

    <section id="examples"><!-- examples -->
        <h2>示例</h2>
        <p>包括：用户自定义选择目录式、内部加载文件嵌入式、读取配置文件加载式。</p>

        <section id="examples-1"><!-- examples 1 -->
            <h3>示例 1：用户自定义选择 & 目录式</h3>
            <p>首次运行后转向 Global 目录，选择后转向匹配的语言目录，带记忆功能。</p>
            <dl><dt>1. 主索引脚本。</dt>
            <dd><pre><code class="prettyprint php">&lt;?php
  session_start();

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
?&gt;</code></pre></dd>
            <dd>
                <p>源码路径：/examples1/index.php</p>
            </dd>

            <dt>2. 页面添加记忆功能。</dt><dd>
            <pre><code class="prettyprint php">&lt;?php
    setcookie("mark_lang", "en-us", time() + (3600 * 24 * 30), '/');
?&gt;</code></pre></dd>
            <dd>
                <p>源码路径：/examples1/en-us/index.php</p>
            </dd>
        </section><!-- end examples 1 -->

        <section id="examples-2"><!-- examples 2 -->
            <h3>示例 2：内部加载文件 & 嵌入式</h3>
            <p>自动搜索匹配目录下的文件，没有搜索到则选择默认调用文件。</p>
            <dl><dt>1. 主索引脚本。</dt>
            <dd><pre><code class="prettyprint php">&lt;?php
    session_start();

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
?&gt;</code></pre></dd>
            <dd>
                <p>源码路径：/examples2/index.php</p>
            </dd>

            <dt>2. 在 modules 下创建匹配的语言文件。例如：</dt><dd>
            <pre><code class="prettyprint html">en-us.php

&lt;html&gt;
&lt;body&gt;
  Embedded en-us.php files;
&lt;/body&gt;
&lt;/html&gt;

zh-cn.php

&lt;html&gt;
&lt;body&gt;
  嵌入 zh-cn.php 文件;
&lt;/body&gt;
&lt;/html&gt;

</code></pre></dd>
            <dd>
                <p>请参阅 example2/modules 目录下的文件。</p>
            </dd>
        </section><!-- end examples 2 -->

        <section id="examples-3"><!-- examples 3 -->
            <h3>示例 3：读取配置文件 & 加载式</h3>
            <p>自动搜索匹配的语言文件并加载后调用，包括：字串符、参数等。</p>
            <dl><dt>1. 加载脚本（fy-load.php）。</dt>
            <dd><pre><code class="prettyprint php">&lt;?php
    session_start();

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
?&gt;</code></pre></dd>
            <dd>
                <p>源码路径：/examples3/fy-load.php</p>
            </dd>

            <dt>2. Html 与 PHP 语言混排，例如：</dt><dd>
            <p></p>
            <pre><code class="prettyprint php">&lt;?php
    include_once 'fy-load.php';
?&gt;

&lt;html&gt;
&lt;body&gt;
    &lt;?php echo $alang['lang_available']; ?&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre></dd>
            <dd>
                <p>请参阅 /example3/languages/ 目录下的 en-us.php & zh-cn.php 文件。</p>
            </dd>

            <dt>3. 创建可匹配的语言模板。例如：</dt><dd>
            <p></p>
            <pre><code class="prettyprint php">en-us.php

&lt;?php
    $alang = array();

    $alang['lang_available']    = 'Available Languages:';
?&gt;

zh-cn.php

&lt;?php
    $alang = array();

    $alang['lang_available']    = '可用语言:';
?&gt;
</code></pre></dd>
            <dd>
                <p>请参阅 /example3/languages/ 目录下的 en-us.php, zh-cn.php 文件。</p>
            </dd>
        </section><!-- end examples 3 -->
    </section><!-- end examples -->


    <section id="supplements"><!-- supplements -->
        <h2>其它补充</h2>
        <p>补充，是指使用中隐藏用法及其它功能等。</p>

        <section id="supplements-url"><!-- supplements url
         -->
            <h3>通用 Url 转发接口</h3>
            <p>什么叫通用转发接口？</p>
            <p>例如地址为：http://lang-php.com/?l=license。 /?=l 参数是表示加载页面功能，fengyi 参数是调用 modules 目录下的 fengyi.php 文件。</p>
            <p>如果没有找到匹配的文件或者没有参数，就默认加载 home()。例如：</p>
            <dl><dt>1. 主索引脚本。</dt>
            <dd><pre><code class="prettyprint php">&lt;?php
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
?&gt;</code></pre></dd>

            <dt>2. 用户接口代码。</dt><dd>
            <pre><code class="prettyprint php">&lt;?php
    function home() {
        接口代码。
    }
?&gt;</code></pre></dd>
            <dd>
                <p>可查看的源代码文件路径为主目录 /index.php 或 example1 & example2/index.php。</p>
            </dd>

            <dl><dt>3. Nginx 转向规则。</dt>
            <dd><pre><code class="prettyprint php">if (!-e $request_filename) {
    rewrite ^/(.+)$ /?l=$1 last;
}</code></pre></dd>
            <dd>
                <p>没有使用规则前：</p>
            <dd><pre><code class="prettyprint php">http://lang-php.com/?l=license
http://lang-php.com/?l=docs
</code></pre></dd><dd>
            </dd>
            <dd>
                <p>使用后：</p>
            <dd><pre><code class="prettyprint php">http://lang-php.com/license
http://lang-php.com/docs
</code></pre></dd><dd>
            </dd>
            <dd>
                <p>官方网站已添加该规则，为保持发布版相同，请手动访问演示。</p>
            </dd>
        </section><!-- end supplements url -->

        <section id="supplements-js"><!-- supplements js -->
            <h3>使用 Javascript (JS) 切换语言并隐藏参数</h3>
            <p>什么叫通过 Javascript (JS) 来切换语言并隐藏参数？目的就是去掉后缀。</p>
            <p>使用模式 1 前：http://lang-php.com/?lang=zh-cn；</p>
            <p>使用模式 2 后：http://lang-php.com，后缀没有了。</p>
            <dl><dt>1. Javascript (JS) 脚本代码。</dt>
            <dd><pre><code class="prettyprint php">&lt;script type="text/javascript"&gt;
    function lang(value) {
        var days = '30';
      
        if (days) {
          var date = new Date();
          date.setTime(date.getTime()+(days*24*60*60*1000));
          var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = "lang"+"="+value+expires+"; path=/";
        
        var url = document.URL;
        var arr = url.split('?');
        var ar = arr[0];
        location.replace(ar);
    }
&lt;/script&gt;</code></pre></dd>
            <dd>
                <p>源码：http://lang-php.com/assets/js/lang.js</p>
            </dd>

            <dt>2. HTML 模板。</dt><dd>
            <pre><code class="prettyprint html">&lt;html&gt;
&lt;headl&gt;
    &lt;script src="lang.js"&gt;&lt;/script&gt;
&lt;/headl&gt;
&lt;body&gt;
    &lt;a href="?lang=en-us"&gt;切换&lt;/a&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre></dd>
            <dd>
                <p>请参阅 example2/index.php。</p>
            </dd>
        </section><!-- end supplements js -->
    </section><!-- end supplements -->

    <section id="upgrading"><!-- upgrading -->
        <h2>v2.0 更新说明：</h2>
        <ul class="checklist">
            <li>全新多国语官方网站和新版快速指南； * New</li>
            <li>体验多款不同版本的示例并演示； * New</li>
            <li>　- 示例 1：用户自定义选择 & 目录式； * New</li>
            <li>　- 示例 2：内部加载文件 & 嵌入式； * New</li>
            <li>　- 示例 3：读取配置文件 & 加载式； * New</li>
            <li>使用 Javascript (JS) 来切换语言并隐藏后缀； * New</li>
            <li>修复了 IE8 识别不正确；已转换小写。 * Fix</li>
        </ul>
    </section><!-- end upgrading -->

    <section id="license"><!-- license -->
        <h2>许可协议</h2>
        <p>请遵循开源 MIT 协议。</p>
        <p>Copyright &copy; FengYi</p>
        <p>特此授权，免费的，任何人获得该软件的副本及相关文档文件（“软件”），以应付在软件不受任何限制，包括但不限于使用，复制，修改，合并，发布，分发，再许可和/或销售软件的副本，并允许个人使用及商业使用，须符合下列条件：</p>
        <p>上述版权声明和本许可声明应包含在所有副本或实质性部分的软件。</p>
        <p>软件提供“AS IS”，不做任何形式的明示或暗示，包括但不限于适销性，针对特定用途的适用性和不侵权的声明。在任何情况下，作者或版权所有者对任何索赔，损害或其他责任，无论是合同诉讼，侵权行为还是其他原因等，从所引起，OUT或IN连接与软件或使用或其他交易的软件。</p>
    </section><!-- End license -->
</div><!-- End Wrapper -->

<div id="sidebar" class="skel-layers-fixed"><!-- sidebar -->
    <div class="sections"><!-- sections -->
        <ul>
            <li><a class="active" href="#getting-started" id="getting-started-link">开始</a></li>
            <li><a href="#examples" id="examples-link">示例</a>
            <ul>
                <li><a href="#examples-1" id="examples-1-link">示例 1：用户自定义选择 & 目录式</a></li>
                <li><a href="#examples-2" id="examples-2-link">示例 2：内部加载文件 & 嵌入式</a></li>
                <li><a href="#examples-3" id="examples-3-link">示例 3：读取配置文件 & 加载式</a></li>
            </ul>
            <li><a href="#supplements" id="supplements-link">其它补充</a>
            <ul>
                <li><a href="#supplements-url" id="supplements-url-link">通用 Url 转发接口</a></li>
                <li><a href="#supplements-js" id="supplements-js-link">使用 Javascript (JS) 切换语言并隐藏参数</a></li>
            </ul>
            <li><a href="#upgrading" id="upgrading-link">更新说明</a></li>
            <li><a href="#license" id="license-link">许可协议</a></li>
            <br>
            <li><a href="?l=docs&lang=zh-cn">中国 - 简体中文</a>
            <ul>
                <li><a href="?l=docs&lang=en-us">United States - English</a></li>
                <li><a href="?l=docs&lang=zh-tw">中國 - 繁體中文</a></li>
            </ul>
        </ul>
    </div>

    <footer>
        <ul class="actions small fit">
            <li><a href="/" class="button alt small fit">返回</a></li>
        </ul>


    </footer><!-- end sections -->
</div><!-- end sidebar -->
<?php include "modules/analytics.php"; ?>
</body>
</html>