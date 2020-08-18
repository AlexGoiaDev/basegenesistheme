<?php

include_once( get_template_directory() . '/lib/init.php' );

define( 'Child_Theme_Name', __( 'Genesis Child', 'BaseGenesisTheme' ) );

//* We tell the web address of our child theme (More info & demo)
define( 'Child_Theme_Url', ' https://github.com/AlexGoiaDev/basegenesistheme.git' );
//* We tell the version of our child theme
define( 'Child_Theme_Version', '1.0' );

//* Add HTML5 markup structure from Genesis
add_theme_support( 'html5' );

//* Add HTML5 responsive recognition
add_theme_support( 'genesis-responsive-viewport' );