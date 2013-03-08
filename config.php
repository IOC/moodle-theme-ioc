<?php

$THEME->name = 'ioc';
$THEME->parents = array('leatherbound', 'canvas', 'base');
$THEME->sheets = array('ioc');
$THEME->enable_dock = true;

$THEME->layouts = array(
    // Main course page
    'standard' => array(
        'file' => 'ioc.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    )
);
