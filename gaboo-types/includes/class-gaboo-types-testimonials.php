<?php

/**
 * Class Gaboo_Types_Testimonials
 */
final class Gaboo_Types_Testimonials
{
    const FEATURE = 'gaboo-types-testimonials';

    const TESTIMONIAL = 'gaboo-testimonial';
    const TESTIMONIAL_CATEGORY = 'gaboo-testimonial-category';
    const TESTIMONIAL_TAG = 'gaboo-testimonial-tag';

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
        if ( gaboo_types_supports( self::FEATURE, self::TESTIMONIAL ) ) {
            $labels = gaboo_types_labels( self::TESTIMONIAL, 'Testimonial', 'Testimonials' );
            gaboo_types_register_public_type( self::TESTIMONIAL, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-testimonial',
                'description' => __( 'Customer Testimonials', 'gaboo-types' ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::TESTIMONIAL_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::TESTIMONIAL_CATEGORY, 'Testimonial Category', 'Testimonial Categories' );
            gaboo_types_register_public_taxonomy( self::TESTIMONIAL_CATEGORY, self::TESTIMONIAL, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::TESTIMONIAL_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::TESTIMONIAL_TAG, 'Testimonial Tag', 'Testimonial Tags' );
            gaboo_types_register_public_taxonomy( self::TESTIMONIAL_TAG, self::TESTIMONIAL, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}