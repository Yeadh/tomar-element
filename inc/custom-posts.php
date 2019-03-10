<?php

if ( ! function_exists('tomar_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function tomar_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'tomar' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'tomar' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'tomar' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'tomar' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'tomar' ),
                'add_new_item'       => __( 'Add New Portfolio', 'tomar' ),
                'new_item'           => __( 'New Portfolio', 'tomar' ),
                'edit_item'          => __( 'Edit Portfolio', 'tomar' ),
                'view_item'          => __( 'View Portfolio', 'tomar' ),
                'all_items'          => __( 'All Portfolio', 'tomar' ),
                'search_items'       => __( 'Search Portfolio', 'tomar' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'tomar' ),
                'not_found'          => __( 'No Portfolio found.', 'tomar' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'tomar' )
            ),

            'description'        => __( 'Description.', 'tomar' ),
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
                    'name' => __( 'Portfolio Category', 'tomar' ),
                    'add_new_item'      => __( 'Add New Category', 'tomar' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'tomar_custom_post_type' );

}