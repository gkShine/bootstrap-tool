<!DOCTYPE html>
<html lang="zh-cn">
<?php $title = 'Bootstrap 中文文档'; ?>
<?php include_once('header.php'); ?>
<body class="bs-docs-home">
<a class="sr-only sr-only-focusable" href="http://v3.bootcss.com/#content">Skip to main content</a>

<!-- Docs master nav -->
<?php $nav = 'index'; ?>
<?php include_once('nav.php'); ?>

<!-- Page content of course! -->
<main class="bs-docs-masthead" id="content" role="main">
    <div class="container">
        <span class="bs-docs-booticon bs-docs-booticon-lg bs-docs-booticon-outline">B</span>

        <p class="lead">Bootstrap 是最受欢迎的 HTML、CSS 和 JS 框架，用于开发响应式布局、移动设备优先的 WEB 项目。</p>

        <p class="lead">
            <a href="http://v3.bootcss.com/getting-started#download" class="btn btn-outline-inverse btn-lg"
               onclick="ga(&#39;send&#39;, &#39;event&#39;, &#39;Jumbotron actions&#39;, &#39;Download&#39;, &#39;Download 3.3.0&#39;);">下载
                Bootstrap</a>
        </p>

        <p class="version">当前版本： v3.3.0 | 文档更新于：2014-10-31</p>

    </div>
</main>
<?php include_once('footer.php'); ?>
</body>
</html>