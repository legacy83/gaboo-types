<?php

/**
 * Class Gaboo_Testimonials
 */
final class Gaboo_Testimonials
{
    public function __after_setup_theme()
    {
        add_theme_support( 'gaboo-types-testimonials', array(
            'types' => array( 'gaboo-testimonial' ),
            'taxonomies' => array(
                'gaboo-testimonial-category',
                'gaboo-testimonial-tag',
            ),
        ) );
    }
}