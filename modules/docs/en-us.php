<!DOCTYPE HTML>
<html>
<head>
    <title>Quick Guide & PHP Multi-lingual framework</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/icon/logo.ico" type="image/icon"/>
    <meta name="description" content="Quick Guide & PHP Multi-lingual framework" />
    <meta name="keywords" content="Quick Guide & PHP Multi-lingual framework" />
    <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/js/prettify/prettify.css" />
    <script src="assets/js/prettify/prettify.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/skel-layers.min.js"></script>
    <script src="assets/js/init.js"></script>
    <script src="assets/js/lang.js"></script>
    <noscript>
        <link rel="stylesheet" href="assets/css/skel.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/style-xlarge.css" />
    </noscript>
</head>

<body class="page-docs">
<!-- Wrapper -->
<div id="wrapper">
    <section id="getting-started"><!-- getting-started -->
        <header>
            <h1>Start & Quick Guide</h1>
            <p>PHP Multi-lingual framework v2.0</p>
        </header>
        <p>Thank you for using our products.</p>
        <p>This quick guide will teach you how to use and create.</p>
        <p>PHP Multilingual framework is a lightweight, underlying architecture sites and WEB applications.</p>
        <p>It is designed to build up enough to make your website easier, faster and more efficient, through official quick guide to learn more.</p>
    </section><!-- end getting-started -->

    <section id="examples"><!-- examples -->
        <h2>Example</h2>
        <p>Include: user-defined selection catalog, internal loading files embedded, reads the configuration file to load type.</p>

        <section id="examples-1"><!-- examples 1 -->
            <h3>Example 1 : User-defined selection& Directory-style</h3>
            <p>After the first run of the steering Global Catalog, select the language directory after the match turned with memory function.</p>
            <dl><dt>1. Main index script.</dt>
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
                <p>Source path: /examples1/index.php</p>
            </dd>

            <dt>2. Page add memory function.</dt><dd>
            <pre><code class="prettyprint php">&lt;?php
    setcookie("mark_lang", "en-us", time() + (3600 * 24 * 30), '/');
?&gt;</code></pre></dd>
            <dd>
                <p>Source path: /examples1/en-us/index.php</p>
            </dd>
        </section><!-- end examples 1 -->

        <section id="examples-2"><!-- examples 2 -->
            <h3>Example 2 : Internal load file & Embedded</h3>
            <p>Automatic search for matching files in the directory, there is no search to select the default call files.</p>
            <dl><dt>1. Main index script.</dt>
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
                <p>Source path: /examples2/index.php</p>
            </dd>

            <dt>2. Create a matching language file in the modules. For example:</dt><dd>
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
                <p>See example2/modules file under the directory.</p>
            </dd>
        </section><!-- end examples 2 -->

        <section id="examples-3"><!-- examples 3 -->
            <h3>Example 3 : Reads the configuration file & Loaded</h3>
            <p>Automatic search for a matching language file and call after loading, including: character string and parameters.</p>
            <dl><dt>1. Load script (fy-load.php).</dt>
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
                <p>Source path: /examples3/fy-load.php</p>
            </dd>

            <dt>2. Html scramble and PHP language, examples such as:</dt><dd>
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
                <p>See /example3/languages/ directory en-us.php & zh-cn.php file.</p>
            </dd>

            <dt>3. Create a template matching language. For example:</dt><dd>
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
                <p>See /example3/languages/ directory en-us.php, zh-cn.php file.</p>
            </dd>
        </section><!-- end examples 3 -->
    </section><!-- end examples -->


    <section id="supplements"><!-- supplements -->
        <h2>Other supplements</h2>
        <p>Supplement, is the use of hidden usage and other functions.</p>

        <section id="supplements-url"><!-- supplements url
         -->
            <h3>General Url Forwarding interface</h3>
            <p>What is common forwarding interface?</p>
            <p>For example address: http://lang-php.com/?l=license.  /?=l Parameter is a function of loading pages, fengyi Argument is to call fengyi.php file modules directory.</p>
            <p>If the file is not found or no match parameters, load default home (). For example:</p>
            <dl><dt>1. Main index script.</dt>
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

            <dt>2. User interface code.</dt><dd>
            <pre><code class="prettyprint php">&lt;?php
    function home() {
        Interface code.
    }
?&gt;</code></pre></dd>
            <dd>
                <p>You can view the source code of the main directory file path /index.php or example1 & example2/index.php.</p>
            </dd>

            <dl><dt>3. Nginx turned rules.</dt>
            <dd><pre><code class="prettyprint html">if (!-e $request_filename) {
    rewrite ^/(.+)$ /?l=$1 last;
}</code></pre></dd>
            <dd>
                <p>Not using the rules before:</p>
            <dd><pre><code class="prettyprint html">http://lang-php.com/?l=license
http://lang-php.com/?l=docs
</code></pre></dd><dd>
            </dd>
            <dd>
                <p>After use:</p>
            <dd><pre><code class="prettyprint html">http://lang-php.com/license
http://lang-php.com/docs
</code></pre></dd><dd>
            </dd>
            <dd>
                <p>The official website has been added to the rule, in order to maintain the same release, please manually access the demo.</p>
            </dd>
        </section><!-- end supplements url -->

        <section id="supplements-js"><!-- supplements js -->
            <h3>Using Javascript (JS) switch the language and hidden parameters</h3>
            <p>What is called by Javascript (JS) to switch the language and hidden parameters? The purpose is to remove the suffix.</p>
            <p>Before using Mode 1 : http://lang-php.com/?lang=zh-cn;</p>
            <p>Use mode 2 : http://lang-php.com, Suffix no.</p>
            <dl><dt>1. Javascript (JS) script code.</dt>
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
                <p>Source: http://lang-php.com/assets/js/lang.js</p>
            </dd>

            <dt>2. HTML Template.</dt><dd>
            <pre><code class="prettyprint html">&lt;html&gt;
&lt;headl&gt;
    &lt;script src="lang.js"&gt;&lt;/script&gt;
&lt;/headl&gt;
&lt;body&gt;
    &lt;a href="?lang=en-us"&gt;Switching&lt;/a&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre></dd>
            <dd>
                <p>See example2/index.php.</p>
            </dd>
        </section><!-- end supplements js -->
    </section><!-- end supplements -->

    <section id="upgrading"><!-- upgrading -->
        <h2>v2.0 Update:</h2>
        <ul class="checklist">
            <li>The new multi-language quick guide to the official website and the new; * New</li>
            <li>Experience a variety of examples of the different versions and demos; * New</li>
            <li>　- Example 1 : User-defined selection & directory-style; * New</li>
            <li>　- Example 2 : Internal Load File & embedded; * New</li>
            <li>　- Example 3 : Reads the configuration file & load type; * New</li>
            <li>Using Javascript (JS) to switch the language and hide suffix; * New</li>
            <li>Fix IE8 identify incorrect; converted to lowercase. * Fix</li>
        </ul>
    </section><!-- end upgrading -->

    <section id="license"><!-- license -->
        <h2>The license agreement (MIT)</h2>
        <p>Please follow the open-source MIT protocol.</p>
        <p>Copyright &copy; FengYi</p>
        <p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>
        <p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>
        <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>
    </section><!-- End license -->
</div><!-- End Wrapper -->

<div id="sidebar" class="skel-layers-fixed"><!-- sidebar -->
    <div class="sections"><!-- sections -->
        <ul>
            <li><a class="active" href="#getting-started" id="getting-started-link">Start</a></li>
            <li><a href="#examples" id="examples-link">Example</a>
            <ul>
                <li><a href="#examples-1" id="examples-1-link">Example 1 : User-defined selection & directory-style</a></li>
                <li><a href="#examples-2" id="examples-2-link">Example 2 : Internal Load File & Embedded</a></li>
                <li><a href="#examples-3" id="examples-3-link">Example 3 : Reads the configuration file & Loaded</a></li>
            </ul>
            <li><a href="#supplements" id="supplements-link">Other supplements</a>
            <ul>
                <li><a href="#supplements-url" id="supplements-url-link">General Url Forwarding interface</a></li>
                <li><a href="#supplements-js" id="supplements-js-link">Using Javascript (JS) switch the language and hidden parameters</a></li>
            </ul>
            <li><a href="#upgrading" id="upgrading-link">Update Description</a></li>
            <li><a href="#license" id="license-link">License Agreement</a></li>
            <br>
            <li><a href="?l=docs&lang=en-us">United States - English</a>
            <ul>
                <li><a href="?l=docs&lang=zh-cn">中国 - 简体中文</a></li>
                <li><a href="?l=docs&lang=zh-tw">中國 - 繁體中文</a></li>
            </ul>
        </ul>
    </div>

    <footer>
        <ul class="actions small fit">
            <li><a href="/" class="button alt small fit">Back</a></li>
        </ul>


    </footer><!-- end sections -->
</div><!-- end sidebar -->
<?php include "modules/analytics.php"; ?>
</body>
</html>