<?php

// Enqueue parent theme styles and scripts
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );


// Get Parent Stylesheet //
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


// Enable page excerpts
add_post_type_support( 'page', 'excerpt' );



// Remove the admin bar for non-admin users
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
  		show_admin_bar(false);
	}
}


// Custom Login Page Logo //
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



