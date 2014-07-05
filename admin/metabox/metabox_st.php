<?php

return array(
    'id' => 'metabox_st',
    'types' => array( 'post' ),
    'title' => __('Cytat/Video', 'vp_textdomain'),
    'priority' => 'high',
    'template' => array(
        array(
            'type' => 'textbox',
            'name' => 'authorname',
            'label' => __('Imię i nazwisko autora', 'vp_textdomain'),
        ),
        array(
            'type' => 'textbox',
            'name' => 'citelink',
            'label' => __('Link do źródła', 'vp_textdomain'),
        ),
    ),
);


/**
 * EOF
 */

