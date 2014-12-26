<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 14/12/20
 * Time: 下午5:17
 */
$config = [
    'vars' => [],
    'css' => [
        "print.less",
        "type.less",
        "code.less",
        "grid.less",
        "tables.less",
        "forms.less",
        "buttons.less",
        "responsive-utilities.less",
        "glyphicons.less",
        "button-groups.less",
        "input-groups.less",
        "navs.less",
        "navbar.less",
        "breadcrumbs.less",
        "pagination.less",
        "pager.less",
        "labels.less",
        "badges.less",
        "jumbotron.less",
        "thumbnails.less",
        "alerts.less",
        "progress-bars.less",
        "media.less",
        "list-group.less",
        "panels.less",
        "responsive-embed.less",
        "wells.less",
        "close.less",
        "component-animations.less",
        "dropdowns.less",
        "tooltip.less",
        "popovers.less",
        "modals.less",
        "carousel.less"
    ],
    'js' => [
        "alert.js",
        "button.js",
        "carousel.js",
        "dropdown.js",
        "modal.js",
        "tooltip.js",
        "popover.js",
        "tab.js",
        "affix.js",
        "collapse.js",
        "scrollspy.js",
        "transition.js"
    ]
];
$fp = fopen("variables.less", "r");
for ($i = 1; !feof($fp); $i++) {
    $content = trim(fgets($fp));
    if (strlen($content) && strpos($content, '//') !== 0) {
        list($key, $value) = explode(':', $content);
        $config['vars'][$key] = trim($value);
    }
}
fclose($fp);
$fcp = fopen("config.json", "w");
fwrite($fcp, json_encode($config));
fclose($fcp);