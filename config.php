<?php

$THEME->name = 'ioc';
$THEME->parents = array('leatherbound', 'canvas', 'base');
$THEME->sheets = array('ioc');
$THEME->enable_dock = true;

$THEME->layouts = array(
    'base' => array(
        'file' => 'general.php',
        'regions' => array(),
    ),
    'frontpage' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'report' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
);

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
