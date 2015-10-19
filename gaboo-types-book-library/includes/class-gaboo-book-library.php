<?php

/**
 * Class Gaboo_Book_Library
 */
final class Gaboo_Book_Library
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-book-library', array(
            'types' => array( 'gaboo-book' ),
            'taxonomies' => array(
                'gaboo-book-category',
                'gaboo-book-tag',
            ),
        ) );

        add_filter( 'gaboo_types_labels', array( $this, 'types_labels' ), 10, 2 );
    }

    /**
     * Override default book labels.
     *
     * @param $labels
     * @param $post_type
     *
     * @return mixed
     */
    public function types_labels( $labels, $post_type )
    {
        if ( 'gaboo-book' === $post_type ) {
            $labels[ 'menu_name' ] = esc_html__( 'Book Library', 'gaboo-book-library' );
        }

        return $labels;
    }
}