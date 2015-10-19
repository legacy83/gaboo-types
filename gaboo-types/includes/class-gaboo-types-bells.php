<?php

/**
 * Class Gaboo_Types_Bells
 */
final class Gaboo_Types_Bells
{
    const FEATURE = 'gaboo-types-bells';

    const BELL = 'gaboo-bell';
    const BELL_CATEGORY = 'gaboo-bell-category';
    const BELL_TAG = 'gaboo-bell-tag';

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
        if ( gaboo_types_supports( self::FEATURE, self::BELL ) ) {
            $labels = gaboo_types_labels( self::BELL, 'Bell', 'Bells' );
            gaboo_types_register_private_type( self::BELL, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-art',
                'description' => __( 'Bells', 'gaboo-types' ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies' => array( self::BELL_CATEGORY, self::BELL_TAG ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::BELL_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::BELL_CATEGORY, 'Bell Category', 'Bell Categories' );
            gaboo_types_register_private_taxonomy( self::BELL_CATEGORY, self::BELL, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::BELL_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::BELL_TAG, 'Bell Tag', 'Bell Tags' );
            gaboo_types_register_private_taxonomy( self::BELL_TAG, self::BELL, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}