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
            'taxonomies'            => array( 'faq_categories' ),
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


if ( ! function_exists( 'faq_categories' ) ) {

// Register Custom Taxonomy
function faq_categories() {

    $labels = array(
        'name'                       => 'FAQ Categories',
        'singular_name'              => 'FAQ Category',
        'menu_name'                  => 'FAQ Categories',
        'all_items'                  => 'All Items',
        'parent_item'                => 'Parent Item',
        'parent_item_colon'          => 'Parent Item:',
        'new_item_name'              => 'New Item Name',
        'add_new_item'               => 'Add New Item',
        'edit_item'                  => 'Edit Item',
        'update_item'                => 'Update Item',
        'view_item'                  => 'View Item',
        'separate_items_with_commas' => 'Separate items with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Items',
        'search_items'               => 'Search Items',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No items',
        'items_list'                 => 'Items list',
        'items_list_navigation'      => 'Items list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'faq_taxonomy', array( 'faq' ), $args );

}
add_action( 'init', 'faq_categories', 0 );

}




/////////////////////////
// ACF (Custom Fields) //
/////////////////////////


if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_index-page-image',
        'title' => 'index page image',
        'fields' => array (
            array (
                'key' => 'field_5a297aa4f9b96',
                'label' => 'index_page_image_url',
                'name' => 'index_page_image_url',
                'type' => 'text',
                'instructions' => 'please insert the image url ',
                'required' => 1,
                'default_value' => 'https://picsum.photos/200/150',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'index_page.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_knovva-course-settings',
        'title' => 'Knovva Course Settings',
        'fields' => array (
            array (
                'key' => 'field_5a21ceba07fbf',
                'label' => 'Page Visibility',
                'name' => 'visibility',
                'type' => 'radio',
                'required' => 1,
                'choices' => array (
                    'Hidden' => 'Hidden',
                    'Visible' => 'Visible',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'Visible',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_5a21e1eb69cd9',
                'label' => 'Articulate Direct URL',
                'name' => 'articulate_direct_url',
                'type' => 'text',
                'default_value' => 'http://cn.knovva.com/lms',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5a2b0e974fce7',
                'label' => 'Launch Date',
                'name' => 'launch_date',
                'type' => 'date_picker',
                'instructions' => 'Choose the date that this unit should become available.  NOTE:   This is for DISPLAY ONLY!   This does NOT automatically launch the unit on this date!',
                'required' => 1,
                'date_format' => 'yymmdd',
                'display_format' => 'mm/dd/yy',
                'first_day' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_parent',
                    'operator' => '==',
                    'value' => '205',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_landing-page-video-section',
        'title' => 'Landing page video section',
        'fields' => array (
            array (
                'key' => 'field_5a238253cfeac',
                'label' => 'Landing Page Videl URL',
                'name' => 'landing_page_video_url',
                'type' => 'text',
                'required' => 1,
                'default_value' => 'https://www.youtube.com/embed/3cYBfuphkuE',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '313',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
