<?php

/**
 * Class Gaboo_Types_Whistles
 */
final class Gaboo_Types_Whistles
{
    const FEATURE = 'gaboo-types-whistles';

    const WHISTLE = 'gaboo-whistle';
    const WHISTLE_CATEGORY = 'gaboo-whistle-category';
    const WHISTLE_TAG = 'gaboo-whistle-tag';

    public function __plugins_loaded()
    {
        add_action( 'init', array( $this, 'register_types' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
    }

    /**
     * Register custom post types.
     */
    public function register_types()
    {
        if ( gaboo_types_supports( self::FEATURE, self::WHISTLE ) ) {
            $labels = gaboo_types_labels( self::WHISTLE, 'Whistle', 'Whistles' );
            gaboo_types_register_private_type( self::WHISTLE, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-art',
                'description' => __( 'Whistles', 'gaboo-types' ),
                'supports' => array( 'title', 'editor' ),
                'taxonomies' => array( self::WHISTLE_CATEGORY, self::WHISTLE_TAG ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::WHISTLE_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::WHISTLE_CATEGORY, 'Whistle Category', 'Whistle Categories' );
            gaboo_types_register_private_taxonomy( self::WHISTLE_CATEGORY, self::WHISTLE, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::WHISTLE_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::WHISTLE_TAG, 'Whistle Tag', 'Whistle Tags' );
            gaboo_types_register_private_taxonomy( self::WHISTLE_TAG, self::WHISTLE, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}