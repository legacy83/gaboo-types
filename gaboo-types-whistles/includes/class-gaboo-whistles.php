<?php

/**
 * Class Gaboo_Whistles
 */
final class Gaboo_Whistles
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-whistles', array(
            'types' => array( 'gaboo-whistle' ),
            'taxonomies' => array(
                'gaboo-whistle-category',
                'gaboo-whistle-tag',
            ),
        ) );
    }
}