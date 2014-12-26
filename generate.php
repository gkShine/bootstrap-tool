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
    foreach($config['vars'] as $k => $var){
        fwrite($fp, $k . ':' . $var . ';' . "\r\n");
    }
    fclose($fp);
}