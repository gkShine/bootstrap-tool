<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 14/12/20
 * Time: 下午5:17
 */
if (isset($_POST['config']) && $_POST['config']) {
    $config = $_POST['config'];
    if (isset($_POST['res']) && $_POST['res']) {
        $fp = fopen("./vars/" . $_POST['res'] . "variables.less", "w");
        $fcp = fopen("./config/" . $_POST['res'] . "config.json", "w");
    } else {
        $fp = fopen("./vars/variables.less", "w");
        $fcp = fopen("./config/config.json", "w");
    }
    fwrite($fcp, json_encode($config));
    fclose($fcp);
    $config['vars'] = array_merge(
        $config['vars'], [
        '@zindex-navbar' => 1000,
        '@zindex-dropdown' => 1000,
        '@zindex-popover' => 1060,
        '@zindex-tooltip' => 1070,
        '@zindex-navbar-fixed' => 1030,
        '@zindex-modal' => 1040,
        '@path' => '"../bower_components/bootstrap/less"'
    ]
    );
    foreach ($config['vars'] as $k => $var) {
        fwrite($fp, $k . ': ' . $var . ';' . "\r\n");
    }
    $csses = $config['css'];
    $csses = array_merge(["mixins.less", "normalize.less", "print.less", "scaffolding.less", "utilities.less"], $csses);
    foreach ($csses as $css) {
        fwrite($fp, '@import "@{path}/' . $css . '";' . "\r\n");
    }
    fclose($fp);
}
