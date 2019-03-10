<?php

if ( ! function_exists('amar_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function amar_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'amar' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'amar' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'amar' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'amar' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'amar' ),
                'add_new_item'       => __( 'Add New Portfolio', 'amar' ),
                'new_item'           => __( 'New Portfolio', 'amar' ),
                'edit_item'          => __( 'Edit Portfolio', 'amar' ),
                'view_item'          => __( 'View Portfolio', 'amar' ),
                'all_items'          => __( 'All Portfolio', 'amar' ),
                'search_items'       => __( 'Search Portfolio', 'amar' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'amar' ),
                'not_found'          => __( 'No Portfolio found.', 'amar' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'amar' )
            ),

            'description'        => __( 'Description.', 'amar' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'amar' ),
                    'add_new_item'      => __( 'Add New Category', 'amar' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'amar_custom_post_type' );

}