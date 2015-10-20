<?php

/**
 * Class Gaboo_Bells
 */
final class Gaboo_Bells
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-bells', array(
            'types' => array( 'gaboo-bell' ),
            'taxonomies' => array(
                'gaboo-bell-category',
                'gaboo-bell-tag',
            ),
        ) );
    }
}