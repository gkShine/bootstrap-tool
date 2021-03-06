<?php $query = $res ? '?res=' . $res : ''; ?>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="./index.php<?php echo $query;?>" class="navbar-brand">Bootstrap</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li <?php if($nav == 'index'){echo 'class="active"';} ?>>
                    <a href="./index.php<?php echo $query;?>">起步</a>
                </li>
                <li <?php if($nav == 'css'){echo 'class="active"';} ?>>
                    <a href="./css.php<?php echo $query;?>">全局 CSS 样式</a>
                </li>
                <li <?php if($nav == 'components'){echo 'class="active"';} ?>>
                    <a href="./components.php<?php echo $query;?>">组件</a>
                </li>
                <li <?php if($nav == 'javascript'){echo 'class="active"';} ?>>
                    <a href="./javascript.php<?php echo $query;?>">JavaScript 插件</a>
                </li>
                <li <?php if($nav == 'customize'){echo 'class="active"';} ?>>
                    <a href="./customize.php<?php echo $query;?>">定制</a>
                </li>
            </ul>
        </nav>
    </div>
</header>