<?php

/**
 * Class Gaboo_Types_Book_Library
 */
final class Gaboo_Types_Book_Library
{
    const FEATURE = 'gaboo-types-book-library';

    const BOOK = 'gaboo-book';
    const BOOK_CATEGORY = 'gaboo-book-category';
    const BOOK_TAG = 'gaboo-book-tag';

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
        if ( gaboo_types_supports( self::FEATURE, self::BOOK ) ) {
            $labels = gaboo_types_labels( self::BOOK, 'Book', 'Books' );
            gaboo_types_register_public_type( self::BOOK, array(
                'labels' => $labels,
                'menu_icon' => 'dashicons-book',
                'description' => __( 'Book Items', 'gaboo-types' ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies' => array( self::BOOK_CATEGORY, self::BOOK_TAG ),
            ) );
        }
    }

    /**
     * Register custom taxonomies.
     */
    public function register_taxonomies()
    {
        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::BOOK_CATEGORY ) ) {
            $labels = gaboo_types_taxonomy_labels( self::BOOK_CATEGORY, 'Book Category', 'Book Categories' );
            gaboo_types_register_public_taxonomy( self::BOOK_CATEGORY, self::BOOK, array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            ) );
        }

        if ( gaboo_types_supports_taxonomy( self::FEATURE, self::BOOK_TAG ) ) {
            $labels = gaboo_types_taxonomy_labels( self::BOOK_TAG, 'Book Tag', 'Book Tags' );
            gaboo_types_register_public_taxonomy( self::BOOK_TAG, self::BOOK, array(
                'labels' => $labels,
                'hierarchical' => FALSE,
            ) );
        }
    }
}