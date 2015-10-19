<?php

/**
 * Checks support for a given feature/type.
 *
 * @param $feature
 * @param $type
 *
 * @return bool
 */
function gaboo_types_supports( $feature, $type )
{
    if ( current_theme_supports( $feature ) ) {
        $features = get_theme_support( $feature )[ 0 ];
        if ( $type && isset( $features[ 'types' ] ) ) {
            return in_array( $type, $features[ 'types' ] );
        }
    }

    return FALSE;
}

/**
 * Checks support for a given feature/taxonomy.
 *
 * @param $feature
 * @param $taxonomy
 *
 * @return bool
 */
function gaboo_types_supports_taxonomy( $feature, $taxonomy )
{
    if ( current_theme_supports( $feature ) ) {
        $features = get_theme_support( $feature )[ 0 ];
        if ( $taxonomy && isset( $features[ 'taxonomies' ] ) ) {
            return in_array( $taxonomy, $features[ 'taxonomies' ] );
        }
    }

    return FALSE;
}

/**
 * Register a public post type. Do not use before init.
 *
 * @param       $post_type
 * @param array $args
 */
function gaboo_types_register_public_type( $post_type, $args = array() )
{
    register_post_type( $post_type, wp_parse_args( $args, array(
        'public' => TRUE,
        'show_ui' => TRUE,
        'has_archive' => TRUE,
    ) ) );
}

/**
 * Register a private post type. Do not use before init.
 *
 * @param       $post_type
 * @param array $args
 */
function gaboo_types_register_private_type( $post_type, $args = array() )
{
    register_post_type( $post_type, wp_parse_args( $args, array(
        'public' => FALSE,
        'show_ui' => TRUE,
        'has_archive' => FALSE,
        'rewrite' => FALSE,
    ) ) );
}

/**
 * Create or modify a public taxonomy object. Do not use before init.
 *
 * @param       $taxonomy
 * @param       $object_type
 * @param array $args
 */
function gaboo_types_register_public_taxonomy( $taxonomy, $object_type, $args = array() )
{
    register_taxonomy( $taxonomy, $object_type, wp_parse_args( $args, array(
        'public' => TRUE,
        'show_ui' => TRUE,
        'show_in_nav_menus' => TRUE,
        'show_admin_column' => TRUE,
    ) ) );
}

/**
 * Create or modify a private taxonomy object. Do not use before init.
 *
 * @param       $taxonomy
 * @param       $object_type
 * @param array $args
 */
function gaboo_types_register_private_taxonomy( $taxonomy, $object_type, $args = array() )
{
    register_taxonomy( $taxonomy, $object_type, wp_parse_args( $args, array(
        'public' => FALSE,
        'show_ui' => TRUE,
        'show_in_nav_menus' => FALSE,
        'show_admin_column' => TRUE,
        'rewrite' => FALSE,
    ) ) );
}

/**
 * Build filterable custom post type labels.
 *
 * @param $post_type
 * @param $singular
 * @param $plural
 *
 * @return mixed|void
 */
function gaboo_types_labels( $post_type, $singular, $plural )
{
    return apply_filters( 'gaboo_types_labels', array(
        'name' => sprintf( esc_html__( '%s', 'gaboo-types' ), $plural ),
        'singular_name' => sprintf( esc_html__( '%s', 'gaboo-types' ), $singular ),
        'menu_name' => sprintf( esc_html__( '%s', 'gaboo-types' ), $plural ),
        'name_admin_bar' => sprintf( esc_html__( '%s', 'gaboo-types' ), $singular ),
        'all_items' => sprintf( esc_html__( 'All %s', 'gaboo-types' ), $plural ),
        'add_new' => esc_html__( 'Add New', 'gaboo-types' ),
        'add_new_item' => sprintf( esc_html__( 'Add New %s', 'gaboo-types' ), $singular ),
        'edit_item' => sprintf( esc_html__( 'Edit %s', 'gaboo-types' ), $singular ),
        'new_item' => sprintf( esc_html__( 'New %s', 'gaboo-types' ), $singular ),
        'view_item' => sprintf( esc_html__( 'View %s', 'gaboo-types' ), $singular ),
        'search_items' => sprintf( esc_html__( 'Search %s', 'gaboo-types' ), $plural ),
        'not_found' => sprintf( esc_html__( 'No %s found', 'gaboo-types' ), $plural ),
        'not_found_in_trash' => sprintf( esc_html__( 'No %s found in Trash', 'gaboo-types' ), strtolower( $plural ) ),
    ), $post_type );
}

/**
 * Build filterable taxonomy labels.
 *
 * @param $taxonomy
 * @param $singular
 * @param $plural
 *
 * @return mixed|void
 */
function gaboo_types_taxonomy_labels( $taxonomy, $singular, $plural )
{
    return apply_filters( 'gaboo_types_taxonomy_labels', array(
        'name' => sprintf( esc_html__( '%s', 'gaboo-types' ), $plural ),
        'singular_name' => sprintf( esc_html__( '%s', 'gaboo-types' ), $singular ),
        'menu_name' => sprintf( esc_html__( '%s', 'gaboo-types' ), $plural ),
        'all_items' => sprintf( esc_html__( 'All %s', 'gaboo-types' ), $plural ),
        'edit_item' => sprintf( esc_html__( 'Edit %s', 'gaboo-types' ), $singular ),
        'view_item' => sprintf( esc_html__( 'View %s', 'gaboo-types' ), $singular ),
        'update_item' => sprintf( esc_html__( 'Update %s', 'gaboo-types' ), $singular ),
        'add_new_item' => sprintf( esc_html__( 'Add New %s', 'gaboo-types' ), $singular ),
        'new_item_name' => sprintf( esc_html__( 'New %s Name', 'gaboo-types' ), $singular ),
        'parent_item' => sprintf( esc_html__( 'Parent %s', 'gaboo-types' ), $singular ),
        'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'gaboo-types' ), $singular ),
        'search_items' => sprintf( esc_html__( 'Search %s', 'gaboo-types' ), $plural ),
        'not_found' => sprintf( esc_html__( 'No %s found.', 'gaboo-types' ), strtolower( $plural ) ),
    ), $taxonomy );
}