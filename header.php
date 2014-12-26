<?php $ress = isset($_GET['res']) ? $_GET['res'] : ''; ?>
<?php
if ($ress && !file_exists('./vars/' . $ress . 'variables.less')) {
    $res = '';
} else {
    $res = $ress;
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap - 简洁、直观、强悍、移动设备优先的前端开发框架，让web开发更迅速、简单。">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="author" content="林盛 &lt;linren_888@126.com&gt;">

    <title><?php echo $title;?></title>

    <!-- Bootstrap core CSS -->
    <link href="./bower_components/bootstrap/less/bootstrap.less" rel="stylesheet/less">
    <?php if($res):?>
    <link href="./vars/<?php echo $res;?>variables.less" rel="stylesheet/less">
    <?php endif;?>
    <!-- Documentation extras -->
    <link href="http://v3.bootcss.com/assets/css/docs.min.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://v3.bootcss.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./resource/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="http://v3.bootcss.com/apple-touch-icon.png">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <script src="./resource/less.js"></script>
</head>