<?php

/**
 * Class Gaboo_Real_Estate
 */
final class Gaboo_Real_Estate
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-real-estate', array(
            'types' => array( 'gaboo-property' ),
            'taxonomies' => array(
                'gaboo-property-category',
                'gaboo-property-tag',
            ),
        ) );

        add_filter( 'gaboo_types_labels', array( $this, 'types_labels' ), 10, 2 );
    }

    /**
     * Override default property labels.
     *
     * @param $labels
     * @param $post_type
     *
     * @return mixed
     */
    public function types_labels( $labels, $post_type )
    {
        if ( 'gaboo-property' === $post_type ) {
            $labels[ 'menu_name' ] = esc_html__( 'Real Estate', 'gaboo-real-estate' );
        }

        return $labels;
    }
}