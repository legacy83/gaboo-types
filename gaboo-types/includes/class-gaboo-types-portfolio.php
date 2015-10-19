<?php

/**
 * Class Gaboo_Types_Portfolio
 */
final class Gaboo_Types_Portfolio
{
    const FEATURE = 'gaboo-types-portfolio';

    const PROJECT = 'gaboo-project';
    const PROJECT_CATEGORY = 'gaboo-project-category';
    const PROJECT_TAG = 'gaboo-project-tag';

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
        if ( gaboo_types_supports( self::FEATURE, self::PROJECT ) ) {
            $labels = gaboo_types_labels( self::PROJECT, 'Project', 'Projects' );
            gaboo_types_register_public_type( self::PROJECT, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-portfolio',
                'description' => __( 'Portfolio Items', 'gaboo-types' ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies' => array( self::PROJECT_CATEGORY, self::PROJECT_TAG ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::PROJECT_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::PROJECT_CATEGORY, 'Project Category', 'Project Categories' );
            gaboo_types_register_public_taxonomy( self::PROJECT_CATEGORY, self::PROJECT, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::PROJECT_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::PROJECT_TAG, 'Project Tag', 'Project Tags' );
            gaboo_types_register_public_taxonomy( self::PROJECT_TAG, self::PROJECT, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}