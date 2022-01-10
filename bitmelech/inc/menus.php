<?php

// This theme uses wp_nav_menu() in one location.

function register_custom_menus() {
	register_nav_menus( array(
		'menu-header' => esc_html__( 'Header Navigation', 'bitmelech' ),
		'menu-footer-resources' => esc_html__( 'Footer Navigation Resources', 'bitmelech' ),
		'menu-footer-company' => esc_html__( 'Footer Navigation Company', 'bitmelech' )
	) );
}

add_action( 'after_setup_theme', 'register_custom_menus' );

// Remove menu container

add_filter( 'wp_nav_menu_args', 'special_wp_nav_menu_args' );
function special_wp_nav_menu_args( $args = '' ){
	$args['container'] = false;
	return $args;
};

// Special Nav Class Item
add_filter( 'nav_menu_css_class', 'special_nav_item_class', 10, 4 );
function special_nav_item_class ($classes, $item, $args, $depth) {
	if( $args->theme_location === 'menu-header' ){

		if( $depth >= 1 ){

            $classes = [];

        }else{

            $classes = ['menu__item'];

        }

		if( !empty($item->classes) && is_array($item->classes) && in_array('menu-item-has-children', $item->classes) ){
			$classes[] = $depth? '' : 'menu-dropdown-item';
		}

        if( $item->current ){

            $classes[] = 'active';

        }

    }

    if(
    	$args->theme_location === 'menu-footer-resources' || 
    	$args->theme_location === 'menu-footer-company'
    ) {
		$classes = ['footer-item'];

        if( $item->current ){

            $classes[] = 'active';

        }

    }

    return $classes;
};

// Special Nav Class Menu Level 2

add_filter( 'nav_menu_submenu_css_class', 'special_nav_submenu_class', 10, 3 );
function special_nav_submenu_class( $classes, $args, $depth ) {
	foreach ( $classes as $key => $class ) {
		if ( $class == 'sub-menu') {
			if($args->theme_location === 'menu-header') {
				$classes[ $key ] = 'dropdown-content';
			}
		}
	}

	return $classes;
}