<!DOCTYPE HTML>
<html>
<head>
    <title>快速指南 & PHP 多國語言框架</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/icon/logo.ico" type="image/icon"/>
    <meta name="description" content="多國語言框架 & PHP 快速指南" />
    <meta name="keywords" content="PHP 多國語言框架 & 快速指南" />
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
            <h1>開始 & 快速指南</h1>
            <p>PHP 多國語框架 v2.0</p>
        </header>
        <p>非常感謝您使用我們的產品。</p>
        <p>本快速指南將指導您如何使用並創建。</p>
        <p>PHP 多國語框架是一個輕量級，底層架構的網站和WEB應用程序。</p>
        <p>它的設計就足以使你網站搭建起來更簡單，更快，更高效，通過官方快速指南了解更多。</p>
    </section><!-- end getting-started -->

    <section id="examples"><!-- examples -->
        <h2>示例</h2>
        <p>包括：用戶自定義選擇目錄式、內部加載文件嵌入式、讀取配置文件加載式。</p>

        <section id="examples-1"><!-- examples 1 -->
            <h3>示例 1：用戶自定義選擇 & 目錄式</h3>
            <p>首次運行後轉向Global 目錄，選擇後轉向匹配的語言目錄，帶記憶功能。</p>
            <dl><dt>1. 主索引腳本。</dt>
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
                <p>源碼路徑：/examples1/index.php</p>
            </dd>

            <dt>2. 頁面添加記憶功能。</dt><dd>
            <pre><code class="prettyprint php">&lt;?php
    setcookie("mark_lang", "en-us", time() + (3600 * 24 * 30), '/');
?&gt;</code></pre></dd>
            <dd>
                <p>源碼路徑：/examples1/en-us/index.php</p>
            </dd>
        </section><!-- end examples 1 -->

        <section id="examples-2"><!-- examples 2 -->
            <h3>示例 2：內部加載文件 & 嵌入式</h3>
            <p>自動搜索匹配目錄下的文件，沒有搜索到則選擇默認調用文件。</p>
            <dl><dt>1. 主索引腳本。</dt>
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
                <p>源碼路徑：/examples2/index.php</p>
            </dd>

            <dt>2. 在 modules 下創建匹配的語言文件。例如：</dt><dd>
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
                <p>請參閱 example2/modules 目錄下的文件。</p>
            </dd>
        </section><!-- end examples 2 -->

        <section id="examples-3"><!-- examples 3 -->
            <h3>示例 3：讀取配置文件 & 加載式</h3>
            <p>自動搜索匹配的語言文件並加載後調用，包括：字串符、參數等。</p>
            <dl><dt>1. 加載腳本（fy-load.php）。</dt>
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
                <p>源碼路徑：/examples3/fy-load.php</p>
            </dd>

            <dt>2. Html 與 PHP 語言混排，例如：</dt><dd>
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
                <p>請參閱 /example3/languages/ 目錄下的 en-us.php & zh-cn.php 文件。</p>
            </dd>

            <dt>3. 創建可匹配的語言模板。例如：</dt><dd>
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
                <p>請參閱 /example3/languages​​/ 目錄下的en-us.php, zh-cn.php 文件。</p>
            </dd>
        </section><!-- end examples 3 -->
    </section><!-- end examples -->


    <section id="supplements"><!-- supplements -->
        <h2>其它補充</h2>
        <p>補充，是指使用中隱藏用法及其它功能等。</p>

        <section id="supplements-url"><!-- supplements url
         -->
            <h3>通用 Url 轉發接口</h3>
            <p>什麼叫通用轉發接口？</p>
            <p>例如地址為：http://lang-php.com/?l=license。 /?=l 參數是表示加載頁面功能，fengyi 参数是调用 modules 目录下的 fengyi.php 文件。</p>
            <p>如果沒有找到匹配的文件或者沒有參數，就默認加載home()。例如：</p>
            <dl><dt>1. 主索引腳本。</dt>
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

            <dt>2. 用戶接口代碼。</dt><dd>
            <pre><code class="prettyprint php">&lt;?php
    function home() {
        接口代碼。
    }
?&gt;</code></pre></dd>
            <dd>
                <p>可查看的源代碼文件路徑為主目錄 /index.php 或 example1 & example2/index.php。</p>
            </dd>

            <dl><dt>3. Nginx 轉向規則。</dt>
            <dd><pre><code class="prettyprint php">if (!-e $request_filename) {
    rewrite ^/(.+)$ /?l=$1 last;
}</code></pre></dd>
            <dd>
                <p>沒有使用規則前：</p>
            <dd><pre><code class="prettyprint php">http://lang-php.com/?l=license
http://lang-php.com/?l=docs
</code></pre></dd><dd>
            </dd>
            <dd>
                <p>使用後：</p>
            <dd><pre><code class="prettyprint php">http://lang-php.com/license
http://lang-php.com/docs
</code></pre></dd><dd>
            </dd>
            <dd>
                <p>官方網站已添加該規則，為保持發布版相同，請手動訪問演示。</p>
            </dd>
        </section><!-- end supplements url -->

        <section id="supplements-js"><!-- supplements js -->
            <h3>使用Javascript (JS) 切換語言並隱藏參數</h3>
            <p>什麼叫通過Javascript (JS) 來切換語言並隱藏參數？目的就是去掉後綴。</p>
            <p>使用模式 1 前：http://lang-php.com/?lang=zh-cn；</p>
            <p>使用模式 2 後：http://lang-php.com，後綴沒有了。</p>
            <dl><dt>1. Javascript (JS) 腳本代碼。</dt>
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
                <p>源碼：http://lang-php.com/assets/js/lang.js</p>
            </dd>

            <dt>2. HTML 模板。</dt><dd>
            <pre><code class="prettyprint html">&lt;html&gt;
&lt;headl&gt;
    &lt;script src="lang.js"&gt;&lt;/script&gt;
&lt;/headl&gt;
&lt;body&gt;
    &lt;a href="?lang=en-us"&gt;切換&lt;/a&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre></dd>
            <dd>
                <p>請參閱 example2/index.php。</p>
            </dd>
        </section><!-- end supplements js -->
    </section><!-- end supplements -->

    <section id="upgrading"><!-- upgrading -->
        <h2>v2.0 更新說明：</h2>
        <ul class="checklist">
            <li>全新多國語官方網站和新版快速指南； * New</li>
            <li>體驗多款不同版本的示例並演示； * New</li>
            <li>　- 示例 1：用戶自定義選擇 & 目錄式； * New</li>
            <li>　- 示例 2：內部加載文件 & 嵌入式； * New</li>
            <li>　- 示例 3：讀取配置文件 & 加載式； * New</li>
            <li>使用 Javascript (JS) 來切換語言並隱藏後綴； * New</li>
            <li>修復了 IE8 識別不正確；已轉換小寫。 * Fix</li>
        </ul>
    </section><!-- end upgrading -->

    <section id="license"><!-- license -->
        <h2>許可協議</h2>
        <p>請遵循開源 MIT 協議。</p>
        <p>Copyright &copy; FengYi</p>
        <p>特此授權，免費的，任何人獲得該軟件的副本及相關文檔文件（“軟件”），以應付在軟件不受任何限制，包括但不限於使用，複製，修改，合併，發布，分發，再許可和/或銷售軟件的副本，並允許個人使用及商業使用，須符合下列條件：</p>
        <p>上述版權聲明和本許可聲明應包含在所有副本或實質性部分的軟件。</p>
        <p>軟件提供“AS IS”，不做任何形式的明示或暗示，包括但不限於適銷性，針對特定用途的適用性和不侵權的聲明。在任何情況下，作者或版權所有者對任何索賠，損害或其他責任，無論是合同訴訟，侵權行為還是其他原因等，從所引起，OUT或IN連接與軟件或使用或其他交易的軟件。</p>
    </section><!-- End license -->
</div><!-- End Wrapper -->

<div id="sidebar" class="skel-layers-fixed"><!-- sidebar -->
    <div class="sections"><!-- sections -->
        <ul>
            <li><a class="active" href="#getting-started" id="getting-started-link">開始</a></li>
            <li><a href="#examples" id="examples-link">示例</a>
            <ul>
                <li><a href="#examples-1" id="examples-1-link">示例 1：用戶自定義選擇 & 目錄式</a></li>
                <li><a href="#examples-2" id="examples-2-link">示例 2：內部加載文件 & 嵌入式</a></li>
                <li><a href="#examples-3" id="examples-3-link">示例 3：讀取配置文件 & 加載式</a></li>
            </ul>
            <li><a href="#supplements" id="supplements-link">其它補充</a>
            <ul>
                <li><a href="#supplements-url" id="supplements-url-link">通用 Url 轉發接口</a></li>
                <li><a href="#supplements-js" id="supplements-js-link">使用 Javascript (JS) 切換語言並隱藏參數</a></li>
            </ul>
            <li><a href="#upgrading" id="upgrading-link">更新說明</a></li>
            <li><a href="#license" id="license-link">許可協議</a></li>
            <br>
            <li><a href="?l=docs&lang=zh-tw">中國 - 繁體中文</a>
            <ul>
                <li><a href="?l=docs&lang=zh-cn">中国 - 简体中文</a></li>
                <li><a href="?l=docs&lang=en-us">United States - English</a></li>
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