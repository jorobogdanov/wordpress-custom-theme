<?php

if ( ! class_exists( 'GB_courses' ) ) :

/**
 * Class that registers custom post type Courses
 */
class GB_courses {

    public function __construct() {
        // Register the CPT and taxonomies
		add_action( 'init', array( $this, 'cpt_courses' ) );
        add_action( 'init', array( $this, 'courses_category_taxonomy' ) );

		// Register Metaboxes
		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );

		// Save Actions
		add_action( 'save_post', array( $this, 'courses_meta_save' ) );
    }

    /**
     * Register Courses custom post type
     */
    public function cpt_courses() {
        $labels = array(
			'name'                  => _x( 'Courses', 'Post type general name', 'gb-plugin' ),
			'singular_name'         => _x( 'Course', 'Post type singular name', 'gb-plugin' ),
			'menu_name'             => _x( 'Courses', 'Admin Menu text', 'gb-plugin' ),
			'name_admin_bar'        => _x( 'Course', 'Add New on Toolbar', 'gb-plugin' ),
			'add_new'               => __( 'Add New', 'gb-plugin' ),
			'add_new_item'          => __( 'Add New Course', 'gb-plugin' ),
			'new_item'              => __( 'New Course', 'gb-plugin' ),
			'edit_item'             => __( 'Edit Course', 'gb-plugin' ),
			'view_item'             => __( 'View Course', 'gb-plugin' ),
			'all_items'             => __( 'All Courses', 'gb-plugin' ),
			// 'search_items'          => __( 'Search Courses', 'gb-plugin' ),
			// 'parent_item_colon'     => __( 'Parent Courses:', 'gb-plugin' ),
			// 'not_found'             => __( 'No Courses found.', 'gb-plugin' ),
			// 'not_found_in_trash'    => __( 'No Courses found in Trash.', 'gb-plugin' ),
			// 'featured_image'        => _x( 'Course Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'gb-plugin' ),
			// 'archives'              => _x( 'Course archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'gb-plugin' ),
			// 'insert_into_item'      => _x( 'Insert into Course', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'gb-plugin' ),
			// 'uploaded_to_this_item' => _x( 'Uploaded to this Course', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'gb-plugin' ),
			// 'filter_items_list'     => _x( 'Filter Courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'gb-plugin' ),
			// 'items_list_navigation' => _x( 'Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'gb-plugin' ),
			// 'items_list'            => _x( 'Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'gb-plugin' ),
		);

        $args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-welcome-learn-more',
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
				'excerpt',
				'revisions',
			),
			'show_in_rest'       => true
		);

        register_post_type( 'course', $args );
    }

    /**
     * Register categories custom taxonomy for the Courses custom post type
     */
    public function courses_category_taxonomy() {
		$labels = array(
			'name' => 'Categories',
			'singular_name' => 'Category',

		);

		$args = array(
			'labels'       => $labels,
			'show_in_rest' => true,
			'hierarchical' => true,
		);

		register_taxonomy( 'course-category', 'course', $args );

	}

	/**
	 * Register meta box Is featured
	 */
	public function register_meta_boxes() {
		add_meta_box( 'featured', __( 'Is Featured?', 'gb-plugin' ), array( $this, 'courses_featured_metabox_callback' ), 'course', 'side' );
	}

	/**
	 * Callback function for the meta box
	 */
	public function courses_featured_metabox_callback ( $post_id ) {
		$checked = get_post_meta( $post_id->ID, 'is_featured', true );
		?>
		<div>
			<label for='is-featured'>Featured</label>
			<input id='is-featured' name='isfeatured' type='checkbox' value='1' <?php checked( $checked, 1, true ); ?>/>
		</div>
		<?php
	}

	/**
	 * Save post meta from the Featured meta box 
	 */
	public function courses_meta_save ( $post_id ) {
		if ( empty( $post_id ) ) {
			return;
		}

		$featured = '';

		if ( isset( $_POST['isfeatured'] ) ) {
			$featured = esc_attr( $_POST['isfeatured'] );
		}

		update_post_meta( $post_id, 'is_featured', $featured );
	}
}

$gb_courses_instance = new GB_courses();

endif;