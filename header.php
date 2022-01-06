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
    <meta name="theme-color" content="#061728">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#061728">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#061728">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto+Condensed:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="navbar">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <nav class="d-flex align-items-center">
                    <a href="<?php echo home_url(); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/logo.svg" alt="" />
                    </a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-header',
                        'menu_class'    => 'menu'
                    ));
                    ?>
                </nav>

                <div class="navbar__wrap">
                    <div class="userbar">
                        <div class="item selectable js-toggle">
                            <span>EUR</span>
                        </div>
                        <div class="item selectable js-toggle">
                            <span>ENG</span>
                        </div>
                        <!-- <div class="item d-flex align-items-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cog.svg" alt="Cog icon">
                        </div> -->
                        <div class="item d-flex align-items-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/user.svg" alt="User icon">
                        </div>
                    </div>
                </div>
                <div class="burger" id="burger"></div>
            </div>
        </div>

        <div class="mobile-menu" id="mobile-menu">

            <div class="container-fluid">
                <span class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/logo.svg" alt="" />
                </span>
            </div>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-header',
                'menu_class'    => 'menu'
            ));
            ?>

            <div class="container-fluid">
                <div class="navbar__wrap">
                    <div class="userbar">
                        <div class="d-flex">
                            <div class="item selectable js-toggle">
                                <span>EUR</span>
                            </div>
                            <div class="item selectable js-toggle">
                                <span>ENG</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- <div class="item d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cog.svg" alt="Cog icon">
                            </div> -->
                            <div class="item d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/user.svg" alt="User icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </header>