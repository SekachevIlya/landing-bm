<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bitmelech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.svg">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#1B1B1B">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1B1B1B">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1B1B1B">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="navbar">
            <div class="container">
                <a href="<?php echo home_url(); ?>" class="logo"></a>
                <?php
				    wp_nav_menu( array(
				        'theme_location' => 'menu-header',
				        'menu_class'    => 'menu'
				    ) );
			    ?>
                <div class="navbar__wrap">
                    <?php if(get_field('first_btn_name_header', 'option') || get_field('link_first_btn_header', 'option')) { ?>
                    <a href="<?php esc_url(the_field('link_first_btn_header', 'option')); ?>" class="button-signin"
                        rel="nofollow noopener noreferrer"
                        target="_blank"><?php esc_attr(the_field('first_btn_name_header', 'option')); ?></a>
                    <?php } ?>
                    <?php if(get_field('second_btn_name_header', 'option') || get_field('link_second_btn_header', 'option')) { ?>
                    <a href="<?php esc_url(the_field('link_second_btn_header', 'option')); ?>"
                        class="button button_join" rel="nofollow noopener noreferrer"
                        target="_blank"><?php esc_attr(the_field('second_btn_name_header', 'option')); ?></a>
                    <?php } ?>
                </div>
                <div class="burger" id="burger"></div>
            </div>
        </div>
    </header>