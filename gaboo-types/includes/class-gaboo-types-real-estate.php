<?php

/**
 * Class Gaboo_Types_Real_Estate
 */
final class Gaboo_Types_Real_Estate
{
    const FEATURE = 'gaboo-types-real-estate';

    const PROPERTY = 'gaboo-property';
    const PROPERTY_CATEGORY = 'gaboo-property-category';
    const PROPERTY_TAG = 'gaboo-property-tag';

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
        if ( gaboo_types_supports( self::FEATURE, self::PROPERTY ) ) {
            $labels = gaboo_types_labels( self::PROPERTY, 'Property', 'Properties' );
            gaboo_types_register_public_type( self::PROPERTY, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-building',
                'description' => __( 'Property Items', 'gaboo-types' ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies' => array( self::PROPERTY_CATEGORY, self::PROPERTY_TAG ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::PROPERTY_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::PROPERTY_CATEGORY, 'Property Category', 'Property Categories' );
            gaboo_types_register_public_taxonomy( self::PROPERTY_CATEGORY, self::PROPERTY, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::PROPERTY_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::PROPERTY_TAG, 'Property Tag', 'Property Tags' );
            gaboo_types_register_public_taxonomy( self::PROPERTY_TAG, self::PROPERTY, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}