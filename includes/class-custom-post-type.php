<?php
/**
 * Register all the custom post types and taxonomies
 *
 * @link      http://s2webpress.com
 * @since     1.0.0
 *
 * @package   S2_Profiles_CPT
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class S2_Profiles_CPT {

	/**
	 * Custom Post Type Construct
	 *
	 * @since     1.0.0
	 */
	public function __construct() {

		// register the post type
		add_action( 'init', array( $this, 'register_cpt' ) );

		// register the taxonomy
		add_action( 'init', array( $this, 'register_tax' ) );

	}

	/**
	 * Register s2-profiles custom post type
	 * http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 */
	public function register_cpt() {

		add_image_size( 'profiles-thumb', 300, 300, true ); // adds the profile image size

		$labels = array(
			'name'               => __( 'Profiles', 'simple-profiles' ),
			'singular_name'      => __( 'Profile', 'simple-profiles' ),
			'all_items'          => __( 'All Profiles', 'simple-profiles' ),
			'add_new'            => __( 'Add New Profile', 'simple-profiles' ),
			'add_new_item'       => __( 'Add New Profile', 'simple-profiles' ),
			'edit'               => __( 'Edit Profile', 'simple-profiles' ),
			'edit_item'          => __( 'Edit Profile', 'simple-profiles' ),
			'new_item'           => __( 'New Profile', 'simple-profiles' ),
			'view_item'          => __( 'View Profile', 'simple-profiles' ),
			'search_items'       => __( 'Search Profiles', 'simple-profiles' ),
			'not_found'          => __( 'Nothing found. Try creating a new Profile.', 'simple-profiles' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'simple-profiles' ),
			'parent_item_colon'  => ''
		);

		$args = array(
			'labels'                => $labels,
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'show_in_nav_menus'		=> false,
			'query_var'			 	=> true,
			'menu_position' 		=> 20,
			'hierarchical'			=> false,
			'menu_icon'				=>'dashicons-groups',
			'rewrite'				=> array( 'slug' => 'profiles', 'with_front' => false ),
			'has_archive' 			=> true,
			'capability_type' 		=> 'page',
			'supports' 				=> array( 'title', 'editor', 'thumbnail', 'page-attributes'  ),
		);

	 	register_post_type( 's2_profiles', $args );
	}

	/**
	 * Register the Catalog Catagories taxonomy
	 */
	public function register_tax() {

		// Adds Category taxonomy for the Profiles Custom Post Type
		$labels = array(
			'name'              => _x( 'Profile Category', 'taxonomy general name', 'simple-profiles' ),
			'singular_name'     => _x( 'Profile Category', 'taxonomy singular name', 'simple-profiles' ),
			'search_items'      => __( 'Search Profile Categories', 'simple-profiles' ),
			'all_items'         => __( 'All Profile Categories', 'simple-profiles' ),
			'parent_item'       => __( 'Parent Profile Category', 'simple-profiles' ),
			'parent_item_colon' => __( 'Parent Profile Category:', 'simple-profiles' ),
			'edit_item'         => __( 'Edit Profile Category', 'simple-profiles' ),
			'update_item'       => __( 'Update Profile Category', 'simple-profiles' ),
			'add_new_item'      => __( 'Add New Profile Category', 'simple-profiles' ),
			'new_item_name'     => __( 'New Profile Category Name', 'simple-profiles' ),
			'menu_name'         => __( 'Profile Categories', 'simple-profiles' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'profile-category', 'with_front' => false ),
		);

		register_taxonomy( 's2_profiles_cat', array( 's2_profiles' ), $args );
	}

}
