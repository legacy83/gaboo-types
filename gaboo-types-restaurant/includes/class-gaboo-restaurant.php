<?php

/**
 * Class Gaboo_Restaurant
 */
final class Gaboo_Restaurant
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-restaurant', array(
            'types' => array( 'gaboo-food' ),
            'taxonomies' => array(
                'gaboo-food-category',
                'gaboo-food-tag',
            ),
        ) );

        add_filter( 'gaboo_types_labels', array( $this, 'types_labels' ), 10, 2 );
    }

    /**
     * Override default food labels.
     *
     * @param $labels
     * @param $post_type
     *
     * @return mixed
     */
    public function types_labels( $labels, $post_type )
    {
        if ( 'gaboo-food' === $post_type ) {
            $labels[ 'menu_name' ] = esc_html__( 'Restaurant', 'gaboo-restaurant' );
        }

        return $labels;
    }
}