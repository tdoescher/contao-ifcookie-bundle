<?php

$GLOBALS['TL_DCA']['tl_content']['fields']['ifcookie_cookie'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['ifcookie_cookie'],
    'exclude'       => true,
    'inputType'     => 'text',
    'eval'          => array('rgxp' => 'flex', 'tl_class' => 'w50', 'maxlength' => '255'),
    'sql'           => array('name' => 'ifcookie_cookie', 'type' => 'string', 'length' => 255, 'default' => '')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ifcookie_show'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['ifcookie_show'],
    'exclude'       => true,
    'inputType'     => 'select',
    'options'       => array('auto', 'show', 'hide'),
    'reference'     => &$GLOBALS['TL_LANG']['tl_content']['ifcookie_options'],
    'eval'          => array('helpwizard' => false, 'chosen' => false, 'tl_class' => 'w50'),
    'sql'           => array('name' => 'ifcookie_show', 'type' => 'string', 'length' => 64, 'default' => 'auto')
);
