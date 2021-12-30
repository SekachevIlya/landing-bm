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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.svg">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#1B1B1B">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1B1B1B">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1B1B1B">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto+Condensed:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="navbar">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <nav class="d-flex align-items-center">
                    <a href="<?php echo home_url(); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/logo.svg" alt="">
                    </a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-header',
                        'menu_class'    => 'menu'
                    ));
                    ?>
                </nav>

                <div class="navbar__wrap">

                </div>
                <div class="burger" id="burger"></div>
            </div>
        </div>
    </header>