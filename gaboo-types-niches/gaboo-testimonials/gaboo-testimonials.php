<?php
/**
 * Plugin Name: Gaboo Types \\ Testimonials
 * Plugin URI: https://trsenna.repositoryhosting.com/trac/trsenna_gaboo-types
 * Description: A complete testimonials solution for the current website.
 *
 * Version: 0.1.0
 * Author: Thiago Senna
 * Author URI: http://thremes.com.br
 *
 * @package   GabooTestimonials
 * @author    Thiago Senna <thiago@thremes.com.br>
 * @copyright Copyright (c) 2015, Thiago Senna
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

add_action( 'gaboo_back_compat_safe', 'gaboo_testimonials_safe_includes' );
add_action( 'gaboo_back_compat_safe', 'gaboo_testimonials_safe_bootstrap' );

/**
 * Safely continues
 * ... with the includes needed by the plugin
 */
function gaboo_testimonials_safe_includes()
{
    require_once( 'includes/class-gaboo-testimonials.php' );
}

/**
 * Safely continues
 * ... with the plugin bootstrap
 */
function gaboo_testimonials_safe_bootstrap()
{
    __gaboo_after_setup_theme( new Gaboo_Testimonials() );
}