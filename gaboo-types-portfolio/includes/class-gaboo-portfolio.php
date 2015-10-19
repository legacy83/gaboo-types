<?php

/**
 * Class Gaboo_Portfolio
 */
final class Gaboo_Portfolio
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-portfolio', array(
            'types' => array( 'gaboo-project' ),
            'taxonomies' => array(
                'gaboo-project-category',
                'gaboo-project-tag',
            ),
        ) );

        add_filter( 'gaboo_types_labels', array( $this, 'types_labels' ), 10, 2 );
    }

    /**
     * Override default project labels.
     *
     * @param $labels
     * @param $post_type
     *
     * @return mixed
     */
    public function types_labels( $labels, $post_type )
    {
        if ( 'gaboo-project' === $post_type ) {
            $labels[ 'menu_name' ] = esc_html__( 'Portfolio', 'gaboo-portfolio' );
        }

        return $labels;
    }
}