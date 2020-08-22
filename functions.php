<?php

include_once(get_template_directory() . '/lib/init.php');

define('Child_Theme_Name', __('Genesis Child', 'BaseGenesisTheme'));

//* We tell the web address of our child theme (More info & demo)
define('Child_Theme_Url', 'https://github.com/AlexGoiaDev/basegenesistheme.git');
//* We tell the version of our child theme
define('Child_Theme_Version', '1.0');

//* Add HTML5 markup structure from Genesis
add_theme_support('html5');

//* Add HTML5 responsive recognition
add_theme_support('genesis-responsive-viewport');




function be_footer()
{
    echo '<div class="left"><p>© Copyright ' . date('Y') . ' : All Rights Reserved</p></div>';
    echo '<div class="right">';
    wp_nav_menu(array('menu' => 'Footer'));
    echo '</div>';
}

// Gist updated to use code from Genesis Framework 2.4.2
//remove initial header functions
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_header', 'genesis_do_header' );

//add in the new header markup - prefix the function name - here sm_ is used
add_action( 'genesis_header', 'sm_genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'sm_genesis_header_markup_close', 15 );
add_action( 'genesis_header', 'sm_genesis_do_header' );


//New Header functions
function sm_genesis_header_markup_open() {

	genesis_markup( array(
		'html5'   => '<header %s>',
		'context' => 'site-header',
	) );
    // Added in content
    
    // Add content before regular header
	echo '<div class="header-ghost"></div>';

	genesis_structural_wrap( 'header' );
}

function sm_genesis_header_markup_close() {
	genesis_structural_wrap( 'header', 'close' );
	genesis_markup( array(
		'close'   => '</header>',
		'context' => 'site-header',
	) );
}


function sm_genesis_do_header() {

	global $wp_registered_sidebars;
	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'title-area',
	) );
	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );
	
	genesis_markup( array(
		'close'    => '</div>',
		'context' => 'title-area',
	) );

	if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
		genesis_markup( array(
			'open'    => '<div %s>' . genesis_sidebar_title( 'header-right' ),
			'context' => 'header-widget-area',
		) );

			do_action( 'genesis_header_right' );
			add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
			dynamic_sidebar( 'header-right' );
			remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );

		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'header-widget-area',
		) );
	}
}




remove_action('genesis_footer', 'genesis_do_footer');
add_action('genesis_footer', 'be_footer');
