<?php

return array(
    'id' => 'metabox_staircase',
    'types' => array( 'page' ),
    'title' => __('Nagłówek i podpis', 'vp_textdomain'),
    'priority' => 'high',
    'template' => array(
        array(
            'type' => 'textbox',
            'name' => 'hero',
            'label' => __('Hero text', 'vp_textdomain'),
            'description' => __('Nad nagłówkiem', 'vp_textdomain'),
        ),
        array(
            'type' => 'textarea',
            'name' => 'faksymile',
            'label' => __('Podpis', 'vp_textdomain'),
            'description' => __('Tekst pod nagłówkiem', 'vp_textdomain'),
        ),
    ),
);


/**
 * EOF
 */