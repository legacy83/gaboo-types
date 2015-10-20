<?php
/**
 * Plugin Name: Gaboo Types
 * Plugin URI: https://trsenna.repositoryhosting.com/trac/trsenna_gaboo-types
 * Description: Adds custom post types (CPTs) that can be reused.
 *
 * Version: 0.1.0
 * Author: Thiago Senna
 * Author URI: http://thremes.com.br
 *
 * @package   GabooTypes
 * @author    Thiago Senna <thiago@thremes.com.br>
 * @copyright Copyright (c) 2015, Thiago Senna
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

add_action( 'gaboo_back_compat_safe', 'gaboo_types_safe_includes' );
add_action( 'gaboo_back_compat_safe', 'gaboo_types_safe_bootstrap' );

/**
 * Safely continues
 * ... with the includes needed by the plugin
 */
function gaboo_types_safe_includes()
{
    require_once( 'includes/class-gaboo-types-bells.php' );
    require_once( 'includes/class-gaboo-types-book-library.php' );
    require_once( 'includes/class-gaboo-types-portfolio.php' );
    require_once( 'includes/class-gaboo-types-real-estate.php' );
    require_once( 'includes/class-gaboo-types-restaurant.php' );
    require_once( 'includes/class-gaboo-types-testimonials.php' );
    require_once( 'includes/class-gaboo-types-whistles.php' );
    require_once( 'includes/gaboo-types-functions.php' );
}

/**
 * Safely continues
 * ... with the plugin bootstrap
 */
function gaboo_types_safe_bootstrap()
{
    __gaboo_plugins_loaded( new Gaboo_Types_Bells() );
    __gaboo_plugins_loaded( new Gaboo_Types_Book_Library() );
    __gaboo_plugins_loaded( new Gaboo_Types_Portfolio() );
    __gaboo_plugins_loaded( new Gaboo_Types_Real_Estate() );
    __gaboo_plugins_loaded( new Gaboo_Types_Restaurant() );
    __gaboo_plugins_loaded( new Gaboo_Types_Testimonials() );
    __gaboo_plugins_loaded( new Gaboo_Types_Whistles() );
}