<?php

/**
 * Class Gaboo_Types_Restaurant
 */
final class Gaboo_Types_Restaurant
{
    const FEATURE = 'gaboo-types-restaurant';

    const FOOD = 'gaboo-food';
    const FOOD_CATEGORY = 'gaboo-food-category';
    const FOOD_TAG = 'gaboo-food-tag';

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
        if ( gaboo_types_supports( self::FEATURE, self::FOOD ) ) {
            $labels = gaboo_types_labels( self::FOOD, 'Food', 'Foods' );
            gaboo_types_register_public_type( self::FOOD, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-carrot',
                'description' => __( 'Foods', 'gaboo-types' ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies' => array( self::FOOD_CATEGORY, self::FOOD_TAG ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::FOOD_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::FOOD_CATEGORY, 'Food Category', 'Food Categories' );
            gaboo_types_register_public_taxonomy( self::FOOD_CATEGORY, self::FOOD, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::FOOD_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::FOOD_TAG, 'Food Tag', 'Food Tags' );
            gaboo_types_register_public_taxonomy( self::FOOD_TAG, self::FOOD, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}