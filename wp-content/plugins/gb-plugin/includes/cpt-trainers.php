<?php

if ( ! class_exists( 'GB_trainers' ) ) :

/**
 * Class that registers custom post type Trainers
 */
class GB_trainers {

    public function __construct() {
        // Register the CPT and taxonomies
		add_action( 'init', array( $this, 'cpt_trainers' ) );
    }

    /**
     * Register Trainers custom post type
     */
    public function cpt_trainers() {
        $labels = array(
			'name'                  => _x( 'Trainers', 'Post type general name', 'gb-plugin' ),
			'singular_name'         => _x( 'Trainer', 'Post type singular name', 'gb-plugin' ),
			'menu_name'             => _x( 'Trainers', 'Admin Menu text', 'gb-plugin' ),
			'name_admin_bar'        => _x( 'Trainer', 'Add New on Toolbar', 'gb-plugin' ),
			'add_new'               => __( 'Add New', 'gb-plugin' ),
			'add_new_item'          => __( 'Add New Trainer', 'gb-plugin' ),
			'new_item'              => __( 'New Trainer', 'gb-plugin' ),
			'edit_item'             => __( 'Edit Trainer', 'gb-plugin' ),
			'view_item'             => __( 'View Trainer', 'gb-plugin' ),
			'all_items'             => __( 'All Trainers', 'gb-plugin' ),
			// 'search_items'          => __( 'Search Trainers', 'gb-plugin' ),
			// 'parent_item_colon'     => __( 'Parent Trainers:', 'gb-plugin' ),
			// 'not_found'             => __( 'No Trainers found.', 'gb-plugin' ),
			// 'not_found_in_trash'    => __( 'No Trainers found in Trash.', 'gb-plugin' ),
			// 'featured_image'        => _x( 'Trainer Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'archives'              => _x( 'Trainer archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'gb-plugin' ),
			// 'insert_into_item'      => _x( 'Insert into Trainer', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'gb-plugin' ),
			// 'uploaded_to_this_item' => _x( 'Uploaded to this Trainer', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'gb-plugin' ),
			// 'filter_items_list'     => _x( 'Filter Trainers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'gb-plugin' ),
			// 'items_list_navigation' => _x( 'Trainers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'gb-plugin' ),
			// 'items_list'            => _x( 'Trainers list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'gb-plugin' ),
		);

        $args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-groups',
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'revisions',
			),
			'show_in_rest'       => true
		);

        register_post_type( 'trainer', $args );
    }
}

$gb_trainers_instance = new GB_trainers();
endif;