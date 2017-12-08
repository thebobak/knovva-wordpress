<?php

/////////////////////////////////////////////
// Enqueue parent theme styles and scripts //
/////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

///////////////////////////
// Get Parent Stylesheet //
///////////////////////////

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


//////////////////////////
// Enable page excerpts //
//////////////////////////

add_post_type_support( 'page', 'excerpt' );


//////////////////////////////////////////////
// Remove the admin bar for non-admin users //
//////////////////////////////////////////////

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
  		show_admin_bar(false);
	}
}

////////////////////////////
// Custom Login Page Logo //
////////////////////////////

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/KAlogo2.png);
		height:100px;
		width:198px;
		background-size: 198px 100px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );



/////////////////////////////////
// Create FAQ custom post type //
/////////////////////////////////

if ( ! function_exists('custom_post_type') ) {

// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                  => _x( 'FAQs', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'FAQs', 'text_domain' ),
        'name_admin_bar'        => __( 'FAQs', 'text_domain' ),
        'archives'              => __( 'FAQ Archives', 'text_domain' ),
        'attributes'            => __( 'FAQ Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent FAQ:', 'text_domain' ),
        'all_items'             => __( 'All FAQs', 'text_domain' ),
        'add_new_item'          => __( 'Add New FAQ', 'text_domain' ),
        'add_new'               => __( 'Add New FAQ', 'text_domain' ),
        'new_item'              => __( 'New FAQ', 'text_domain' ),
        'edit_item'             => __( 'Edit FAQ', 'text_domain' ),
        'update_item'           => __( 'Update FAQ', 'text_domain' ),
        'view_item'             => __( 'View FAQ', 'text_domain' ),
        'view_items'            => __( 'View FAQs', 'text_domain' ),
        'search_items'          => __( 'Search FAQs', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'FAQ', 'text_domain' ),
        'description'           => __( 'FAQ posts', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-editor-help',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'faq', $args );

}
add_action( 'init', 'custom_post_type', 0 );

}
